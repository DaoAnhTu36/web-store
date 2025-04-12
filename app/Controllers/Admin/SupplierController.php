<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data =  $this->supplierModel->getAllSupplierWithImage();
        $data_view = [
            "title" => "Danh sách nhà cung cấp",
            "data" => $data,
        ];
        return view("admin/supplier_view/index_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới nhà cung cấp",
        ];
        return view("admin/supplier_view/create_view", $data_view);
    }

    public function save()
    {
        helper(['form', 'url']);
        if ($this->request->is('post')) {
            $data = [
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'phone'   => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
            ];

            $record_id = $this->supplierModel->insert($data);
            if ($record_id) {
                $files = $this->request->getFiles();
                if ($files) {
                    foreach ($files['images'] as $img) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = $img->getRandomName();
                            $img->move('uploads/', $newName);

                            $imageModel = new \App\Models\ImageModel();
                            $imageModel->save([
                                'record_id' => $record_id,
                                'image_path' => 'uploads/' . $newName,
                                'type' => 'supplier',
                            ]);
                        }
                    }
                }
                return redirect()->to('admin/supplier')->with('success', 'Thêm nhà cung cấp thành công!');
            } else {
                return redirect()->back()->with('error', 'Thêm nhà cung cấp thất bại!');
            }
        } else {
            return redirect()->back()->with('error', 'Sai phương thức');
        }
        return view('admin/supplier');
    }

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
