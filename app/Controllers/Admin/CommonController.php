<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AccountModel;

class CommonController extends BaseController
{
    protected $accountModel;

    public function __construct()
    {
        helper("common");
        $this->accountModel = new AccountModel();
    }

    public function changeStatusRecordCommon()
    {
        $id = $this->request->getPost('id');
        $server_current = $this->request->getPost('server_current');
        echo $server_current;
        switch ($server_current) {
            case '/web-store/admin/account/administrator-list':
            case '/web-store/admin/account/customer-list':
                $this->updateStatusCommon($id, 'accounts');
                break;
            case '/web-store/admin/category':
                $this->updateStatusCommon($id, 'categories');
                break;
            case '/web-store/admin/product':
                $this->updateStatusCommon($id, 'products');
                break;
            case '/web-store/admin/warehouse':
                $this->updateStatusCommon($id, 'warehouses');
                break;
            case '/web-store/admin/transaction/import-list':
            case '/web-store/admin/transaction/export-list':
                $this->updateStatusCommon($id, 'transactions');
                break;
            case '/web-store/admin/supplier':
                $this->updateStatusCommon($id, 'suppliers');
                break;
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Thay đổi trạng thái thành công'
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
