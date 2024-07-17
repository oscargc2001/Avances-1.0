<!-- Cerramos la sesión -->
<?php
require_once("../../conf/conexion.php");

// Asegúrate de que la sesión está iniciada
session_start();

// Verifica si la sesión del usuario está establecida
if (isset($_SESSION["usuario_id"])) {
    // Aquí puedes agregar el contenido que quieras mostrar si el usuario está autenticado
?>

<!DOCTYPE html>
<html lang="es">
    <!-- Llamamos a MainHead -->
    <?php require_once('../MainHead/head.php'); ?>
    <title>Nuevo Ticket</title>
</head>
<body class="with-side-menu">

<!-- Llamamos al Header -->
<?php require_once('../MainHeader/header.php'); ?>

<div class="mobile-menu-left-overlay"></div>

<!-- Llamamos al nav -->
<?php require_once('../MainNav/nav.php'); ?>

<!-- Contenido -->
<div class="page-content">
    <div class="container-fluid">

        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Nuevo Ticket</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Inicio</a></li>
                            <li class="active">Nuevo Ticket</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>

        <div class="box-typical box-typical-padding">
            <p>Ingresa los campos y envía tu ticket</p>

            <h5 class="m-t-lg with-border">Ingresa información</h5>

            <div class="row">
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="exampleSelect">Categoría</label>
                        <select id="exampleSelect" class="form-control">
                            <option>Datos</option>
                            <option>Software</option>
                            <option>Hardware</option>
                            <option>Red</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Título</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingresa el título">
                    </fieldset>
                </div>
                <div class="col-lg-12">
                    <fieldset class="form-group">
                        <label class="form-label semibold" for="ticket_descripcion">Descripción</label>
                        <div class="summernote-theme-1">
                            <textarea id="ticket_descripcion" name="ticket_descripcion" class="summernote"></textarea>
                        </div>
                    </fieldset>
                </div>
				<div class="col-lg-12">
                                <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                            </div>
            </div><!-- .row -->

        </div>
    </div>
</div>
<!-- Contenido -->

<!-- Llamamos a los scripts -->
<?php require_once("../MainJs/js.php"); ?>
<script type="text/javascript" src="nuevoTicket.js"></script>

</body>
</html>

<?php
} else {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header("Location: " . Conectar::ruta() . "index.php");
    exit();
}
?>
