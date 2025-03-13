<?php

namespace App\Controllers\Admin;

use App\Models\InventoryMovementModel;
use App\Controllers\BaseController;

class InventoryMovementController extends BaseController
{
    protected $movementModel;

    public function __construct()
    {
        $this->movementModel = new InventoryMovementModel();
        helper("common");
        helper("language");
    }

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách lịch sử nhập xuất kho',
        ];
        return view('admin/inventory_movement_view/index_view', $data_view);
    }
}
