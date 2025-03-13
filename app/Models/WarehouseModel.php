<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table      = 'warehouses';
    protected $primaryKey = 'warehouse_id';

    protected $allowedFields = ['name', 'location', 'manager', 'created_at'];
}
