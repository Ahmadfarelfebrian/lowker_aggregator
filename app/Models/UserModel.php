<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function login($username, $password_has,$email)
    {
        return $this->where('username', $username)
                    ->where('password', md5($password))
                    ->first();
    }
}