<?php

namespace App\Models;

use CodeIgniter\Model;

class BestSellingProductModel extends Model
{
    protected $table      = 'best_selling_products';
    protected $primaryKey = 'record_id';

    protected $allowedFields = ['product_id', 'total_sold', 'last_updated', 'created_by', 'updated_by', 'is_active'];

    public function getTopSellingProducts($limit = 10)
    {
        return
            $this
            ->select('products.name as product_name, 
            best_selling_products.total_sold')
            ->join('products', 'products.id = best_selling_products.product_id', 'left')
            ->orderBy('best_selling_products.total_sold', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
