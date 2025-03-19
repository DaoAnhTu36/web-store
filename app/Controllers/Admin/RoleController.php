<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\PermissionModel;
use App\Models\RolePermissionModel;

class RoleController extends BaseController
{
    protected $roleModel;
    protected $permissionModel;
    protected $rolePermissionModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
        $this->rolePermissionModel = new RolePermissionModel();
        helper("common");
        helper("language");
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
        $roles = $this->roleModel->where('is_active', 1)->findAll();
        $permissions = $this->permissionModel->where('is_active', 1)->findAll();
        $data_view = [
            'title' => 'Thêm mới vai trò, chức vụ',
            'roles' => $roles,
            'permissions' => $permissions
        ];
        return view('admin/role_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $role_id = $this->roleModel->insert($data);
        $permissions = $this->request->getPost('permission_id');
        if (empty($permissions) || empty($role_id)) {
            $permissions = [];
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
        return redirect()->route('admin/role')->with('success', 'Thêm mới thành công');
    }

    public function detail($id)
    {
        $data_collection_permission = [];
        $role_permission_new = [];
        $data = $this->roleModel->find($id);
        $permissions = $this->permissionModel->where('is_active', 1)->findAll();
        $role_permissions = $this->rolePermissionModel
            ->select('permission_id, is_active')
            ->where('role_id', $id)
            ->findAll();

        foreach ($role_permissions as $key => $value) {
            array_push($role_permission_new, [
                'permission_id' => $value['permission_id'],
                'is_active' => $value['is_active'],
            ]);
        }

        foreach ($permissions as $permission) {
            $checkExist = array_filter($role_permission_new, function ($value) use ($permission) {
                return $value['permission_id'] == $permission['id'];
            });
            $resultFilter = $checkExist ? array_values($checkExist) : [];
            if ($resultFilter && count($resultFilter) > 0 && $resultFilter[0]['is_active']) {
                array_push($data_collection_permission, [
                    'id' => $permission['id'],
                    'is_checked' => 1,
                    'name' => $permission['name'],
                ]);
            } else {
                array_push($data_collection_permission, [
                    'id' => $permission['id'],
                    'is_checked' => 0,
                    'name' => $permission['name'],
                ]);
            }
        }
        $data_view = [
            'title' => 'Thông tin vai trò, chức vụ',
            'data' => $data,
            'permissions' => $data_collection_permission
        ];
        return view('admin/role_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $name = $this->request->getPost('name');
        $data = [
            'name' => $name,
        ];
        $this->roleModel->update($id, $data);
        return redirect()->route('admin/role')->with('success', 'Cập nhật thông tin thành công');
    }

    public function delete($id)
    {
        $this->rolePermissionModel->where('role_id', $id)->delete();
        $this->roleModel->delete($id);
        return redirect()->route('admin/role')->with('success', 'Xóa thành công');
    }
}
