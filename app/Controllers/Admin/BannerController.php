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
        $validation = \Config\Services::validation();

        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $validation->setRules([
            'title'       => 'required|min_length[3]',
            'description' => 'required',
        ]);
        $check_validate_files = get_validate_upload_file($files);
        if ($check_validate_files != '') {
            $validation->setRules([
                'images' => $check_validate_files,
            ]);
        }
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
        return redirect()->back()->withInput()->with('success', 'Tạo banner thành công');
    }

    public function delete($id)
    {
        $this->bannerModel->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function detail($id)
    {
        $banner_info = $this->bannerModel
            ->select("banners.id
                    , banners.title
                    , banners.description
                    , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '), '') AS images")
            ->join('images', 'images.record_id = banners.id AND images.type = "banner"', 'left')
            ->groupBy('banners.id')
            ->where('banners.id', $id)
            ->first();
        $data_view = [
            'title' => 'Chỉnh sửa banner',
            'data' => $banner_info,
        ];
        return view('admin/banner_view/update_view', $data_view);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $files = $this->request->getFiles();
        $validation->setRules([
            'title'       => 'required|min_length[3]',
            'description' => 'required|min_length[20]',
        ], [
            'title' => [
                'required' => 'Tiêu đề là bắt buộc.',
                'min_length' => 'Độ dài tối thiểu là 3 ký tự.',
            ],
            'description' => [
                'required' => 'Mô tả là bắt buộc.',
                'min_length' => 'Độ dài tối thiểu là 20 ký tự.',
            ],
        ]);
        $check_validate_files = get_validate_upload_file($files);
        if ($check_validate_files != '') {
            $validation->setRules([
                'images' => $check_validate_files,
            ]);
        }
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            return redirect()->back()->withInput()->with('errors', $errors);
        }
        $data_insert = [
            'title' => $title,
            'description' => $description,
        ];
        $this->bannerModel->update($id, $data_insert);
        if ($files) {
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
        return redirect()->back()->withInput()->with('success', 'Tạo banner thành công');
    }
}
