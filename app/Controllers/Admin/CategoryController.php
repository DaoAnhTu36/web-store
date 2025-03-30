<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ImageModel;

class CategoryController extends BaseController
{
    protected $categoryModel;
    protected $imageModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ImageModel();
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
        $data = [
            'title' => 'Thêm mới danh mục',
        ];
        return view('admin/category_view/create_view', $data);
    }

    public function save()
    {
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
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $record_id = $this->categoryModel->insert([
            'name' => $name,
            'description' => $description,
        ]);

        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);

                    $this->imageModel->save([
                        'record_id' => $record_id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'category',
                    ]);
                }
            }
        }
        return apiResponse(message: 'Thêm mới danh mục thành công');
    }

    public function delete($id)
    {
        $this->categoryModel->deleteCategory($id);
        return redirect()->to('admin/category')->with('success', 'Xóa danh mục thành công.');
    }

    public function detail($id)
    {
        $data = $this->categoryModel->get_category_with_image_by_id($id);
        $data_view = [
            'data' => $data,
            'title' => 'Chi tiết danh mục'
        ];
        return view('admin/category_view/update_view', $data_view);
    }

    public function update($id)
    {
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
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $record_id = $this->categoryModel->update($id, [
            'name' => $name,
            'description' => $description,
        ]);

        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);

                    $this->imageModel->save([
                        'record_id' => $record_id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'category',
                    ]);
                }
            }
        }
        return apiResponse(message: 'Cập nhật danh mục thành công');
    }
}
