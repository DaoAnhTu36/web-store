<?php

namespace App\Controllers\Admin;

use App\Models\WarehouseModel;
use App\Models\AccountModel;
use App\Controllers\BaseController;

class WarehouseController extends BaseController
{
    protected $warehouseModel;
    protected $accountModel;

    public function __construct()
    {
        $this->warehouseModel = new WarehouseModel();
        $this->accountModel = new AccountModel();
    }

    public function index()
    {
        $lstWarehouse = $this->warehouseModel->getAllWarehouse();
        $data_view = [
            'title' => 'Danh sách kho hàng',
            'lstWarehouse' => $lstWarehouse
        ];
        return view('admin/warehouse_view/index_view', $data_view);
    }

    public function create()
    {
        $lstAdmin = $this->accountModel->where('role', 'admin')->findAll();
        $data_view = [
            'title' => 'Thêm mới kho hàng',
            'lstAdmin' => $lstAdmin,
        ];
        return view('admin/warehouse_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'account_id' => $this->request->getPost('account_id'),
        ];
        $this->warehouseModel->save($data);
        return redirect()->to('admin/warehouse')->with('success', 'Thêm mới thành công kho hàng');
    }

    public function detail($id)
    {
        $warehouse = $this->warehouseModel->find($id);
        $lstAdmin = $this->accountModel->where('is_active', 1)->findAll();
        $data_view = [
            'title' => 'Chi tiết kho hàng',
            'data' => $warehouse,
            'lstAdmin' => $lstAdmin
        ];
        return view('admin/warehouse_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'account_id' => $this->request->getPost('account_id'),
        ];
        $this->warehouseModel->update($id, $data);
        return redirect()->to('admin/warehouse')->with('success', 'Cập nhật thành công kho hàng');
    }

    public function delete($id) {}
}
