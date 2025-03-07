<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UploadController extends BaseController
{
    public function uploadImage()
    {
        if ($file = $this->request->getFile('upload')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/', $newName);

                $response = [
                    "uploaded" => 1,
                    "fileName" => $newName,
                    "url" => base_url('uploads/' . $newName)
                ];
                return $this->response->setJSON($response);
            }
        }

        return $this->response->setJSON(["uploaded" => 0, "error" => ["message" => "File upload failed."]]);
    }

    public function managerFile()
    {
        $path = FCPATH . 'uploads/'; // Thư mục chứa ảnh
        $files = glob($path . '*.{jpg,png,gif}', GLOB_BRACE);
        $fileList = [];

        foreach ($files as $file) {
            $fileList[] = [
                'url' => base_url('uploads/' . basename($file)),
                'name' => basename($file)
            ];
        }

        $data_view = [
            'fileList' => $fileList
        ];
        return view('admin/ckfinder_view', $data_view);
    }
}
