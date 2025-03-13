<?php

namespace App\Controllers\Admin;

use App\Models\WarehouseModel;
use App\Controllers\BaseController;

class WarehouseController extends BaseController
{
    protected $warehouseModel;

    public function __construct()
    {
        $this->warehouseModel = new WarehouseModel();
        helper("common");
        helper("language");
    }

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách kho hàng',
        ];
        return view('admin/warehouse_view/index_view', $data_view);
    }
}
