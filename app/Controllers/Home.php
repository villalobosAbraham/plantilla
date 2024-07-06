<?php

namespace App\Controllers;

use App\Models\home_model;

class Home extends BaseController
{

    protected $home_model;
    protected $request;
    protected $session;

    public function __construct()
    {
        $this->home_model = new home_model();
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request(); // Cargar el servicio de solicitud
    }
    public function index()
    {
        $this->session->destroy();
        $data = ["tittle" => "Inicio de Sesion"];
        
        echo view('/layouts/head', $data);
        echo view('login');
        echo view('/layouts/footer');
        echo view('scripts');
    }

    function HOMIniciarSesion() {
        $datosGenerales = $this->request->getPost('datosGenerales');

        $idUsuario = $this->home_model->HOMIniciarSesion($datosGenerales);
        if (!$idUsuario) {
            return false;
        }
        $this->session->set('idUsuario', $idUsuario);
        return $idUsuario;
    }

    public function registro() {
        if (!$this->session->has('idUsuario')) {
            // Redirigir a la página de inicio
            return redirect()->to(base_url());
        }


        $data = ["tittle" => "Inicio de Sesion"];
        
        echo view('/layouts/head', $data);
        echo view('registro');
        echo view('/layouts/footer');
        echo view('scripts');
    }

    function HOMObtenerUsuarios() {
        $resultados = $this->home_model->HOMObtenerUsuarios();
        return json_encode($resultados);
    }

    function HOMAgregarUsuario() {
        $datosGenerales = $this->request->getPost('datosGenerales');
        if (!$this->comprobarDatosAgregarUsuario($datosGenerales)) {
            return json_encode(false);
        }

        $resultado = $this->home_model->HOMAgregarUsuario($datosGenerales);
        return json_encode($resultado);
    }

    function HOMObtenerUsuario() {
        $idUsuario = $this->request->getPost('idUsuario');

        $resultado = $this->home_model->HOMObtenerUsuario($idUsuario);
        return json_encode($resultado);
    }

    function comprobarDatosAgregarUsuario($datosGenerales) {
        $regContraseña = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d._-]{8,}$/';
        if (preg_match($regContraseña, $datosGenerales["contraseña"] || strlen($datosGenerales["usuario"] < 5))) {
            return false;
        }
        return true;
    }

    function HOMEditarUsuario() {
        $datosGenerales = $this->request->getPost('datosGenerales');
        if (!$this->comprobarDatosAgregarUsuario($datosGenerales)) {
            return json_encode("false");
        }

        $resultado = $this->home_model->HOMEditarUsuario($datosGenerales);
        return json_encode($resultado);
    }

    function HOMDeshabilitarUsuario() {
        $idUsuario = $this->request->getPost('idUsuario');

        $resultado = $this->home_model->HOMDeshabilitarUsuario($idUsuario);
        return json_encode($resultado);
    }

    function HOMEliminarUsuario() {
        $idUsuario = $this->request->getPost('idUsuario');

        $resultado = $this->home_model->HOMEliminarUsuario($idUsuario);
        return json_encode($resultado);
    }
}
