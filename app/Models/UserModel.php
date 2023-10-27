<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Models\UserModel as ShieldUserModel;

class UserModel extends ShieldUserModel
{
    
    protected $allowedFields  = [
       // 'username',
        'first_name',
        'last_name',
        'unique_id',
        'status',
        'status_message',
        'active',
        'last_active',
        'deleted_at',
    ];

   
}
