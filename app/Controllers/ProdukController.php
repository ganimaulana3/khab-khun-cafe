<?php

namespace App\Controllers;
use App\Models\ProdukModel;
use CodeIgniter\Controller;


class ProdukController extends BaseController
{

    protected $produkModel;
    
    public function index()
    {
        $this->produkModel = new ProdukModel();
        $data['produk'] = $this->produkModel->getProduk();
        
        echo view('backend/index');
        echo view('backend/data_produk',$data);
        return view('backend/footer');
    }

    public function add()
    {
       
        $this->produkModel = new ProdukModel();

        // Validasi file
        if (!$this->validate([
            'photo' => [
                'uploaded[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'max_size[photo,4096]', // max 4MB
            ],
        ])) {
            return redirect()->back()->with('error', 'Invalid file.');
        }

        // Mengambil file dan mengubah namanya
        $file = $this->request->getFile('photo');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/img_produk', $newName);

        // Mengambil data kategori dari form
        $kategori = $this->request->getPost('kategori');
        
        // Membuat kode produk unik berdasarkan kategori
        $kode_produk = $this->produkModel->generateKodeProduk($kategori);
        // Menyiapkan data untuk disimpan
        $data = [
            'kd_produk' => $kode_produk,
            'nm_produk' => $this->request->getPost('nm_produk'),
            'deskripsi' => $this->request->getPost('desc_produk'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'img_produk' => $newName
        ];

        // Menyimpan data ke database
        $this->produkModel->tambah_barang($data);

        return redirect()->to(base_url('admin/data_produk'))->with('alert','tambah_produk');
    }

    public function update()
    {
        $this->produkModel = new ProdukModel();
        $id = $this->request->getPost('id');

        $produkLama = $this->produkModel->find($id);
        $kategori = $this->request->getPost('kategori');

        if ($produkLama['kategori'] !== $kategori) {
            // Jika kategori berubah, buat kode produk baru berdasarkan kategori baru
            $kode_produk = $this->produkModel->generateKodeProduk($kategori);
        } else {
            // Jika kategori tidak berubah, gunakan kode produk lama
            $kode_produk = $produkLama['kd_produk'];
        }
        
        $data = [
            'kd_produk' => $kode_produk,
            'nm_produk' => $this->request->getPost('nm_produk'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga')
        ];

        $this->produkModel->updateProduk($id,$data);
        return redirect()->to(base_url('admin/data_produk'))->with('alert', 'update_produk');
    }

    public function updateDesc()
    {
        $this->produkModel = new ProdukModel();
        $id = $this->request->getPost('id');
        $data = [
            'deskripsi' => $this->request->getPost('desc_produk'),
        ];

        $this->produkModel->update_desc($id,$data);
        return redirect()->to(base_url('admin/data_produk'))->with('alert', 'update_produk');
    }

    public function updateImg()
    {
        $this->produkModel = new ProdukModel();
        $id = $this->request->getPost('id');

        // Validasi file
        if (!$this->validate([
            'photo' => [
                'uploaded[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[photo,4096]', // max 4MB
            ],
        ])) {
            return redirect()->back()->with('error', 'Invalid file.');
        }

        // Mengambil file dan mengubah namanya
        $file = $this->request->getFile('photo');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/img_produk', $newName);

        $data = [
            'img_produk' => $newName
        ];

        $this->produkModel->updateImg($id,$data);
        return redirect()->to(base_url('admin/data_produk'))->with('alert', 'update_img');
    }


    public function hapus($id)
    {
        $this->produkModel = new ProdukModel();
        $this->produkModel->hapusProduk($id);
        return redirect()->to(base_url('admin/data_produk'))->with('alert', 'hapus_produk');
    }  
    
}
