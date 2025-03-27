<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\WebsiteConfigModel;
use App\Models\ImageModel;

class WebsiteConfigController extends BaseController
{
    protected $model;
    protected $modelImage;

    public function __construct()
    {
        $this->model = new WebsiteConfigModel();
        $this->modelImage = new ImageModel();
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
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'config_key' => 'required',
            'config_value' => 'required',
        ]);
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        if ($check_validate_files != '') {
            $validation->setRules([
                'images' => $check_validate_files,
            ]);
        }
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', implode(', ', $validation->getErrors()));
        }
        $data = [
            'config_key' => $this->request->getPost('config_key'),
            'config_value' => $this->request->getPost('config_value'),
            'description' => $this->request->getPost('description'),
        ];
        $record_id = $this->model->insert($data);
        session()->remove('web_configs');
        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);
                    $this->modelImage->save([
                        'record_id' => $record_id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'website_configs',
                    ]);
                }
            }
        }
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
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'config_key' => 'required',
            'config_value' => 'required',
        ]);
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        if ($check_validate_files != '') {
            $validation->setRules([
                'images' => $check_validate_files,
            ]);
        }
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', implode(', ', $validation->getErrors()));
        }
        $data = [
            'config_key' => $this->request->getPost('config_key'),
            'config_value' => $this->request->getPost('config_value'),
            'description' => $this->request->getPost('description'),
        ];
        $this->model->update($id, $data);
        session()->remove('web_configs');
        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);
                    $this->modelImage->save([
                        'record_id' => $id,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'website_configs',
                    ]);
                    $check_exist = $this->modelImage->where('record_id', $id)->where('type', 'website_configs')->first();
                    if ($check_exist) {
                        $this->modelImage->delete($check_exist['id']);
                    }
                }
            }
        }

        return redirect()->to('admin/website-config')->with('success', 'Cập nhật thành công cấu hình website');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->remove('web_configs');
        return redirect()->to('admin/website-config')->with('success', 'Xóa thành công cấu h
    ình website');
    }
}
