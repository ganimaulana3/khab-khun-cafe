<?php

namespace App\Controllers;
use App\Models\LoginModel;

class LoginController extends BaseController
{

    protected $loginModel;
    protected $session;

    public function index(): string
    {
        return view('backend/login_admin');
    }

    public function login()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
        
        if ($this->validate([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!!'
                ]
            ]
        ])) {
            // Jika valid
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));
            $cek = $this->loginModel->getLogin($username, $password);
            if ($cek) {
                // Jika datanya cocok
                session()->set('log', true);
                session()->set('id', $cek['id_akses']);
                session()->set('username', $cek['username']);
                session()->set('level', $cek['level']);
                session()->set('foto', $cek['foto']);
                session()->set('nik', $cek['nik']);
                session()->set('nama_lengkap', $cek['nama_lengkap']);
                session()->set('telp', $cek['telp']);
                session()->set('email', $cek['email']);
                return redirect()->to(base_url('admin/dashboard'))->with('alert','login_sukses');
            } else {
                session()->setFlashdata('pesan', 'Login Gagal !!!, Username Atau Password Salah !!!');
                return redirect()->to(base_url('admin'))->with('alert','login_gagal');
            }
        } else {
            // Jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin'))->with('alert','login_gagal');
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('id');
        session()->remove('username');
        session()->remove('level');
        session()->remove('foto');
        session()->remove('nik');
        session()->remove('nama_lengkap');
        session()->remove('telp');
        session()->remove('email');

        return redirect()->to(base_url('admin'))->with('alert','logout_sukses');
    }
}