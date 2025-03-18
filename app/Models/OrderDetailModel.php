<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'created_by',
        'updated_by',
        'is_active'
    ];

    protected $returnType = 'array';
}
