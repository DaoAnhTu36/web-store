<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class CategoryController extends BaseController
{
    public function __construct()
    {
        helper("common");
        helper("language");
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
            "controller" => lang("Validation.category_controller_label"),
            "method" => lang("Validation.category_method_label"),
            "title_label" => lang("Validation.category_create_title_label"),
            "title_info_label" => lang("Validation.category_title_infor_label"),
            "name_label" => lang("Validation.category_name_label"),
            "image_label" => lang("Validation.image_label"),
            "description_label" => lang("Validation.description_label"),
            "cancel_button_label" => lang("Validation.cancel_button_label"),
            "save_button_label" => lang("Validation.save_button_label"),
        ];
        return view('admin/category_view/add_view', $data);
    }

    public function save()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'description_record' => 'required',
            'images' => 'uploaded[images]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
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

    public function update($id)
    {
        $categoryModel = new \App\Models\CategoryModel();
        $data = $categoryModel->getCategoriesWithImagesById($id);

        if (!$data) {
            return redirect()->to('admin/category')->with('error', 'Danh mục không tồn tại.');
        }
        $data_view = [
            "controller" => "Danh mục",
            "method" => "Cập nhật",
            "title_label" => lang("Validation.category_update_title_label"),
            "title_info_label" => lang("Validation.category_title_infor_label"),
            "name_label" => lang("Validation.category_name_label"),
            "image_label" => lang("Validation.image_label"),
            "description_label" => lang("Validation.description_label"),
            "cancel_button_label" => lang("Validation.cancel_button_label"),
            "save_button_label" => lang("Validation.save_button_label"),
            "data" => $data,
        ];
        return view('admin/category_view/update_view', $data_view);
    }
}
