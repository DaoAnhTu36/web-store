<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class RoleController extends BaseController
{
    protected $roleModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }
    public function index()
    {
        $data = $this->roleModel->orderBy('created_at', 'desc')->findAll();
        $data_view = [
            'title' => 'Danh sách vai trò, chức vụ',
            'data' => $data,
        ];
        return view('admin/role_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => 'Thêm mới vai trò, chức vụ'
        ];
        return view('admin/role_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->roleModel->save($data);
        return redirect()->route('admin/role')->with('success', 'Thêm mới thành công');
    }

    public function detail($id)
    {
        $data = $this->roleModel->find($id);
        $data_view = [
            'title' => 'Thông tin vai trò, chức vụ',
            'data' => $data,
        ];
        return view('admin/role_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->roleModel->update($id, $data);
        return redirect()->route('admin/role')->with('success', 'Cập nhật thông tin thành công');
    }

    public function delete($id)
    {
        $this->roleModel->delete($id);
        return redirect()->route('admin/role')->with('success', 'Xóa thành công');
    }
}
