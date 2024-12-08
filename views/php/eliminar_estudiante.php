<?php
// Incluir archivo de configuración de la base de datos
require_once '../../config/config.php';

try {
    // Verificar si el parámetro 'id' está presente en la URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $estudiante_id = $_GET['id'];

        // Preparar la llamada al procedimiento almacenado
        $query = "CALL EliminarEstudianteCalificacion(?)";  // Nota: usamos un signo de pregunta para el parámetro

        // Preparar la consulta
        $stmt = $conexion->prepare($query);

        // Enlazar el parámetro usando bind_param (tipo de dato 'i' para entero)
        $stmt->bind_param('i', $estudiante_id);  // 'i' indica que el parámetro es un entero
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Verificar si la eliminación fue exitosa
        if ($stmt->affected_rows > 0) {
            // Redirigir a la lista de estudiantes o mostrar un mensaje de éxito
            echo "<script>
                alert('Estudiante eliminado correctamente');
                window.location.href = '../../estudiantes';
              </script>";
           
            exit();
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'No se encontró el estudiante o no se pudo eliminar.'
            ]);
        }

        $conexion->close();
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'ID no válido.'
        ]);
    }
} catch (mysqli_sql_exception $e) {
    // Manejar errores en la base de datos
    echo json_encode([
        'success' => false,
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
}
?>
