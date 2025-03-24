<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscountModel extends Model
{
    protected $table            = 'discounts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'name',
        'discount_type_id',
        'discount_value',
        'min_order_amount',
        'max_discount',
        'coupon_code',
        'start_date',
        'end_date',
        'usage_limit',
        'used_count',
        'is_active',
        'created_by',
        'updated_by'
    ];

    // Timestamps xử lý tự động
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
