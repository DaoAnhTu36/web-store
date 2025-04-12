<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ImageModel;

class CategoryController extends BaseController
{
    protected $categoryModel;
    protected $imageModel;
    protected $image_type;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ImageModel();
        $this->image_type = 'category';
    }

    public function index()
    {
        $data = $this->categoryModel->get_category_with_image();
        $data_view = [
            'title' => 'Danh sách danh mục sản phẩm',
            'data' => $data,
        ];
        return view('admin/category_view/index_view', $data_view);
    }

    public function create()
    {
        $categories = $this->categoryModel->get_all_category();
        $data_view = [
            'title' => 'Thêm mới danh mục',
            'categories' => $categories,
        ];
        return view('admin/category_view/create_view', $data_view);
    }

    public function save()
    {
        $name = $this->request->getPost('name');
        $parent_id = $this->request->getPost('parent_id');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->categoryModel->validationRules;
        $messages = $this->categoryModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $record_id = $this->categoryModel->insert([
            'name' => $name,
            'description' => $description,
            'parent_id' => $parent_id,
        ]);

        $this->imageModel->upload_image($files, $record_id, $this->image_type);

        return redirect()->to('admin/category')->with('success', 'Thêm mới danh mục thành công');
    }

    public function delete($id)
    {
        $this->categoryModel->delete_category($id);
        $this->imageModel->delete_image($id, $this->image_type);
        return redirect()->to('admin/category')->with('success', 'Xóa danh mục thành công.');
    }

    public function detail($id)
    {
        $categories = $this->categoryModel->get_all_category();
        $data = $this->categoryModel->get_category_with_image_by_id($id);
        $data_view = [
            'data' => $data,
            'title' => 'Chi tiết danh mục',
            'categories' => $categories,
        ];
        return view('admin/category_view/update_view', $data_view);
    }

    public function update($id)
    {
        $parent_id = $this->request->getPost('parent_id');
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->categoryModel->validationRules;
        $messages = $this->categoryModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $this->categoryModel->update($id, [
            'name' => $name,
            'description' => $description,
            'parent_id' => $parent_id,
        ]);

        $this->imageModel->upload_image($files, $id, $this->image_type);

        return redirect()->to('admin/category')->with('success', 'Cập nhật danh mục thành công');
    }
}
