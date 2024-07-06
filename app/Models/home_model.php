<?php 
namespace App\Models;

use CodeIgniter\Database\Exceptions\DataException;
use CodeIgniter\Model;

class home_model extends Model {

    protected $db;

    public function __construct()
    {
        // Conectar a la base de datos
        $this->db = \Config\Database::connect();
    }


    function HOMObtenerUsuarios() {
        $tabla = $this->db->table("cat_usuarios");

        $tabla->select("*");

        return $tabla->get()->getResult();
    } 

    function HOMAgregarUsuario($datosGenerales) {
        $comprobacion =  $this->comprobarUsuario($datosGenerales["usuario"]);
        if (!$comprobacion) {
            return false;
        }
        $insercion = $this->prepararDatosAgregarUsuario($datosGenerales);
        try {
            $this->db->transException(true)->transStart();
            
            $tabla = $this->db->table("cat_usuarios");

            $tabla->insert($insercion);

            $this->db->transComplete();
            return true;
        } catch(DataException $e) {
            print_r($e);
            return false;
        }
    }

    function comprobarUsuario($usuario) {
        $tabla = $this->db->table("cat_usuarios");
    
        $tabla->select("idusuario");

        $tabla->where("idusuario", $usuario);
    
        $resultado = $tabla->get()->getRow();
    
        return ($resultado !== null);
    }

    function prepararDatosAgregarUsuario($datosGenerales) {
        $fechaHoy = date("Y-m-d"); 

        $insercion = array(
            "usuario" => $datosGenerales["usuario"],
            "contraseña" => $datosGenerales["contraseña"],
            "fecharegistro" => $fechaHoy,
            "activo" => $datosGenerales["estado"],
        );

        return $insercion;
    }

    function HOMObtenerUsuario($idUsuario) {
        $tabla = $this->db->table("cat_usuarios"); 

        $tabla->select("*");

        $tabla->where("idusuario", $idUsuario);

        return $tabla->get()->getRow();
    }

    function HOMEditarUsuario($datosGenerales) {
        $comprobacion =  $this->comprobarUsuarioEditar($datosGenerales["idUsuario"] ,$datosGenerales["usuario"]);
        if ($comprobacion) {
            return false;
        }
        $actualizacion = $this->prepararDatosActualizarUsuario($datosGenerales);
        
        try {
            $this->db->transException(true)->transStart();

            $tabla = $this->db->table("cat_usuarios");

            $tabla->where("idusuario", $datosGenerales["idUsuario"]);
            $tabla->update($actualizacion);

            $this->db->transComplete();
            return true;
        } catch(DataException $e) {
            print_r($e);
            return false;
        }
    }

    function comprobarUsuarioEditar($idUsuario, $usuario) {
        $tabla = $this->db->table("cat_usuarios");
    
        $tabla->select("idusuario");

        $tabla->where("idusuario !=", $idUsuario)
              ->where("usuario", $usuario);
    
        $resultado = $tabla->get()->getRow();
    
        return ($resultado !== null);
    }

    function prepararDatosActualizarUsuario($datosGenerales) {
        $actualizacion = array(
            "usuario" => $datosGenerales["usuario"],
            "contraseña" => $datosGenerales["contraseña"],
            "activo" => $datosGenerales["estado"],
        );

        return $actualizacion;
    }

    function HOMDeshabilitarUsuario($idUsuario) {
        $actualizacion = $this->prepararDatosDeshabilitarUsuario();

        try {
            $this->db->transException(true)->transStart();

            $tabla = $this->db->table("cat_usuarios");

            $tabla->where("idusuario", $idUsuario);
            $tabla->update($actualizacion);

            $this->db->transComplete();
            return true;
        } catch(DataException $e) {
            print_r($e);
            return false;
        }
    }

    function prepararDatosDeshabilitarUsuario() {
        $actualizacion = array(
            "activo" => "N"
        );
        return $actualizacion;
    }
}

?>
