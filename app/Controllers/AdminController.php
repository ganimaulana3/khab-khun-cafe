<?php

namespace App\Controllers;

class AdminController extends BaseController
{

    public function index()
    {
        echo view('backend/index');
        echo view('backend/dashboard');
        return view('backend/footer');
    }
}
