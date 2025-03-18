<?php
// app/Controllers/Admin/RoleController.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class RoleController extends BaseController
{
    protected $roleModel;
    protected $permissionModel;
    protected $rolePermissionModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }
    public function index()
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/role_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/role_view/create_view', $data_view);
    }

    public function save() {}

    public function detail($id)
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/role_view/detail_view', $data_view);
    }

    public function update($id) {}

    public function delete($id) {}
}
