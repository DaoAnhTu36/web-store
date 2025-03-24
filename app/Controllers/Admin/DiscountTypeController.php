<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\DiscountTypeModel;

class DiscountTypeController extends BaseController
{
    protected $discountTypeModel;

    public function __construct()
    {
        $this->discountTypeModel = new DiscountTypeModel();
        helper("common");
        helper("language");
    }

    public function index()
    {
        $data = $this->discountTypeModel->findAll();
        $data_view = [
            'title' => 'Danh sách loại khuyến mại',
            'data' => $data,
        ];
        return view('admin/discount_type_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => 'Thêm mới loại khuyến mại',
        ];
        return view('admin/discount_type_view/create_view', $data_view);
    }

    public function save()
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->discountTypeModel->save($data);
        return redirect()->to('admin/discount-type/create')->with('success', 'Thêm mới thành công loại khuyến mại');
    }

    public function detail($id)
    {
        $discountType = $this->discountTypeModel->find($id);
        $data_view = [
            'title' => 'Chi tiết loại khuyến mại',
            'data' => $discountType,
        ];
        return view('admin/discount_type_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->request->getPost('name'),
        ];
        $this->discountTypeModel->update($id, $data);
        return redirect()->to('admin/discount-type')->with('success', 'Cập nhật thành công loại khuyến mại');
    }

    public function delete($id)
    {
        $discountType = $this->discountTypeModel->find($id);
        if ($discountType) {
            $this->discountTypeModel->delete($id);
        }
        return redirect()->to('admin/discount-type')->with('success', 'Xóa loại khuyến mại thành công');
    }
}
