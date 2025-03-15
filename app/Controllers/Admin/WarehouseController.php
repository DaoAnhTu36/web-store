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

    public function index()
    {
        $data_view = [
            'title' => 'Danh sách kho hàng',
        ];
        return view('admin/warehouse_view/index_view', $data_view);
    }

    public function create() {}

    public function save() {}

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
