<?php

namespace App\Controllers;

use App\Models\home_model;

class Home extends BaseController
{

    protected $home_model;
    protected $request;

    public function __construct()
    {
        $this->home_model = new home_model();
        $this->request = \Config\Services::request(); // Cargar el servicio de solicitud
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

    function HOMObtenerUsuarios() {
        $resultados = $this->home_model->HOMObtenerUsuarios();

        return json_encode($resultados);
    }

    function HOMAgregarUsuario() {
        $datosGenerales = $this->request->getPost('datosGenerales');
        if ($this->comprobarDatosAgregarUsuario($datosGenerales)) {
            return json_encode(false);
        }

        $resultado = $this->home_model->HOMAgregarUsuario($datosGenerales);
        return json_encode($resultado);
    }

    function comprobarDatosAgregarUsuario($datosGenerales) {
        $regContraseña = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
        if (!preg_match($regContraseña, $datosGenerales["contraseña"] || strlen($datosGenerales["usuario"] < 5))) {
            return false;
        }
        return true;
    }
}
