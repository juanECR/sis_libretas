<?php

include '../../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $tipo_usuario = (int)$_POST['tipo_usuario']; // Asegurarse de que sea un entero
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    $secure_password = password_hash($dni,PASSWORD_DEFAULT);
    // Preparar la consulta
    $stmt = $conexion->prepare("CALL registrarUsuario(?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("issssi", $dni, $nombre, $tipo_usuario, $correo, $secure_password, $telefono);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<script>
        window.location.href = '../../usuarios'; // Redirige al formulario
      </script>";
       exit();

    } else {
        echo "<script>alert('Hubo un problema con el registro.');</script>";
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
} else {
    echo "No se enviaron datos.";
}
$conexion->close();
?>

