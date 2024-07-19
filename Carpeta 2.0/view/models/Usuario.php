<?php

class Usuario extends Conectar {

    // Función para el inicio de sesión
    public function login() {
        $conectar = parent::Conexion(); // Corregido el nombre del método

        if (isset($_POST["enviar"])) {
            $correo = $_POST["usuario_correo"];
            $password = $_POST["usuario_password"];


            if (empty($correo) || empty($password)) {
                header("Location: " . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM tm_usuario WHERE usuario_correo = ? AND usuario_password = ? AND estado = 1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $correo);
                $stmt->bindValue(2, $password);
        
                $stmt->execute();
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($resultado && is_array($resultado) && count($resultado) > 0) {
                    // Creamos las variables de sesión
                    $_SESSION["usuario_id"] = $resultado["usuario_id"];
                    $_SESSION["usuario_nombre"] = $resultado["usuario_nombre"];
                    $_SESSION["usuario_apellido"] = $resultado["usuario_apellido"];
                   
                    header("Location: " . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    header("Location: " . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }
}

?>
