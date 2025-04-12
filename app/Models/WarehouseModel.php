<?php

namespace App\Models;

use CodeIgniter\Model;

class WarehouseModel extends Model
{
    protected $table      = 'warehouses';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'location', 'account_id', 'created_at', 'created_by', 'updated_by', 'is_active'];

    protected $validationRules    = [
        'name'        => 'required',
        'location' => 'required',
        'account_id' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Tên kho hàng là bắt buộc',
        ],
        'location' => [
            'required' => 'Địa chỉ kho hàng là bắt buộc.',
        ],
        'account_id' => [
            'required' => 'Người quản lý kho hàng là bắt buộc.',
        ],
    ];

    public function get_all_warehouse()
    {
        return $this
            ->select('accounts.full_name, warehouses.*')
            ->join('accounts', 'accounts.id = warehouses.account_id', 'left')
            ->orderBy('warehouses.created_at', 'desc')
            ->findAll();
    }
}
