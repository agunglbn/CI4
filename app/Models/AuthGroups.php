<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthGroups extends Model
{
    protected $table = 'auth_groups';

    public function getRole()
    {
        return $this->findAll();
    }
}