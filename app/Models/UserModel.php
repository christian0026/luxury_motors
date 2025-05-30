<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'phone', 'address', 'is_admin', 'created_at', 'updated_at'];
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

    public function getAdminByEmail($email)
    {
        return $this->where('email', $email)->where('is_admin', 1)->first();
    }
}