<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDiscountDetailModel extends Model
{
    protected $table            = 'product_discount_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'product_id',
        'is_active',
        'created_by',
        'updated_by',
        'product_discount_id'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
