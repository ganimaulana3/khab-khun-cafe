<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admin_akses';
    protected $primaryKey = 'id_akses';
    protected $allowedFields = ['username', 'password', 'level'];

    public function getLogin($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first();
    }

    public function tambah_kategori($data){
        return $this->insert($data);
    }
}
