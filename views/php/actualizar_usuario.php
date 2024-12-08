<?php
// Configuración de la base de datos
require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $id = $_POST['id'];
    $dni = $_POST['new_dni'];
    $nombre = $_POST['new_nombre'];
    $user = $_POST['new_tipo_user'];
    $email = $_POST['new_email'];
    $telefono = $_POST['new_telefono'];
    $secure_password = password_hash($dni,PASSWORD_DEFAULT);

    // Preparar la consulta
    $stmt = $conexion->prepare("CALL EditarUsuario(?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("iisissi", $id, $dni, $nombre, $user, $email, $secure_password,$telefono);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();    
    // Cerrar el statement
    $stmt->close();


    echo "<script>
    alert('usuario actualizado correctamente');
    window.location.href = '../../usuarios';
    </script>";
    
   } else {
    echo "No se enviaron datos.";
   }
$conexion->close();
?>







