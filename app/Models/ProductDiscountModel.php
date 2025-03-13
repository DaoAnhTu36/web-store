<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDiscountModel extends Model
{
    protected $table      = 'product_discounts';
    protected $primaryKey = 'discount_id';

    protected $allowedFields = ['product_id', 'discount_type', 'discount_value', 'start_date', 'end_date', 'created_at'];

    public function getActiveDiscounts()
    {
        return $this->where('start_date <=', date('Y-m-d'))
            ->where('end_date >=', date('Y-m-d'))
            ->findAll();
    }
}
