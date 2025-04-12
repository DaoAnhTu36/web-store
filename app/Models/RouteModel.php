<?php

namespace App\Models;

use CodeIgniter\Model;


class RouteModel extends Model
{
    protected $table = 'routes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'method',
        'uri',
        'controller',
        'filters',
        'created_at',
        'updated_at',
        'is_active',
        'created_by',
        'updated_by',
        'is_group',
        'parent_id',
        'level',
        'permission_id',
        'is_ignore'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType = 'array';

    public function renderRoute()
    {
        $routes = $this
            ->select('id,method,uri,controller,is_group,parent_id,level,permission_id,is_ignore')
            ->where('is_active', 1)
            ->findAll();
        $tree = $this->buildTree($routes);
        // debug_object($tree);
        return $tree;
    }

    function buildTree($routes, $parentId = null)
    {
        $branch = [];
        foreach ($routes as $route) {
            if ($route['parent_id'] == $parentId) {
                $children = $this->buildTree($routes, $route['id']);
                if ($children) {
                    $route['children'] = $children;
                }
                $branch[] = $route;
            }
        }
        return $branch;
    }
}
