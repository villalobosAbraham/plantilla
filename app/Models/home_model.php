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

}

?>
