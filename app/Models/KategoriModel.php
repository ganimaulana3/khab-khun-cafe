<?php

namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = [
        'nm_kategori', 'img_kategori'
    ];

    public function getKategori()
    {
        return $this->findAll();
    }

    public function kategoriProduk($id)
    {
        return $this->where(['id_kategori' => $id])->first();
    }

    public function homeKategori()
    {
        return $this->orderBy('nm_kategori', 'DESC')->findAll();
    }

    public function tambah_kategori($data)
    {
        return $this->insert($data);
    }

    public function update_kategori($id,$data)
    {
        return $this->update($id,$data);
    }

    public function hapus_kategori($id)
    {
        return $this->delete($id);
    }

}