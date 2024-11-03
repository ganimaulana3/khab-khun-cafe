<?php

namespace App\Controllers;
use App\Models\AksesModel;
use CodeIgniter\Controller;

class DetailsKaryawanController extends BaseController
{
    protected $detailsModel;
    protected $karyawanModel;

    public function index($id = null)
    {
        helper('date_helper');
        
        if ($id === null) {
            return redirect()->to(base_url('/'));
        }

        $karyawanModel = new AksesModel();
        $data['karyawan'] = $karyawanModel->detailsKaryawan($id);
        

        echo view('backend/index');
        echo view('backend/details_karyawan',$data);
        return view('backend/footer');
        
    }

    public function change(){
        $this->karyawanModel = new AksesModel();

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

                $this->karyawanModel->update_akses($id,$data);

        return redirect()->to(base_url('admin/profile/' . $id))->with('alert','update_foto');
    }
    
}
