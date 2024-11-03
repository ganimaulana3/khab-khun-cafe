<?php

namespace App\Controllers;
use App\Models\AksesModel;

class AksesController extends BaseController
{
    protected $aksesModel;

    public function index()
    {
        $role = session()->get('level');
        if ($role !== 'owner') {
            return redirect()->to(base_url('admin/dashboard'))->with('alert','akses_denied');
        }
        
        $this->aksesModel = new AksesModel();
        $data['akses'] = $this->aksesModel->getAkses();

        echo view('backend/index');
        echo view('backend/data_akses',$data);
        return view('backend/footer');
    }

    public function add(){
        $this->aksesModel = new AksesModel();

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
        $file->move(ROOTPATH . 'public/img_karyawan', $newName);
        
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
            'nik' => $this->request->getPost('nik'),
            'nama_lengkap' => $this->request->getPost('namaLengkap'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            'foto' => $newName
        ];

        $this->aksesModel->tambah_akses($data);
        return redirect()->to(base_url('admin/data_akses'))->with('alert','tambah_akses');
    }

    public function update(){
        $this->aksesModel = new AksesModel();
        $id = $this->request->getPost('id');

        $file = $this->request->getFile('photo');

        $data = [
            'username' => $this->request->getPost('username'),
            'level' => $this->request->getPost('level'),
            'nik' => $this->request->getPost('nik'),
            'nama_lengkap' => $this->request->getPost('namaLengkap'),
            'telp' => $this->request->getPost('telp'),
            'email' => $this->request->getPost('email'),
            
        ];

        $password = $this->request->getPost('password');

        if (!empty($password)) {
            $data['password'] = md5($this->request->getPost('password'));
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Validasi file
            if (!$this->validate([
                'photo' => [
                    'uploaded[photo]',
                    'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    'max_size[photo,4096]', // max 4MB
                ],
            ])) {
                return redirect()->back()->with('error', 'Invalid file.')->withInput();
            }
    
            // Mengubah nama file dan menyimpan
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/img_karyawan', $newName);
            $data['foto'] = $newName; // Menyimpan nama foto baru
        }

        $this->aksesModel->update_akses($id,$data);
        return redirect()->to(base_url('admin/data_akses'))->with('alert','update_akses');
    }

    public function delete($id){
        $this->aksesModel = new AksesModel();

        $this->aksesModel->hapus_akses($id);
        return redirect()->to(base_url('admin/data_akses'))->with('alert','hapus_akses');
    }
    
}
