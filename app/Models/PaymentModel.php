<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'order_id',
        'user_id',
        'payment_method',
        'payment_status',
        'transaction_id',
        'created_at',
        'created_by',
        'updated_by',
        'is_active'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
