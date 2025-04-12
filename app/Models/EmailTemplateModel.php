<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailTemplateModel extends Model
{
    protected $table      = 'email_templates';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'subject',
        'body',
        'is_active',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
