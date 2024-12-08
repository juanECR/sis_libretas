<?php
// Configuración inicial
require_once '../../config/config.php';

// Función para validar el archivo PDF
function validarArchivoPDF($archivo) {
    // Verificar si existe el archivo
    if (!isset($archivo) || !is_array($archivo)) {
        return "No se ha enviado ningún archivo";
    }

    $tiposPermitidos = ['application/pdf'];
    $tamanoMaximo = 5 * 1024 * 1024; // 5MB en bytes

    // Verificar si hubo error en la subida
    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        switch ($archivo['error']) {
            case UPLOAD_ERR_INI_SIZE:
                return "El archivo excede el tamaño máximo permitido por el servidor";
            case UPLOAD_ERR_FORM_SIZE:
                return "El archivo excede el tamaño máximo permitido por el formulario";
            case UPLOAD_ERR_PARTIAL:
                return "El archivo se subió parcialmente";
            case UPLOAD_ERR_NO_FILE:
                return "No se seleccionó ningún archivo";
            default:
                return "Error al subir el archivo";
        }
    }

    if ($archivo['size'] > $tamanoMaximo) {
        return "El archivo excede el tamaño máximo permitido (5MB)";
    }

    if (!in_array($archivo['type'], $tiposPermitidos)) {
        return "Solo se permiten archivos PDF";
    }

    return true;
}

// Verificar si se recibió una petición POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si existe el ID del estudiante
    if (!isset($_POST['studentId']) || empty($_POST['studentId'])) {
        $_SESSION['error'] = "No se recibió el ID del estudiante";
        header("Location: ../../notas");
        exit();
    }

    // Obtener y validar el ID del estudiante
    $estudiante_id = intval($_POST['studentId']);
    $bimestre = $_POST['bimestre'];
    
    if ($estudiante_id <= 0) {
        $_SESSION['error'] = "ID de estudiante inválido";
        header("Location: ../../notas");
        exit();
    }

    // Verificar si se subió un archivo
    if (!isset($_FILES['archivo'])) {
        $_SESSION['error'] = "No se ha enviado ningún archivo";
        header("Location: ../../notas");
        exit();
    }

    // Validar el archivo
    $validacion = validarArchivoPDF($_FILES['archivo']);
    if ($validacion !== true) {
        $_SESSION['error'] = $validacion;
        header("Location: ../../notas");
        exit();
    }

    try {
        // Generar nombre único para el archivo
        $nombreArchivo = uniqid('calificacion_') . '_' . date('Y-m-d-His') . '.pdf';
        $rutaDestino = '../../uploads/calificaciones/' . $nombreArchivo;

        // Crear el directorio si no existe
        if (!file_exists('../../uploads/calificaciones/')) {
            mkdir('../../uploads/calificaciones/', 0777, true);
        }

        // Mover el archivo a la carpeta de destino
        if (!move_uploaded_file($_FILES['archivo']['tmp_name'], $rutaDestino)) {
            throw new Exception("Error al guardar el archivo");
        }

        // Llamar al procedimiento almacenado
        $query = "CALL registrarCalificacion(?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("iss", $estudiante_id, $nombreArchivo, $bimestre);
        
        if (!$stmt->execute()) {
            // Si hay error, eliminar el archivo subido
            if (file_exists($rutaDestino)) {
                unlink($rutaDestino);
            }
            throw new Exception("Error al registrar la calificación: " . $stmt->error);
        }

        $_SESSION['success'] = "Calificación registrada exitosamente";
        header("Location: ../../notas");
        exit();

    } catch (Exception $e) {
        // Eliminar el archivo si se subió y hubo error
        if (isset($rutaDestino) && file_exists($rutaDestino)) {
            unlink($rutaDestino);
        }

        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../../notas");
        exit();
    }
} else {
    // Si no es una petición POST, redirigir
    header("Location: ../../notas");
    exit();
}
?>