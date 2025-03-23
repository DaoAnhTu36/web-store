<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'product_id',
        'warehouse_id',
        'product_attribute_id',
        'quantity',
        'unit',
        'last_updated'
    ];

    protected $useTimestamps = false;
    protected $validationRules = [
        'product_id' => 'required|integer',
        'quantity'   => 'required|integer',
    ];

    protected $returnType = 'array';
}
