<?php
// app/Controllers/Admin/RoleController.php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RolePermissionModel;
use App\Models\RoleModel;
use App\Models\PermissionModel;

class RolePermissionController extends BaseController
{
    protected $rolePermissionModel;
    protected $roleModel;
    protected $permissionModel;

    public function __construct()
    {
        $this->rolePermissionModel = new RolePermissionModel();
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
    }
    public function index()
    {
        $role_permissions = $this->rolePermissionModel->rolePermissionList();
        EchoCommon($role_permissions);
        // $data_view = [
        //     'title' => 'Danh sách phân quyền'
        // ];
        // return view('admin/role_permission_view/index_view', $data_view);
    }

    public function create()
    {
        $roles = $this->roleModel->where('is_active', 1)->findAll();
        $permissions = $this->permissionModel->where('is_active', 1)->findAll();
        $data_view = [
            'title' => 'Tạo mới phân quyền',
            'roles' => $roles,
            'permissions' => $permissions
        ];
        return view('admin/role_permission_view/create_view', $data_view);
    }

    public function save()
    {
        $role_id = $this->request->getPost('role_id');
        $permissions = $this->request->getPost('permission_id');
        if (empty($permissions) || empty($role_id)) {
            return redirect()->back()->with('errors', 'Lỗi! Thiếu dữ liệu');
        }
        foreach ($permissions as $value) {
            if (!empty($value)) {
                $data = [
                    'permission_id' => $value,
                    'role_id' => $role_id,
                ];
                $this->rolePermissionModel->save($data);
            }
        }
        return redirect()->route('admin/role-permission')->with('success', 'Phân quyền thành công');
    }

    public function detail($id)
    {
        $data_view = [
            'title' => ''
        ];
        return view('admin/role_permission_view/detail_view', $data_view);
    }

    public function update($id) {}

    public function delete($id) {}
    public function changeRolePermission()
    {
        $role_id = $this->request->getPost('role_id');
        $permission_id = $this->request->getPost('permission_id');
        $checkRolePermission = $this->rolePermissionModel
            ->where('role_id', $role_id)
            ->where('permission_id', $permission_id)->first();
        if ($checkRolePermission) {
            $data_update = [
                'is_active' => !$checkRolePermission['is_active']
            ];
            $this->rolePermissionModel->update($checkRolePermission['id'], $data_update);
        } else {
            $data_insert = [
                'is_active' => 1,
                'role_id' => $role_id,
                'permission_id' => $permission_id
            ];
            $this->rolePermissionModel->save($data_insert);
        }
        return $this->response->setJSON(['status' => 'success', 'message' => 'Thay đổi quyền truy cập thành công']);
    }
}
