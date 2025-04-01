<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\WebsiteConfigModel;
use App\Models\ImageModel;

class WebsiteConfigController extends BaseController
{
    protected $model;
    protected $imageModel;
    protected $image_type;
    public $key_name_session = 'web_configs';

    public function __construct()
    {
        $this->model = new WebsiteConfigModel();
        $this->imageModel = new ImageModel();
        $this->image_type = 'website_configs';
    }

    public function index()
    {
        $data = $this->model
            ->select("website_configs.*
            , IFNULL(images.record_id,'') AS image_record_id
            , IFNULL(images.type,'') AS type_record
            , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '), '') AS images
            ")
            ->join('images', "images.record_id = website_configs.id AND images.type = 'website_configs'", 'left')
            ->groupBy('website_configs.id')
            ->orderBy('created_at', 'desc')
            ->findAll();
        $data_view = [
            'title' => 'Danh sách cấu hình website',
            'data' => $data
        ];
        return view('admin/website_config_view/index_view', $data_view);
    }

    public function create()
    {
        $data_view = [
            'title' => 'Thêm mới cấu hình website',
        ];
        return view('admin/website_config_view/create_view', $data_view);
    }

    public function save()
    {
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->websiteConfigModel->validationRules;
        $messages = $this->websiteConfigModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'config_key' => $this->request->getPost('config_key'),
            'config_value' => $this->request->getPost('config_value'),
            'description' => $this->request->getPost('description'),
        ];
        $record_id = $this->model->insert($data);
        $this->imageModel->upload_image($files, $record_id, $this->image_type);
        session()->remove($this->key_name_session);
        return redirect()->to('admin/website-config')->with('success', 'Thêm mới thành công cấu hình website');
    }

    public function detail($id)
    {
        $data = $this->model
            ->select("website_configs.*
                    , IFNULL(images.record_id,'') AS image_record_id
                    , IFNULL(images.type,'') AS type_record
                    , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '), '') AS images
                    ")
            ->join('images', "images.record_id = website_configs.id AND images.type = 'website_configs'", 'left')
            ->where('website_configs.id', $id)
            ->groupBy('website_configs.id')
            ->first();
        $data_view = [
            'title' => 'Chi tiết cấu hình website',
            'data' => $data,
        ];
        return view('admin/website_config_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->websiteConfigModel->validationRules;
        $messages = $this->websiteConfigModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $data = [
            'config_key' => $this->request->getPost('config_key'),
            'config_value' => $this->request->getPost('config_value'),
            'description' => $this->request->getPost('description'),
        ];
        $this->model->update($id, $data);
        $this->imageModel->upload_image($files, $id, $this->image_type);
        session()->remove($this->key_name_session);
        return redirect()->to('admin/website-config')->with('success', 'Cập nhật thành công cấu hình website');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        $this->imageModel->delete_image($id, $this->image_type);
        session()->remove($this->key_name_session);
        return redirect()->to('admin/website-config')->with('success', 'Xóa thành công cấu h
    ình website');
    }
}
