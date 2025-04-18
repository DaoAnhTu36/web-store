<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AccountModel;
use App\Models\RolePermissionModel;

class AuthFilter implements FilterInterface
{
    protected $accountModel;
    protected $rolePermissionModel;

    public function __construct()
    {
        helper('cookie');
        helper('common');
        $this->accountModel = new AccountModel();
        $this->rolePermissionModel = new RolePermissionModel();
    }
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if (str_contains(strtolower($_SERVER['REQUEST_URI']), 'admin')) {
            if (!$session->get('is_logged_in') && str_contains(strtolower($_SERVER['REQUEST_URI']), 'admin')) {
                return redirect()->to('admin/account/login');
            }
            if ($arguments) {
                $permission = $arguments[0];
                $roleId = $session->get('role_id');
                $rolePermissions = $this->rolePermissionModel
                    ->select('role_permissions.permission_id')
                    ->join('permissions', 'permissions.id = role_permissions.permission_id', 'left')
                    ->join('roles', 'roles.id = role_permissions.role_id', 'left')
                    ->where('role_permissions.role_id', $roleId)
                    ->where('role_permissions.is_active', 1)
                    ->where('roles.is_active', 1)
                    ->where('permissions.is_active', 1)
                    ->findAll();
                if (empty($rolePermissions) || count($rolePermissions) == 0) {
                    return redirect()->back()->with('errors', 'Bạn không có quyền truy cập');
                }
                $permission_array = [];
                foreach ($rolePermissions as $value) {
                    array_push($permission_array, $value['permission_id']);
                }
                if (!in_array($permission, $permission_array)) {
                    return redirect()->back()->with('errors', 'Bạn không có quyền truy cập');
                }
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
