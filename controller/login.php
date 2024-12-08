<?php
require_once("../model/usuarioModel.php");

$objPersona = new usuarioModel();

$tipo = $_GET['tipo'];

if ($tipo == "iniciar_sesion") {
    // print_r($_POST);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    $arrResponse = array('status' => false, 'mensaje' => '');

    $arrPersona = $objPersona->buscarPersonaporDni($usuario);
    //   print_r($arrPersona);
    if (empty($arrPersona)) {
        $arrResponse = array('status' => false, 'mensaje' => 'Error, Usuario no esta registrado en el sistema');
    } else {
       /*  if (password_verify($password, $arrPersona->clave)){

            session_start();
            $_SESSION['secion_ventas_id'] = $arrPersona->id;
            $_SESSION['sesion_venta_dni'] = $arrPersona->dni;
            $_SESSION['sesion_venta_nombres'] = $arrPersona->nombre;
            $arrResponse = array('status' => true, 'mensaje' => 'Ingresar al sistema'); */

            if (password_verify($password, $arrPersona->clave)) {
                session_start();
                $_SESSION['secion_ventas_id'] = $arrPersona->id;
                $_SESSION['sesion_venta_dni'] = $arrPersona->dni;
                $_SESSION['sesion_venta_nombres'] = $arrPersona->nombre;
    
                // Retornar el id y otros datos
                $arrResponse = array(
                    'status' => true,
                    'mensaje' => 'Ingresar al sistema',
                    'id' => $arrPersona->id // Agregar el id del usuario
                );

        } else {
            $arrResponse = array('status' => false, 'mensaje' => 'Error, Contraseña incorrecta');
        }
    }
    echo json_encode(($arrResponse));
}


if ($tipo == "cerrar_sesion") {
    session_start();
    session_unset();
    session_destroy();
    $arrResponse = array('status' => true);
    echo json_encode($arrResponse);
}
die;
?>