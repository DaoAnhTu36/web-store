<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductAttributeModel;

class ProductAttributeController extends BaseController
{
    protected $productAttributeModel;

    public function __construct()
    {
        helper("common");
        $this->productAttributeModel = new ProductAttributeModel();
    }

    public function index()
    {
        $data = $this->productAttributeModel->findAll();
        $data_view = [
            "title" => "Danh sách thuộc tính sản phẩm",
            "data" => $data,
        ];

        return view("admin/product_attribute_view/index_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới thuộc tính sản phẩm",
        ];

        return view("admin/product_attribute_view/create_view", $data_view);
    }

    public function save()
    {
        $data = [
            "attribute_name" => $this->request->getPost('attribute_name'),
            "attribute_value" => $this->request->getPost('attribute_value'),
            'created_by' => session()->get('user_id'),
            'updated_by' => session()->get('user_id'),
        ];
        $checkExist = $this->productAttributeModel->where('attribute_name', $data['attribute_name'])->where('attribute_value', $data['attribute_value'])->first();
        if ($checkExist) {
            return redirect()->to('admin/product-attributes/create')->with('errors', 'Đã tồn tại trong hệ thống');
        }
        $this->productAttributeModel->save($data);
        return redirect()->to('admin/product-attributes/index')->with('success', 'Thêm mới thành công');
    }

    public function detail($id)
    {
        $data_view = [
            'title' => 'Thông tin chi tiết thuộc tính sản phẩm',
            'data' => $this->productAttributeModel->find($id),
        ];
        return view('admin/product_attribute_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $data = [
            "attribute_name" => $this->request->getPost('attribute_name'),
            "attribute_value" => $this->request->getPost('attribute_value'),
            'updated_by' => session()->get('user_id'),
        ];
        $checkExist = $this->productAttributeModel
            ->where('attribute_name', $data['attribute_name'])
            ->where('attribute_value', $data['attribute_value'])->first();
        if ($checkExist && $checkExist['id'] != $id) {
            return redirect()->to('admin/product-attributes/detail/' . $id)->with('errors', 'Đã tồn tại trong hệ thống');
        }
        $this->productAttributeModel->update($id, $data);
        return redirect()->to('admin/product-attributes/index')->with('success', 'Cập nhật thông tin thành công');
    }

    public function delete($id)
    {
        if ($this->productAttributeModel->delete($id)) {
            return redirect()->back()->with('success', 'Xóa thành công!');
        } else {
            return redirect()->back()->with('errors', 'Xóa thất bại');
        }
    }
}
