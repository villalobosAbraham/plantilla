<?php 
namespace App\Models;

use CodeIgniter\Model;

class home_model extends Model {

    protected $db;

    public function __construct()
    {
        // Conectar a la base de datos
        $this->db = \Config\Database::connect();
    }


    function obtenerUsuarios() {
        $tabla = $this->db->table("cat_usuarios");

        $tabla->select("*");

        return $tabla->get()->getResult();
    } 

}

?>
