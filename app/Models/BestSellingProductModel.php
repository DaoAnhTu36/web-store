<?php

namespace App\Models;

use CodeIgniter\Model;

class BestSellingProductModel extends Model
{
    protected $table      = 'best_selling_products';
    protected $primaryKey = 'record_id';

    protected $allowedFields = ['product_id', 'total_sold', 'last_updated'];

    public function getTopSellingProducts($limit = 10)
    {
        return $this->orderBy('total_sold', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
