<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannerModel;
use App\Models\ImageModel;

class BannerController extends BaseController
{
    protected $bannerModel;
    protected $imageModel;
    protected $image_type = 'banner';
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
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data_insert = [
            'title' => $title,
            'description' => $description,
        ];
        $record_id = $this->bannerModel->insert($data_insert);
        $this->imageModel->upload_image($files, $record_id, $this->image_type);
        return redirect()->to('admin/banner')->with('success', 'Tạo mới banner thành công');
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
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data_insert = [
            'title' => $title,
            'description' => $description,
        ];
        $this->bannerModel->update($id, $data_insert);
        $this->imageModel->upload_image($files, $id, $this->image_type);
        return redirect()->to('admin/banner')->with('success', 'Cập nhật banner thành công');
    }
}
