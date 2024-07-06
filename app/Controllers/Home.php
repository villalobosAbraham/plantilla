<?php

namespace App\Controllers;

use App\Models\home_model;

class Home extends BaseController
{

    protected $home_model;

    public function __construct()
    {
        $this->home_model = new home_model();
    }
    public function index()
    {
        $data = ["tittle" => "Inicio de Sesion"];
        
        $ruta = ["ruta" => base_url()];
        echo view('/layouts/head', $data);
        echo view('registro', $ruta);
        echo view('/layouts/footer');
        echo view('scripts');

    }

    function obtenerUsuarios() {
        $resultados = $this->home_model->obtenerUsuarios();

        json_encode($resultados);
    }
}
