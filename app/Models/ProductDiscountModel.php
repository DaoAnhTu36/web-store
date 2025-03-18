<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductDiscountModel extends Model
{
    protected $table      = 'product_discounts';
    protected $primaryKey = 'discount_id';

    protected $allowedFields = ['product_id', 'discount_type', 'discount_value', 'start_date', 'end_date', 'created_at', 'created_by', 'updated_by', 'is_active'];

    public function getActiveDiscounts()
    {
        return $this->where('start_date <=', date('Y-m-d'))
            ->where('end_date >=', date('Y-m-d'))
            ->findAll();
    }
    public function getAllDiscount()
    {
        return $this->select('product_discounts.*, products.name as product_name')
            ->join('products', 'products.id = product_discounts.product_id', 'left')
            ->where('products.id IS NOT NULL')
            ->findAll();
    }
}
