<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ManagerFileController extends BaseController
{
    public function __construct() {}

    public function index()
    {
        $dir = "uploads/";
        $files = array_diff(scandir($dir), array('..', '.'));
        $data_view = [
            "title" => "Danh sách tệp",
            "files" => $files,
        ];
        return view("admin/manager_file_view/index_view", $data_view);
    }

    public function upload_file()
    {
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $name = $_FILES['images']['name'][$key];
                $size = $_FILES['images']['size'][$key];
                $type = mime_content_type($tmp_name);
                if (strpos($type, 'image') === false) {
                    echo "$name không phải ảnh!<br>";
                    continue;
                }
                if ($size > 150 * 1024) {
                    echo "$name > 150KB, upload bị từ chối!<br>";
                    continue;
                }
                $ext = pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
                $newName = uniqid() . "_" . bin2hex(random_bytes(5)) . "." . $ext;
                $target = "uploads/" . $newName;
                move_uploaded_file($tmp_name, $target);

                echo "$name uploaded thành công!<br>";
            }
        } else {
            echo "Không có file!";
        }
    }

    public function delete_image()
    {
        $fileName = $this->request->getPost('file_name');
        $filePath = 'uploads/' . $fileName;

        if (file_exists($filePath)) {
            unlink($filePath);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Xóa tệp thành công.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Tệp không tồn tại.']);
        }
    }
}
