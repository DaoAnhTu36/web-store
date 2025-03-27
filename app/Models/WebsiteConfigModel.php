<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ImageModel;

class WebsiteConfigModel extends Model
{
    protected $table      = 'website_configs';
    protected $primaryKey = 'id';

    protected $allowedFields = ['config_key', 'config_value', 'description', 'created_at', 'updated_at'];

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
        foreach ($configs as $config) {
            if (str_contains($config['config_key'], 'logo')) {
                $imageModel = new ImageModel();
                $image = $imageModel->where('record_id', $config['id'])->where('type', 'website_configs')->first();
                $result[$config['config_key']] = base_url($image['image_path']);
            } else {
                $result[$config['config_key']] = $config['config_value'];
            }
        }
        return $result;
    }
}
