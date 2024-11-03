<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'kd_produk';
    protected $allowedFields = [
        'kd_produk','nm_produk', 'kategori', 'harga', 'img_produk', 'deskripsi'
    ];

    public function getProduk()
    {
        return $this->findAll();
    }

    public function generateKodeProduk($kategori)
{
    // Tentukan prefix berdasarkan kategori
    $prefix = ($kategori === 'Makanan') ? 'MKN' : 'MNM'; 

    // Variabel untuk menampung kode produk yang unik
    do {
        // Membuat nomor acak 3 digit
        $randomNumber = random_int(100, 999); // Menghasilkan angka acak antara 100 hingga 999

        // Gabungkan prefix dan nomor acak
        $kode_produk = $prefix . $randomNumber;

        // Cek di database apakah kode produk sudah ada
        $existingProduct = $this->where('kd_produk', $kode_produk)->first();
        
    } while ($existingProduct); // Ulangi jika kode sudah ada

    return $kode_produk;
}

    public function tambah_barang($data)
    {
        return $this->insert($data);
    }    

    public function updateProduk($id,$data)
    {
        return $this->update($id,$data);
    }

    public function updateImg($id,$data)
    {
        return $this->update($id,$data);
    }

    public function update_desc($id,$data)
    {
        return $this->update($id,$data);
    }

    public function hapusProduk($id)
    {
        return $this->delete($id);
    }
}
