<?php

namespace App\Controllers;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function index()
    {

        $this->kategoriModel = new KategoriModel();
        $data['kategori'] = $this->kategoriModel->getKategori();

        echo view('backend/index');
        echo view('backend/data_kategori',$data);
        return view('backend/footer');
    }

    public function add(){
        $this->kategoriModel = new KategoriModel();

        if (!$this->validate([
            'img_kategori' => [
                'uploaded[img_kategori]',
                'mime_in[img_kategori,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'max_size[img_kategori,4096]', // max 4MB
            ],
        ])) {
            return redirect()->back()->with('error', 'Invalid file.');
        }

        $file = $this->request->getFile('img_kategori');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/img_kategori', $newName);

        $data = [
            'nm_kategori' => $this->request->getPost('nm_kategori'),
            'img_kategori' => $newName
        ];

        $this->kategoriModel->tambah_kategori($data);
        return redirect()->to(base_url('admin/data_kategori'))->with('alert','tambah_kategori');
    }
}
