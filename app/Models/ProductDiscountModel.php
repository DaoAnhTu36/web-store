<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDiscountModel extends Model
{
    protected $table      = 'product_discounts';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'discount_id',
        'created_at',
        'created_by',
        'updated_by',
        'is_active'
    ];
}
