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
        $data_session = [
            'title' => session()->get('data_temp')['title'] ?? '',
            'description' => session()->get('data_temp')['description'] ?? '',
        ];

        $data_view = [
            'title' => 'Tạo mới banner',
            'data' => $data_session,
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
            ], [
                'images' => [
                    'max_size' => 'Ảnh dưới 150kb',
                    'mime_in' => 'Chỉ chấp nhận file có phần mở rộng là: jpg,jpeg,png',
                ],
            ]);
        }
        if (!$validation->withRequest($this->request)->run()) {
            session()->set('data_temp', [
                'title' => $title,
                'description' => $description,
            ]);
            return redirect()->to('admin/banner/create')->with('errors', $validation->getErrors());
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
        session()->remove('data_temp');
        return redirect()->back()->with('success', 'Tạo banner thành công');
    }

    public function delete($id)
    {
        $this->bannerModel->delete($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    public function detail($id)
    {
        $banner_info = $this->bannerModel->get_detail_banner($id);
        $data_session = [
            'title' => session()->get('data_temp')['title'] ?? '',
            'description' => session()->get('data_temp')['description'] ?? '',
        ];
        $banner_info['title'] = !empty($data_session['title']) ? $data_session['title'] : $banner_info['title'];
        $banner_info['description'] = !empty($data_session['description']) ? $data_session['description'] : $banner_info['description'];
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
            session()->set('data_temp', [
                'title' => $title,
                'description' => $description,
            ]);
            return redirect()->back()->with('errors', $errors);
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
        session()->remove('data_temp');
        return redirect()->back()->with('success', 'Cập nhật banner thành công');
    }
}
