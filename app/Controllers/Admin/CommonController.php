<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class CommonController extends BaseController
{
    protected $accountModel;

    public function __construct()
    {
        $this->accountModel = new AccountModel();
    }

    public function changeStatusRecordCommon()
    {
        $result = true;
        $id = $this->request->getPost('id');
        $server_current = $this->request->getPost('server_current');
        if (isset($server_current)) {
            $controller = explode('admin/', $server_current);
            if (isset($controller[1])) {
                // echo $controller[1];
                switch ($controller[1]) {
                    case 'account/administrator-list':
                    case 'account/customer-list':
                        $this->updateStatusCommon($id, 'accounts');
                        break;
                    case 'category':
                        $this->updateStatusCommon($id, 'categories');
                        break;
                    case 'product':
                        $this->updateStatusCommon($id, 'products');
                        break;
                    case 'warehouse':
                        $this->updateStatusCommon($id, 'warehouses');
                        break;
                    case 'transaction/import-list':
                    case 'transaction/export-list':
                        $this->updateStatusCommon($id, 'transactions');
                        break;
                    case 'supplier':
                        $this->updateStatusCommon($id, 'suppliers');
                        break;
                    case 'role':
                    case 'role/index':
                        $this->updateStatusCommon($id, 'roles');
                        break;
                    case 'permission':
                    case 'permission/index':
                        $this->updateStatusCommon($id, 'permissions');
                        break;
                    case 'role-permission':
                    case 'role-permission/index':
                        $this->updateStatusCommon($id, 'role_permissions');
                        break;
                    case 'route':
                        $this->updateStatusCommon($id, 'routes');
                        break;
                        break;
                    case 'product-attributes/index':
                    case 'product-attributes':
                        $this->updateStatusCommon($id, 'product_attributes');
                        break;
                        break;
                    case 'discount/index':
                    case 'discount':
                        $this->updateStatusCommon($id, 'discounts');
                        break;
                        break;
                    case 'discount-type/index':
                    case 'discount-type':
                        $this->updateStatusCommon($id, 'discount_types');
                        break;
                        break;
                    case 'product-discount/index':
                    case 'product-discount':
                        $this->updateStatusCommon($id, 'product_discounts');
                        break;
                    default:
                        $result = false;
                        break;
                }
            }
        }
        return $this->response->setJSON([
            'status' => $result ? 'success' : 'error',
            'message' => $result ? 'Thay đổi trạng thái thành công' : 'Có lỗi xảy ra'
        ]);
    }

    public function updateStatusCommon($id, $table_name)
    {
        $db = \Config\Database::connect();
        $builder = $db->table($table_name);
        $query = $builder
            ->where('id', $id)
            ->limit(1)
            ->get()
            ->getRow();
        $data = [
            'is_active' => !$query->is_active,
        ];

        $builder->where('id', $id)->update($data);
    }
}
