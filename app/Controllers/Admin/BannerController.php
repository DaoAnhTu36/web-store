<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\ImageModel;

class BannerController extends BaseController
{
    protected $bannerModel;
    protected $imageModel;
    public function __construct()
    {
        $this->bannerModel = new BannerModel();
        $this->imageModel = new ImageModel();
    }

    public function index()
    {
        $data = $this->bannerModel->findAll();
        $data_view = [
            'title' => 'Danh sách banner',
            'data' => $data,
        ];
        return view('admin/banner_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => 'Tạo mới banner',
        ];
        return view('admin/banner_view/create_view', $data_view);
    }

    public function save()
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->bannerModel->validationRules;
        $messages = $this->bannerModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }

        if (!$this->validate($rules, $messages)) {
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $data_insert = [
            'title' => $title,
            'description' => $description,
        ];
        $banner_id = $this->bannerModel->insert($data_insert);
        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);
                    $this->imageModel->save([
                        'record_id' => $banner_id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'banner',
                    ]);
                }
            }
        }
        return apiResponse(message: 'Tạo mới banner thành công');
    }

    public function delete($id)
    {
        $this->imageModel->delete_image($id, 'banner');
        $this->bannerModel->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function detail($id)
    {
        $banner_info = $this->bannerModel->get_detail_banner($id);
        $data_view = [
            'title' => 'Chỉnh sửa banner',
            'data' => $banner_info,
        ];
        return view('admin/banner_view/update_view', $data_view);
    }

    public function update($id)
    {
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->bannerModel->validationRules;
        $messages = $this->bannerModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }

        if (!$this->validate($rules, $messages)) {
            return apiResponse(status: false, message: implode(',', $this->validator->getErrors() ?: []));
        }

        $data_insert = [
            'title' => $title,
            'description' => $description,
        ];
        $this->bannerModel->update($id, $data_insert);
        if ($files) {
            $this->imageModel->delete_image($id, 'banner');
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);
                    $this->imageModel->save([
                        'record_id' => $id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'banner',
                    ]);
                }
            }
        }
        return apiResponse(message: 'Cập nhật banner thành công');
    }
}
