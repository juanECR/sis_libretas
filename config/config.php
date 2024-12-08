<?php
const BD_HOST = "localhost";
const BD_USER = "root";
const BD_PASSWORD = "";
const BD_NAME   = "bd_academico2";
const BD_CHARSET ="utf8";

const BASE_URL = "http://localhost/sis_notas_mercedes/";



$conexion = new mysqli(BD_HOST, BD_USER, BD_PASSWORD, BD_NAME);


if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

/*
unset($conexion); 
*/

?>