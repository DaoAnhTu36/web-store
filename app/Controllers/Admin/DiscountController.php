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
    }

    public function index()
    {
        $data = $this->discountModel
            ->select('discounts.*, discount_types.name as discount_type_name')
            ->join('discount_types', 'discounts.discount_type_id = discount_types.id')
            ->where('discount_types.is_active', 1)
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
        $rules = $this->discountModel->validationRules;
        $messages = $this->discountModel->validationMessages;

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'discount_type_id' => $this->request->getPost('discount_type_id'),
            'discount_value' => get_number_format_currency($this->request->getPost('discount_value')),
            'min_order_amount' => get_number_format_currency($this->request->getPost('min_order_amount')),
            'max_discount' => get_number_format_currency($this->request->getPost('max_discount')),
            'coupon_code' => $this->request->getPost('coupon_code'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'usage_limit' => get_number_format_currency($this->request->getPost('usage_limit')),
            'created_by' => session()->get('user_id'),
            'is_active' => 1,
        ];
        $this->discountModel->save($data);
        return redirect()->to('admin/discount')->with('success', 'Thêm mới thành công khuyến mại');
    }

    public function detail($id)
    {
        $discount_types = $this->discountTypeModel->where('is_active', 1)->findAll();
        $data = $this->discountModel
            ->select('discounts.*, discount_types.name as discount_type_name')
            ->join('discount_types', 'discounts.discount_type_id = discount_types.id')
            ->where('discount_types.is_active', 1)
            ->where('discounts.is_active', 1)
            ->where('discounts.id', $id)
            ->first();
        $data_view = [
            'title' => 'Chi tiết khuyến mại',
            'data' => $data,
            'discount_types' => $discount_types,
        ];
        return view('admin/discount_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $rules = $this->discountModel->validationRules;
        $messages = $this->discountModel->validationMessages;

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'discount_type_id' => $this->request->getPost('discount_type_id'),
            'discount_value' => get_number_format_currency($this->request->getPost('discount_value')),
            'min_order_amount' => get_number_format_currency($this->request->getPost('min_order_amount')),
            'max_discount' => get_number_format_currency($this->request->getPost('max_discount')),
            'coupon_code' => $this->request->getPost('coupon_code'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
            'usage_limit' => get_number_format_currency($this->request->getPost('usage_limit')),
            'updated_by' => session()->get('user_id'),
        ];
        $this->discountModel->update($id, $data);
        return redirect()->to('admin/discount')->with('success', 'Cập nhật thành công kho hàng');
    }

    public function delete($id)
    {
        $this->discountModel->delete($id);
        return redirect()->to('admin/discount')->with('success', 'Xoá thành công khuyến mại');
    }
}
