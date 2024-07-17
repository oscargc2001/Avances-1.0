
<?php
// Llamamos a nuestro login
require_once("conf/conexion.php");

if(isset($_POST["enviar"]) && $_POST["enviar"] == "si") {
    require_once("models/Usuario.php");
    $usuario = new Usuario(); // Corregido el nombre de la clase
    $usuario->login(); 
}
?>


<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sistema de tickets</title>

	<link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
	<link href="public/img/favicon.png" rel="icon" type="image/png">
	<link href="public/img/favicon.ico" rel="shortcut icon">


<link rel="stylesheet" href="public/css/separate/pages/login.min.css">
    <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box" action="" method="post" id="login_form" >
                    <div class="sign-avatar">
                        <img src="public/img/avatar-sign.png" alt="">
                    </div>
                    <header class="sign-title">Inicio de sesion</header>

                    <!--Creamos una alerta para nuestro mensaje-->
                    <?php 
if(isset($_GET["m"])) {
    switch($_GET["m"]) {
        case "1":
            $mensaje = "Usuario o contraseña incorrectos.";
            $clase_alerta = "alert-danger";
            break;
        case "2":
            $mensaje = "Campos vacíos.";
            $clase_alerta = "alert-warning";
            break;
        default:
            $mensaje = "";
            $clase_alerta = "";
            break;
    }
}
?>
<!--Creamos una clase para los campos -->
<?php if(!empty($mensaje)) : ?>
    <div id="alerta" class="alert <?php echo $clase_alerta; ?>" role="alert">
        <?php echo $mensaje; ?>
    </div>
<?php endif; ?>
                    <div class="form-group">
                        <input type="text" id="usuario_correo" name="usuario_correo" class="form-control" placeholder="Correo Electronico"/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="usuario_password" name="usuario_password" class="form-control" placeholder="Contraseña"/>
                    </div>
                    <div class="form-group">
                      
                        <div class="float-right reset">
                            <a href="reset-password.html">Cambiar contraseña</a>
                        </div>
                    </div>
                    <input type="hidden" name="enviar" class="form-control" value="si">
                    <button type="submit" id="boton" class="btn btn-rounded">Iniciar</button>

                   
                    
                </form>
            </div>
        </div>
    </div>


<script src="public/js/lib/jquery/jquery.min.js"></script>
<script src="public/js/lib/tether/tether.min.js"></script>
<script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="public/js/plugins.js"></script>
    <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
    <script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>
<script src="public/js/app.js"></script>
<script src="alertaLogin/login.js"></script>
</body>
</html>
