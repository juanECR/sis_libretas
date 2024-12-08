<?php
// Configuración de la base de datos
require_once '../../config/config.php';
// Verificar si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $fecha_nacimiento = $_POST['nacimiento'];
    $grado = $_POST['grado'];
    $seccion = $_POST['seccion'];
    $dni_apoderado = $_POST['dni_apoderado'];
    
    try {
        // Primero, obtener el ID del apoderado basado en el DNI
        $query = "SELECT id FROM usuario WHERE dni = ?";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $dni_apoderado);
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();
        $apoderado = $result->fetch_assoc();
        
        if (!$apoderado) {
            throw new Exception("No se encontró un apoderado con el DNI proporcionado");
        }
        
        $id_apoderado = $apoderado['id'];
        
        // Llamar al procedimiento almacenado
        $stmt = $conexion->prepare("CALL registrarEstudiante(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", 
            $nombre,
            $fecha_nacimiento,
            $grado,
            $seccion,
            $id_apoderado
        );
        
        // Ejecutar el procedimiento almacenado
        $stmt->execute();
        
        // Cerrar el statement
        $stmt->close();
        
        // Mostrar alerta y redirigir
        echo "<script>
                alert('Estudiante registrado correctamente');
                window.location.href = '../../estudiantes';
              </script>";
        
    } catch (Exception $e) {
        // Mostrar alerta de error y redirigir
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = '../../estudiantes';
              </script>";
    }
} else {
    // Si no es una petición POST, redirigir
    header('Location: ../../estudiantes');
    exit();
}
?>