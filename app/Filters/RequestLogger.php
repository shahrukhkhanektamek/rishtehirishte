<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\RequestLogModel;

class RequestLogger implements FilterInterface
{
    protected $maskFields = ['password','pass','pwd','token','authorization','auth']; // mask these keys

    public function before(RequestInterface $request, $arguments = null)
    {
        // ⚠️ Skip CLI (command line) requests
        if (php_sapi_name() === 'cli') {
            return;
        }

        // Get current path only once
        $baseURL = parse_url(config('App')->baseURL, PHP_URL_PATH); // gives "/projects/dimplemam/rishtehirishte/public/"
        $path = $request->getURI()->getPath();

        if(!empty(explode($baseURL, $path)[1]))
        {
            $path = explode($baseURL, $path)[1];
        }

        // Remove the baseURL path prefix if present
        if (strpos($path, ltrim($baseURL, '/')) === 0) {
            $path = substr($path, strlen(ltrim($baseURL, '/')));
        }

        // ⚠️ Skip static assets or files
        if (
            strpos($path, 'assets/') === 0 ||
            strpos($path, 'admin/assets/') === 0 ||
            strpos($path, 'user/assets/') === 0 ||
            strpos($path, 'public/') === 0 ||
            strpos($path, 'uploads/') === 0 ||
            strpos($path, 'images/') === 0
        ) {
            return;
        }

        $uri = current_url(false); // full URL
        $method = $request->getMethod(true); // GET/POST/PUT etc (upper)
        $queryString = $_SERVER['QUERY_STRING'] ?? '';

        // Collect payload: for form-data use getPost(), for json use getBody()
        $payloadArray = [];
        try {
            if ($method === 'GET' || $method === 'HEAD') {
                $payloadArray = $request->getGet();
            } else {
                // merge post and raw json
                $post = $request->getPost();
                $raw = $request->getBody(); // raw body (JSON, etc)
                // attempt decode raw if json
                $rawDecoded = null;
                if (!empty($raw)) {
                    $json = json_decode($raw, true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $rawDecoded = $json;
                    } else {
                        $rawDecoded = $raw;
                    }
                }
                $payloadArray = [
                    'post' => $post,
                    'raw' => $rawDecoded
                ];
            }
        } catch (\Exception $e) {
            $payloadArray = ['error' => 'could not parse payload'];
        }

        // Mask sensitive keys recursively
        $payloadFiltered = $this->maskSensitive($payloadArray);

        // Headers: build simpler array
        $headers = [];
        foreach ($request->getHeaders() as $name => $header) {
            $headers[$name] = $header->getValueLine();
        }

        $headersFiltered = $this->maskSensitive($headers);

        $ip = $request->getIPAddress();
        $ua = $request->getUserAgent() ?? '';

        $session = session()->get('user');
        @$user_id = $session['id'];

        $data = [
            'user_id'       => $user_id,
            'method'       => $method,
            'uri'          => $uri,
            'query_string' => $queryString,
            'payload'      => json_encode($payloadFiltered, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
            'headers'      => json_encode($headersFiltered, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
            'ip_address'   => $ip,
            'user_agent'   => $ua,
            'add_date_time'   => date("Y-m-d H:i:s"),
            'update_date_time'   => date("Y-m-d H:i:s"),
            // created_at is DB default
        ];

        // Insert into DB (use model)
        try {
            $model = new RequestLogModel();
            $model->insert($data);
        } catch (\Throwable $e) {
            // avoid breaking the request if DB is down; optionally log to file
            log_message('error', 'RequestLogger failed: '.$e->getMessage());
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing needed here for now
    }

    protected function maskSensitive($arr)
    {
        if (!is_array($arr)) return $arr;

        $out = [];
        foreach ($arr as $k => $v) {
            $lower = strtolower($k);
            $shouldMask = false;
            foreach ($this->maskFields as $mf) {
                if (strpos($lower, $mf) !== false) {
                    $shouldMask = true;
                    break;
                }
            }

            if ($shouldMask) {
                $out[$k] = '***MASKED***';
            } else {
                if (is_array($v)) {
                    $out[$k] = $this->maskSensitive($v);
                } else {
                    // Avoid storing extremely long values (truncate)
                    if (is_string($v) && strlen($v) > 10000) {
                        $out[$k] = substr($v, 0, 10000) . '...[truncated]';
                    } else {
                        $out[$k] = $v;
                    }
                }
            }
        }
        return $out;
    }
}
