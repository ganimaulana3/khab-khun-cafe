<?php

namespace App\Models;
use CodeIgniter\Model;

class AksesModel extends Model{
    protected $table = "admin_akses";
    protected $primaryKey = "id_akses";
    protected $allowedFields = ['username','password','level',
    'nik','nama_lengkap','telp','email','foto'];

    public function getAkses(){
        return $this->findAll();
    }
    public function detailsKaryawan($id)
    {
        return $this->where(['id_akses' => $id])->first();
    }

    public function tambah_akses($data){
        return $this->insert($data);
    }

    public function update_akses($id,$data){
        return $this->update($id,$data);
    }

    public function hapus_akses($id){
        return $this->delete($id);
    }
}