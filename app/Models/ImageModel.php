<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính
    protected $useAutoIncrement = true; // Sử dụng auto increment
    protected $allowedFields = ['record_id', 'image_path', 'type', 'created_by', 'updated_by', 'is_active']; // Các cột có thể insert/update

    public function delete_image($record_id, $type)
    {
        $query = "DELETE FROM images WHERE record_id = ? AND type = ?";
        return $this->db->query($query, [$record_id, $type]);
    }

    public function upload_image($files, $record_id, $type)
    {
        if (
            $files && !empty($type)
            && !empty($record_id)
            && count($files['images']) > 0
            && $files['images'][0]->getError() === UPLOAD_ERR_OK
        ) {
            $this->delete_image($record_id, $type);
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $file_name = $img->getName();
                    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                    $name_without_extension = pathinfo($file_name, PATHINFO_FILENAME) . '-' . $img->getRandomName();
                    $img->move('uploads/', $name_without_extension . '-' . $type . '.' . $extension);
                    $this->save([
                        'record_id' => $record_id,
                        'image_path' => 'uploads/' . $name_without_extension . '-' . $type . '.' . $extension,
                        'type' => $type,
                    ]);
                }
            }
        }
    }
}
