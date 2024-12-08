<?php
// Configuración de la base de datos
require_once '../../config/config.php';

if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $id = $_POST['edit_estudiante_id'];
    $nombre = $_POST['edit_nombre'];
    $fecha_nacimiento = $_POST['edit_nacimiento'];
    $grado = $_POST['edit_grado'];
    $seccion = $_POST['edit_seccion'];
    $dni_apoderado = $_POST['edit_dni_apoderado'];

    
     // Primero, obtener el ID del apoderado basado en el DNI
     $query = "SELECT id FROM usuario WHERE dni = ?";
     $stmt = $conexion->prepare($query);
     $stmt->bind_param("s", $dni_apoderado);
     $stmt->execute();
     
     // Obtener el resultado
     $result = $stmt->get_result();
     $apoderado = $result->fetch_assoc();
     
     if (!$apoderado) {
        echo "<script>
        alert('apoderado no encontrado');
        window.location.href = '../../estudiantes';
        </script>";
     }

    // Preparar la consulta
    $stmt = $conexion->prepare("CALL EditarEstudiante(?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("issssi", $id, $nombre, $fecha_nacimiento, $grado, $seccion, $apoderado);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();    
    // Cerrar el statement
    $stmt->close();


    echo "<script>
    alert('Estudiante actualizado correctamente');
    window.location.href = '../../estudiantes';
    </script>";

   } else {
    echo "No se enviaron datos.";
   }
$conexion->close();
?>























try {
    // Obtener datos del formulario
    $estudiante_id = $_POST['estudiante_id'];
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['nacimiento'];
    $grado = $_POST['grado'];
    $seccion = $_POST['seccion'];
    $dni_apoderado = $_POST['dni_apoderado'];

    // Verificar si existe el apoderado
    $stmt = $conexion->prepare("SELECT id FROM usuario WHERE dni = ?");
    $stmt->execute([$dni_apoderado]);
    $apoderado = $stmt->fetch();

    // Si no se encuentra el apoderado, devolver un mensaje de error
    if (!$apoderado) {
        echo json_encode([
            'success' => false,
            'message' => 'El DNI del apoderado no está registrado en el sistema'
        ]);
        exit;
    }

    // Obtener el ID del apoderado
    $apoderado_id = $apoderado['id'];

    // Actualizar estudiante
    $stmt = $conexion->prepare("UPDATE estudiante SET 
        nombre = ?, 
        f_nacimiento = ?, 
        grado = ?, 
        seccion = ?, 
        apoderado_id = ? 
        WHERE id = ?");

    $resultado = $stmt->execute([$nombre, $fecha_nacimiento, $grado, $seccion, $apoderado_id, $estudiante_id]);

    if ($resultado) {
        echo json_encode([
            'success' => true,
            'message' => 'Estudiante actualizado correctamente'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error al actualizar el estudiante'
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
}
?>
