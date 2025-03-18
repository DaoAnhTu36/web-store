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
        $data_view = [
            'title' => ''
        ];
        return view('admin/permission_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/permission_view/create_view', $data_view);
    }

    public function save() {}

    public function detail($id)
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/permission_view/detail_view', $data_view);
    }

    public function update($id) {}

    public function delete($id) {}
}
