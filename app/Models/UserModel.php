<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'is_admin', 'created_at'];
    protected $beforeInsert = ['hashPassword'];
    protected $useTimestamps = false;

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}