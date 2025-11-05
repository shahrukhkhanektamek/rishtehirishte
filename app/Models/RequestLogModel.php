<?php namespace App\Models;

use CodeIgniter\Model;

class RequestLogModel extends Model
{
    protected $table = 'request_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'method', 'uri', 'query_string', 'payload', 'headers', 'ip_address', 'user_agent', 'created_at','user_id','add_date_time','update_date_time'
    ];
    public $useTimestamps = false; // using DB default for created_at
}
