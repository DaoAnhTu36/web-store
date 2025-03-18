<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table      = 'warehouses';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'location', 'account_id', 'created_at', 'created_by', 'updated_by', 'is_active'];

    public function getAllWarehouse()
    {
        return $this
            ->select('accounts.full_name, warehouses.*')
            ->join('accounts', 'accounts.id = warehouses.account_id', 'left')
            ->where('warehouses.is_active', true)
            ->orderBy('warehouses.created_at', 'desc')
            ->findAll();
    }
}
