<?php
// app/Controllers/Admin/RoleController.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PermissionModel;

class PermissionController extends BaseController
{
    protected $permissionModel;

    public function __construct()
    {
        $this->permissionModel = new PermissionModel();
    }

    public function index()
    {
        $data = $this->permissionModel->findAll();
        $data_view = [
            'title' => 'Danh sách quyền hạn truy cập',
            'data' => $data,
        ];
        return view('admin/permission_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => 'Tạo mới quyền hạn truy cập'
        ];
        return view('admin/permission_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->permissionModel->save($data);
        return redirect('admin/permission')->with('success', 'Thêm mới quyền hạn thành công');
    }

    public function detail($id)
    {
        $data = $this->permissionModel->where('id', $id)->first();
        $data_view = [
            'title' => 'Chi tiết quyền hạn',
            'data' => $data,
        ];
        return view('admin/permission_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->permissionModel->update($id, $data);
        return redirect('admin/permission')->with('success', 'Cập nhật quyền hạn thành công');
    }

    public function delete($id)
    {
        $this->permissionModel->delete($id);
        return redirect('admin/permission')->with('success', 'Xóa thành công');
    }
}
