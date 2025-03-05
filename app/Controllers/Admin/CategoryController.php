<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function __construct()
    {
        helper("common");
    }

    public function index()
    {
        $model = new \App\Models\CategoryModel();
        $data = $model->getCategoriesWithImages();
        // EchoCommon($data);
        $data_view = [
            'title' => 'Danh sách danh mục sản phẩm',
            "controller" => "Danh mục",
            "method" => "Danh sách",
            'data' => $data,
        ];
        return view('admin/category_view/index_view', $data_view);
    }

    public function create()
    {
        $data = [
            "controller" => "Danh mục",
            "method" => "Thêm mới",
        ];
        return view('admin/category_view/add_view', $data);
    }

    public function delete($id)
    {
        $categoryModel = new \App\Models\CategoryModel();

        if ($categoryModel->find($id)) {
            $categoryModel->deleteCategory($id);
            return redirect()->to('admin/category')->with('success', 'Xóa danh mục thành công.');
        } else {
            return redirect()->to('admin/category')->with('error', 'Danh mục không tồn tại.');
        }
    }

    public function detail($id)
    {
        $categoryModel = new \App\Models\CategoryModel();
        $item = $categoryModel->find($id);
        if ($item) {
            EchoCommon($item);
        } else {
            return redirect()->to('admin/category')->with('error', 'Danh mục không tồn tại.');
        }
    }

    public function insert()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'description_record' => 'required',
            'images' => 'uploaded[images]|max_size[images,2048]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model = new \App\Models\CategoryModel();
        $record_id = $model->insert([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description_record'),
        ]);

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
                    ]);
                }
            }
        }

        return redirect()->to('admin/category')->with('success', 'Danh mục đã được thêm!');
    }
}
