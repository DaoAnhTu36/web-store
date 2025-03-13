<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryMovementModel extends Model
{
    protected $table      = 'inventory_movements';
    protected $primaryKey = 'movement_id';

    protected $allowedFields = ['product_id', 'warehouse_id', 'quantity', 'movement_type', 'reference', 'created_at'];

    public function getMovementsByProduct($product_id)
    {
        return $this->where('product_id', $product_id)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
