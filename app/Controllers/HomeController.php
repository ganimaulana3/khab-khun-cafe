<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        echo view('backend/index');
        echo view('backend/dashboard');
        return view('backend/footer');
    }
}
