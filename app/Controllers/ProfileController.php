<?php

namespace App\Controllers;
use App\Models\AksesModel;

class ProfileController extends BaseController
{
    protected $profileModel;
    protected $session;

    public function index()
    {
        $this->session = session();

        $this->profileModel = new AksesModel();
        $data['profile'] = $this->profileModel->getAkses();

        echo view('backend/index');
        echo view('backend/profile',$data);
        return view('backend/footer');
    }

    public function change(){
        $this->profileModel = new AksesModel();

        $id = $this->request->getPost('id');

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
                    'foto' => $newName
                ];

                $this->profileModel->update_akses($id,$data);

                session()->set('foto', $newName);

        return redirect()->to(base_url('admin/profile/' . $_SESSION['id']))->with('alert','update_foto');
    }

    public function updateAkun(){
        $this->profileModel = new AksesModel();

        $id = $this->request->getPost('id');

        $data = [
            'username' => $this->request->getPost('username'),
        ];
        
        $password = $this->request->getPost('password');

        if (!empty($password)) {
            $data['password'] = md5($this->request->getPost('password'));
        }
        
        $this->profileModel->update_akses($id,$data);
        session()->set('username', $data['username']);
        return redirect()->to(base_url('admin/profile/' . $_SESSION['id']))->with('alert','update');
    }
}
