<?php
namespace App\Controllers\Payment;

use App\Controllers\BaseController;
use CodeIgniter\Database\Database;
use CodeIgniter\Config\Services;
use App\Models\PaymentModel;

class PaymentController extends BaseController
{

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function create_transaction()
    {
        $transaction_type = $this->request->getGet('type'); // 1=plan, 2=product
        $user_id = decript($this->request->getGet('user_id'));
        $p_id = decript($this->request->getGet('p_id'));
        $insertId = ($this->request->getGet('insertId'));

        if($transaction_type==1)
        {
            $row = $this->db->table('package')->where(["id"=>$p_id,])->get()->getFirstRow();
            $data['detail'] = json_encode([
                [
                    "p_id"=>$row->id,
                    "name"=>$row->name,
                    "qty"=>1,
                    "amount"=>$row->final_price,
                ]
            ]);
            $amount = $row->final_price;
            $gst = 0;
            $final_amount = $row->final_price;
        }
        else
        {
            $row = $this->db->table('product')->where(["id"=>$p_id,])->get()->getFirstRow();
            $data['detail'] = json_encode([
                [
                    "p_id"=>$row->id,
                    "name"=>$row->name,
                    "qty"=>1,
                    "amount"=>$row->booking_price,
                ]
            ]);
            $amount = $row->booking_price;
            $gst = 0;
            $final_amount = $row->booking_price;
        }


        if(!empty($row))
        {
            $data['type'] = 1;
            $data['transaction_type'] = $transaction_type;
            $data['user_id'] = $user_id;
            $data['add_date_time'] = date("Y-m-d H:i:s");
            $data['update_date_time'] = date("Y-m-d H:i:s");

            $data['amount'] = $amount;
            $data['gst'] = $gst;
            $data['final_amount'] = $final_amount;
            $data['p_id'] = $insertId;
            
            if($this->db->table("transaction")->insert($data))
            {
                $insertId = $this->db->insertID();
                return redirect()->to(base_url('payment/pay?id='.encript($insertId)));
            }
            else
            {
                return redirect->to(base_url());
            }
        }
        else
        {
            return redirect->to(base_url());
        }
    }

    public function make_payment()
    {
        $id = $this->request->getGet('id');
        $mode = $this->request->getGet('mode');
        $db = $this->db;

        $amount = 0;
        $redirectUrl = base_url('payment/response') . '?id=' . $id;

        $transaction_id = 'MT' . rand(10000, 99999) . rand(10000, 99999) . rand(1000, 9999) . rand(10, 99);

        $db->table('transaction')->where('id', $id)->where("status",0)->update([
            'transaction_id' => $transaction_id,
            'payment_by' => $mode,
        ]);
        $orders = $db->table('transaction')
        ->select("
            users.name as user_name,
            users.email as user_email,
            users.phone as user_phone,
         transaction.*")
        ->join('users', 'users.id = transaction.user_id', 'left')
        ->where('transaction.id', $id)->where('transaction.status', 0)->get()->getRow();

        if (!empty($orders)) {
            $amount = $orders->final_amount;

            $data = [
                'redirectUrl'   => $redirectUrl,
                'redirectFUrl'  => $redirectUrl,
                'redirectCUrl'  => $redirectUrl,
                'transaction_id'=> $transaction_id,
                'amount'        => $amount,
                'orders'        => $orders,
            ];

            $html='';
            // Assuming the PaymentModel was ported to CI4 and loaded properly
            $PaymentModel = new PaymentModel();
            if($mode=='payumoney')
            {
                $html = $PaymentModel->payu_create_checksum($data);
                $data['html'] = $html;

                if (!empty($html)) {
                    echo $html;
                } else {
                    // return redirect()->to(base_url('payment-block'));
                }
            }
            if($mode=='phonepe')
            {
                $html = $PaymentModel->phonepe_create_url($data);
                $data['html'] = $html;

                if (!empty($html)) {
                    echo $html;
                } else {
                    return redirect()->to(base_url('payment-block'));
                }
            }
            if($mode=='razorpay')
            {
                $RResponse = $PaymentModel->razorpay_create_checksum($data);
                $html = $RResponse['html'];
                $db->table('transaction')->where('id', $id)->update([
                    'transaction_id' => $RResponse['transaction_id'],
                ]);

                if (!empty($html)) {
                    return $html;
                } else {
                    return redirect()->to(base_url('payment-block'));
                }
            }
        } else {
            return redirect()->to(base_url('payment-block'));
        }
    }
    public function response()
    {
        $db = $this->db;
        // $id = decript($this->request->getGet('id'));
        $id = $this->request->getGet('id');


        $transaction_id = $_POST['razorpay_payment_id'];
        $PaymentModel = new PaymentModel();

        $orders = $this->db->table('transaction')->where("id",$id)
        ->where("status",0)
        ->get()->getRow();
        if(!empty($orders))
        {
            $status = false;
            $mode = $orders->payment_by;

            if($mode=='payumoney')
            {
                $payment_status = $PaymentModel->payu_payment_status($orders->transaction_id);                
                if(!empty($payment_status['status']))
                    if($payment_status['status']=='paid' || $payment_status['status']=='captured')
                        $status=true;
            }
            if($mode=='phonepe')
            {
                $payment_status = $PaymentModel->phonepe_payment_status($orders->transaction_id);                
                if(!empty($payment_status['status']))
                    if($payment_status['status']=='paid' || $payment_status['status']=='captured')
                        $status=true;
            }
            if($mode=='razorpay')
            {
                $payment_status = $PaymentModel->razorpay_payment_status($orders->transaction_id);                
                if(!empty($payment_status['status']))
                    if($payment_status['status']=='paid' || $payment_status['status']=='captured')
                        $status=true;
            }

        

            if($status)
            {                
                $db->table('transaction')->where('id', $id)->update([
                    'status' => 1,
                    'payment_date_time' => date("Y-m-d H:i:s"),
                    'update_date_time' => date("Y-m-d H:i:s"),
                ]);

                // 1=plan, 2=booking
                if($orders->transaction_type==1)
                {
                    $id = json_decode($orders->detail)[0]->p_id;
                    $vendor_id = $orders->user_id;

                    $date_time = date("Y-m-d H:i:s");
                    $package = $this->db->table("package")->where(["id"=>$id,])->get()->getFirstRow();
                    $data = [
                        "vendor_id"=>$vendor_id,
                        "package_id"=>$package->id,
                        "package_name"=>$package->name,
                        "validity"=>$package->validation,
                        "amount"=>$package->price,
                        "gst"=>0,
                        "final_amount"=>$package->final_price,

                        "transaction_id"=>$orders->transaction_id,
                        "status"=>0,
                        "is_delete"=>0,
                    ];

                    $data['add_by'] = $vendor_id;
                    $data['add_date_time'] = date("Y-m-d H:i:s");
                    $data['update_date_time'] = date("Y-m-d H:i:s");
                    $entryStatus = false;


                    $data['payment_date_time'] = $date_time;
                    $data['plan_start_date_time'] = $date_time;
                    $data['plan_end_date_time'] = date("Y-m-d H:i:s", strtotime($date_time."+$package->validation month"));
                    $data['status'] = 1;

                    if($this->db->table("vendor_package")->insert($data)) $entryStatus = true;

                    return redirect()->to(base_url('vendor/dashboard'));

                }
                else
                {
                    
                    // $id = json_decode($orders->detail)[0]->p_id;
                    $id = $orders->p_id;
                    $db->table('enquiry_booking')->where('id', $id)->update([
                        'status' => 1,
                        // 'payment_date_time' => date("Y-m-d H:i:s"),
                        'update_date_time' => date("Y-m-d H:i:s"),
                    ]);
                     return redirect()->to(base_url('payment-success'));
                    // return redirect()->to(base_url('user/dashboard'));
                }
            }
            else
            {
                return redirect()->to(base_url('payment-block'));
            }
        }
        else
        {
            return redirect()->to(base_url('payment-block'));

            // if($orders->transaction_type==1)
            // {
            //     return redirect()->to(base_url('vendor/dashboard'));
            // }
            // else
            // {
            //     return redirect()->to(base_url('user/dashboard'));
            // }
        }


    }
    public function pay()
    {
        $id = decript($this->request->getGet('id'));

        $db = $this->db;
        $transaction = $db->table('transaction')->where(["id" => $id, "status" => 0])->get()->getRow();

        if (!empty($transaction)) {
            $payment_setting_arr = [];
            $payment_setting = $db->table("payment_setting")
                ->where("status", 1)
                ->get()
                ->getResult();

            $count = count($payment_setting);

            if ($count == 1) {
                $keys = json_decode($payment_setting[0]->data);
                $mode = $keys->prefix;
                $prefix = base_url("payment/make-payment").'?id=' . $id.'&mode='.$mode;
                return redirect()->to($prefix);
            } else {
                return view('payment/payment-mode/index', [
                    'payment_setting' => $payment_setting,
                    'id' => $id
                ]);
            }            
        } else {
            return 'Error...';
        }
    }

    public function payment_block()
    {
        $settingModel = new \App\Models\Setting();
        $setting = $settingModel->get();
        $main_setting = $setting['main'];

        return view('payment/payment-block', [
            'setting' => $setting,
            'main_setting' => $main_setting
        ]);
    }

    public function payment_faild()
    {
        $settingModel = new \App\Models\Setting();
        $setting = $settingModel->get();
        $main_setting = $setting['main'];

        return view('payment/payment-faild', [
            'setting' => $setting,
            'main_setting' => $main_setting
        ]);
    }

    public function payment_success()
    {
        $settingModel = new \App\Models\Setting();
        $setting = $settingModel->get();
        $main_setting = $setting['main'];

        return view('payment/payment-success', [
            'setting' => $setting,
            'main_setting' => $main_setting
        ]);
    }
}
