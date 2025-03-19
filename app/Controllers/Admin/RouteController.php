<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RouteModel;

class RouteController extends BaseController
{
    protected $routeModel;

    public function __construct()
    {
        $this->routeModel = new RouteModel();
        helper("common");
    }

    public function index()
    {
        $data = $this->routeModel->orderBy('updated_at', 'desc')->findAll();
        $data_view = [
            'title' => 'Danh sách route',
            'data' => $data,
        ];
        return view('admin/route_view/index_view', $data_view);
    }

    public function create()
    {
        $data = $this->routeModel
            ->where('is_group', 1)
            ->orderBy('updated_at', 'desc')
            ->findAll();
        $data_view = [
            'title' => 'Tạo mới route',
            'data' => $data,
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
            'parent_id' => $this->request->getPost('parent_id'),
            'created_by' => session()->get('user_id'),
            'updated_by' => session()->get('user_id'),
            'is_active' => 1,
        ];
        // EchoCommon($data);
        $this->routeModel->save($data);
        return redirect('admin/route/create')->with('success', 'Thêm mới route thành công');
    }

    public function detail($id)
    {
        $data = $this->routeModel->where('id', $id)->first();
        $data_view = [
            'title' => 'Chi tiết quyền hạn',
            'data' => $data,
        ];
        return view('admin/route_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'method' => $this->request->getPost('method'),
            'uri' => $this->request->getPost('uri'),
            'controller' => $this->request->getPost('controller'),
            'filters' => $this->request->getPost('filters'),
            'updated_by' => session()->get('user_id'),
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
