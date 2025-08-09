<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailSubscriptionModel extends Model
{
    protected $table            = 'email_subscriptions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'subscription_date'];

    // Dates
    protected $useTimestamps    = false;
    protected $dateFormat       = 'datetime';
    protected $createdField     = 'subscription_date';
    protected $updatedField     = '';

    // Validation
    protected $validationRules      = [
        'email' => 'required|valid_email|is_unique[email_subscriptions.email]',
    ];
    protected $validationMessages   = [
        'email' => [
            'required'    => 'Email is required.',
            'valid_email' => 'Invalid email format.',
            'is_unique'   => 'This email is already subscribed.',
        ],
    ];
}
