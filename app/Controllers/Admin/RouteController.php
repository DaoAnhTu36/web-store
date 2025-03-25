<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RouteModel;
use App\Models\PermissionModel;

class RouteController extends BaseController
{
    protected $routeModel;
    protected $permissionModel;

    public function __construct()
    {
        $this->routeModel = new RouteModel();
        $this->permissionModel = new PermissionModel();
    }

    public function index()
    {
        $data = $this->routeModel->orderBy('permission_id', 'asc')->findAll();
        $data_view = [
            'title' => 'Danh sách route',
            'data' => $data,
        ];
        return view('admin/route_view/index_view', $data_view);
    }

    public function create()
    {
        $permissions = $this->permissionModel->where('is_active', 1)->findAll();
        $data = $this->routeModel
            ->where('is_group', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll();
        $data_view = [
            'title' => 'Tạo mới route',
            'data' => $data,
            'permissions' => $permissions,
        ];
        return view('admin/route_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'method' => $this->request->getPost('method'),
            'uri' => $this->request->getPost('uri'),
            'controller' => $this->request->getPost('controller'),
            'filters' => $this->request->getPost('filters'),
            'is_group' => $this->request->getPost('is_group'),
            'level' => $this->request->getPost('level'),
            'parent_id' => $this->request->getPost('parent_id') == '' ? null : $this->request->getPost('parent_id'),
            'permission_id' => $this->request->getPost('permission_id'),
            'created_by' => session()->get('user_id'),
            'updated_by' => session()->get('user_id'),
            'is_active' => 1,
        ];
        $this->routeModel->save($data);
        return redirect('admin/route/create')->with('success', 'Thêm mới route thành công');
    }

    public function detail($id)
    {
        $permissions = $this->permissionModel->where('is_active', 1)->findAll();
        $routes = $this->routeModel
            ->where('is_group', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll();
        $data = $this->routeModel->where('id', $id)->first();
        $data_view = [
            'title' => 'Chi tiết quyền hạn',
            'data' => $data,
            'permissions' => $permissions,
            'routes' => $routes,
        ];
        return view('admin/route_view/detail_view', $data_view);
    }

    public function update($id)
    {
        echo $this->request->getPost('parent_id');
        $data = [
            'method' => $this->request->getPost('method'),
            'uri' => $this->request->getPost('uri'),
            'controller' => $this->request->getPost('controller'),
            'permission_id' => $this->request->getPost('permission_id'),
            'updated_by' => session()->get('user_id'),
            'is_group' => $this->request->getPost('is_group'),
            'level' => $this->request->getPost('level'),
            'parent_id' => $this->request->getPost('parent_id') == '' ? null : $this->request->getPost('parent_id'),
            'permission_id' => $this->request->getPost('permission_id'),
        ];
        $this->routeModel->update($id, $data);
        return redirect('admin/route')->with('success', 'Cập nhật route thành công');
    }

    public function delete($id)
    {
        $this->routeModel->delete($id);
        return redirect('admin/route')->with('success', 'Xóa thành công');
    }
}
