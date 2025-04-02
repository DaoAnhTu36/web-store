<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ImageModel;

class WebsiteConfigModel extends Model
{
    protected $table      = 'website_configs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['config_key', 'config_value', 'description', 'created_at', 'updated_at', 'type'];

    protected $validationRules    = [
        'config_key'        => 'required',
        'config_value' => 'required',
    ];

    protected $validationMessages = [
        'config_key' => [
            'required'   => 'Khóa là bắt buộc.',
        ],
        'config_value' => [
            'required' => 'Giá trị là bắt buộc.',
        ],
    ];

    public function getConfig($key)
    {
        return $this->where('config_key', $key)->first();
    }

    public function updateConfig($key, $value)
    {
        return $this->where('config_key', $key)->set(['config_value' => $value])->update();
    }

    public function getAllConfigs()
    {
        $configs = $this->findAll();
        $result = [];
        if (count($configs) > 0) {
            foreach ($configs as $config) {
                if ($config['type'] == 1) {
                    $imageModel = new ImageModel();
                    $image = $imageModel->where('record_id', $config['id'])->where('type', 'website_configs')->first();
                    if ($image !== null) {
                        $result[$config['config_key']] = $image['image_path'];
                    }
                } else {
                    $result[$config['config_key']] = $config['config_value'];
                }
            }
        }
        // debug_object($result);
        return $result;
    }

    public function get_all_config()
    {
        return $this->select("website_configs.*
        , IFNULL(images.record_id,'') AS image_record_id
        , IFNULL(images.type,'') AS type_record
        , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '), '') AS images
        ")
            ->join('images', "images.record_id = website_configs.id AND images.type = 'website_configs'", 'left')
            ->groupBy('website_configs.id')
            ->orderBy('created_at', 'desc')
            ->findAll();
    }
    public function get_config_by_id($id)
    {
        return $this->select("website_configs.*
                , IFNULL(images.record_id,'') AS image_record_id
                , IFNULL(images.type,'') AS type_record
                , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '), '') AS images
                ")
            ->join('images', "images.record_id = website_configs.id AND images.type = 'website_configs'", 'left')
            ->where('website_configs.id', $id)
            ->groupBy('website_configs.id')
            ->first();
    }
}
