<?php
/* session_start();

class VistaModelo{
    protected static function obtener_vista($vistas){
           $palabrasPermitidas =['usuarios','perfil','home','notas','estudiantes','asistencia'];
           if (!isset($_SESSION['secion_ventas_id'])) {
            return "login";
         }
           if (in_array($vistas,$palabrasPermitidas)) {
             if (is_file("./views/".$vistas.".php")) {
                $contenido = "./views/".$vistas.".php"; 
             }else {
               $contenido = "404";
             }
           }elseif($vistas == "login" || $vistas =="index") {
            $contenido = "login";
           }else {
             $contenido = "404";
           }
           return $contenido;
    }
}
 */








session_start();

class VistaModelo {
    protected static function obtener_vista($vistas) {
        // Palabras permitidas para todos los usuarios
        $palabrasPermitidas = ['usuarios', 'perfil', 'home', 'notas', 'estudiantes', 'asistencia'];
        
        // Si no hay sesión activa, se redirige al login
        if (!isset($_SESSION['secion_ventas_id'])) {
            return "login";
        }

        // Verificar el tipo de usuario según su ID
        $usuario_id = $_SESSION['secion_ventas_id'];

        // Si el usuario es el admin (id == 1), asignar todas las vistas
        if ($usuario_id == 1) {
            if (in_array($vistas, $palabrasPermitidas)) {
                if (is_file("./views/" . $vistas . ".php")) {
                    $contenido = "./views/" . $vistas . ".php"; 
                } else {
                    $contenido = "404";
                }
            } else {
                $contenido = "404"; // Vista no permitida
            }
        } else {
            // Si el usuario es otro, restringir las vistas
            $vistasLimitadas = ['perfil', 'homeApoderado']; // Vistas permitidas para usuarios no admin
            if (in_array($vistas, $vistasLimitadas)) {
                if (is_file("./views/" . $vistas . ".php")) {
                    $contenido = "./views/" . $vistas . ".php"; 
                } else {
                    $contenido = "404A";
                }
            } else {
                // Si el usuario no tiene permisos para ver esta vista
                $contenido = "404A"; // Vista no permitida
            }
        }

        return $contenido;
    }
}

?>
