<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\DiscountModel;
use App\Models\AccountModel;
use App\Models\DiscountTypeModel;

class DiscountController extends BaseController
{
    protected $discountModel;
    protected $accountModel;
    protected $discountTypeModel;

    public function __construct()
    {
        $this->discountModel = new DiscountModel();
        $this->accountModel = new AccountModel();
        $this->discountTypeModel = new DiscountTypeModel();
        helper("common");
        helper("language");
    }

    public function index()
    {
        $data = $this->discountModel
            ->select('discounts.*, discount_types.name as discount_type_name')
            ->join('discount_types', 'discounts.discount_type_id = discount_types.id')
            ->where('discount_types.is_active', 1)
            ->where('discounts.is_active', 1)
            ->findAll();
        $data_view = [
            'title' => 'Danh sách khuyến mại',
            'data' => $data,
        ];
        return view('admin/discount_view/index_view', $data_view);
    }

    public function create()
    {
        $discount_types = $this->discountTypeModel->where('is_active', 1)->findAll();
        $data_view = [
            'title' => 'Thêm mới khuyến mại',
            'discount_types' => $discount_types,
        ];
        return view('admin/discount_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'discount_type_id' => $this->request->getPost('discount_type_id'),
            'discount_value' => str_replace('.', '', $this->request->getPost('discount_value')),
            'min_order_amount' => str_replace('.', '', $this->request->getPost('min_order_amount')),
            'max_discount' => str_replace('.', '', $this->request->getPost('max_discount')),
            'coupon_code' => $this->request->getPost('coupon_code'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'usage_limit' => str_replace('.', '', $this->request->getPost('usage_limit')),
            'created_by' => session()->get('user_id'),
            'is_active' => 1,
        ];
        EchoCommon($data);
        return;
        $this->discountModel->save($data);
        return redirect()->to('admin/discount')->with('success', 'Thêm mới thành công khuyến mại');
    }

    public function detail($id)
    {
        $discounts = $this->discountModel->find($id);
        $data_view = [
            'title' => 'Chi tiết khuyến mại',
            'data' => $discounts,
        ];
        return view('admin/discount_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'account_id' => $this->request->getPost('account_id'),
        ];
        $this->discountModel->update($id, $data);
        return redirect()->to('admin/warehouse')->with('success', 'Cập nhật thành công kho hàng');
    }

    public function delete($id)
    {
        $this->discountModel->delete($id);
        return redirect()->to('admin/discount')->with('success', 'Xoá thành công khuyến mại');
    }
}
