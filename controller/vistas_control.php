<?php
require_once "./model/vistas_model.php";

class  VistasControlador extends VistaModelo{
    public function obtener_plantillaControlador(){
        return require_once "./views/plantilla.php";
    }

    public function ObtenerVistaControlador(){
        if (isset($_GET['views'])) {
           $ruta = explode("/",$_GET['views']);
           $respuesta = VistaModelo::obtener_vista($ruta[0]);
        } else {
            $respuesta = "login";
        }
        return $respuesta;
      
    }
}
?>