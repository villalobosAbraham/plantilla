<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('/layouts/head');
        echo view('login');
        echo view('/layouts/footer');
        echo view('scripts');

    }
}
