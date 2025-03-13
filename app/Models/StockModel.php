<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table      = 'stock';
    protected $primaryKey = 'stock_id';

    protected $allowedFields = ['product_id', 'warehouse_id', 'quantity', 'last_updated'];

    public function getStockByProduct($product_id)
    {
        return $this->where('product_id', $product_id)->findAll();
    }
}
