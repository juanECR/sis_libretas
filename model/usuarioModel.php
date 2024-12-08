<?php 

require_once "../librerias/conexion.php"; 

class usuarioModel{
    private $conexion;
    function __construct() {
        $this->conexion = new Conexion();
        $this-> conexion = $this->conexion->connect();
    }

    //validar usuarios login
    public function buscarPersonaporDni($dni){
        $sql = $this->conexion->query("SELECT * FROM usuario WHERE dni ='{$dni}'");
        $sql = $sql->fetch_object();
        return $sql;
    }
    
}
?>