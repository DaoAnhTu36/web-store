<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductPriceModel extends Model
{
    protected $table      = 'product_prices';
    protected $primaryKey = 'price_id';

    protected $allowedFields = ['product_id', 'price', 'start_date', 'end_date', 'created_at'];

    public function getLatestPrice($product_id)
    {
        return $this->where('product_id', $product_id)
            ->orderBy('start_date', 'DESC')
            ->first();
    }
}
