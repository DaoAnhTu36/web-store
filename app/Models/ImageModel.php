<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['record_id', 'image_path', 'type', 'created_by', 'updated_by', 'is_active'];

    public function delete_image($record_id, $type)
    {
        $query = "DELETE FROM images WHERE record_id = ? AND type = ?";
        return $this->db->query($query, [$record_id, $type]);
    }

    public function upload_image($files, $record_id, $type, $record_name = '')
    {
        $image_array = [];
        if (
            $files && !empty($type)
            && !empty($record_id)
            && count($files['images']) > 0
            && $files['images'][0]->getError() === UPLOAD_ERR_OK
        ) {
            $this->delete_image($record_id, $type);
            $index = 1;
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $file_name = $img->getName();
                    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                    $name_without_extension = pathinfo($file_name, PATHINFO_FILENAME) . '-' . $index;
                    if (!empty($record_name)) {
                        $newName = convert_vi_to_slug($record_name) . '-' . $index . '-' . $img->getRandomName() . '.' . $extension;
                    } else {
                        $newName = $name_without_extension . '-' . $type . '-' . $img->getRandomName() . '.' . $extension;
                    }
                    $full_path = 'uploads/' . $newName;
                    $img->move('uploads/', $newName);
                    $this->save([
                        'record_id' => $record_id,
                        'image_path' => $full_path,
                        'type' => $type,
                    ]);

                    array_push($image_array, $full_path);
                }
            }
        }
        return $image_array;
    }
}
