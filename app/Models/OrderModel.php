<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'total_price',
        'status',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at',
        'is_active',
        'note'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = true;
}
