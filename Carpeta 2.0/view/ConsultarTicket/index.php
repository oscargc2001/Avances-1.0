<!--Cerramos la sesion-->
<?php
require_once ("../../conf/conexion.php");

// Asegúrate de que la sesión está iniciada
session_start();

// Verifica si la sesión del usuario está establecida
if (isset($_SESSION["usuario_id"])) {
    // Aquí puedes agregar el contenido que quieras mostrar si el usuario está autenticado
    ?>

<!DOCTYPE html>
<html>
    <!--Llamamos a MainHead-->
    <?php require_once('../MainHead/head.php'); ?>
    <title>Consultar Ticket</title>
</head>
<body class="with-side-menu">

<!--Llamamos al Header-->
<?php require_once('../MainHeader/header.php'); ?>

	<div class="mobile-menu-left-overlay"></div>

    <!--Llamamos al nav-->
    <?php require_once('../MainNav/nav.php'); ?>


    <!--Contenido-->
	<div class="page-content">
		<div class="container-fluid">
        <header class="section-header">
            <div class="tbl">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <h3>Consultar Ticket</h3>
                        <ol class="breadcrumb breadcrumb-simple">
                            <li><a href="#">Inicio</a></li>
                            <li class="active">Consultar Ticket</li>
                        </ol>
                    </div>
                </div>
            </div>
        </header>
        <div class="box-typical box-typical-padding">
    <table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
        <thead>
            <tr>
                <th style="width: 5%">Nro. Ticket</th>
                <th style="width: 15%">Categoría</th>
                <th class="d-none d-sm-table-cell" style="width: 25%;">Título</th>
                <th class="d-none d-sm-table-cell" style="width: 5%;">Fecha de envio</th>
                <th class="text-center" style="width: 5%;"></th>
             
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se agregarán dinámicamente los datos de los tickets -->
        </tbody>
    </table>
</div>


		</div>
	</div>
    <!--Contenido-->


    <!--Llamamos a los scripts-->
    <?php require_once("../MainJs/js.php"); ?>
    <script type="text/javascript" src="consultarTicket.js"></script>

    <!--Cerramos la sesion-->


</body>
</html>
<?php
} else {
    // Redirige al usuario a la página de inicio de sesión si no está autenticado
    header("Location: " . Conectar::ruta() . "index.php");
    exit();
}
?>
