<?php
require_once("../conf/conexion.php");
require_once("../models/Ticket.php");
$ticket = new Ticket();

switch ($_GET["op"]) {
    case "insert":
        // Elimina la coma extra al final del último parámetro
        $ticket->insert_ticket($_POST["usuario_id"], $_POST["categoria_id"], $_POST["ticket_titulo"], $_POST["ticket_descripcion"]);
        break;

    case "listar_x_usu":
        // Verifica que el método correcto sea llamado
        $datos = $ticket->listar_ticket_x_usu($_POST["usuario_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ticket_id"];
            $sub_array[] = $row["categoria_id"];
            $sub_array[] = $row["ticket_titulo"];
            
            if ($row["ticket_estado"]=="Abierto") {
                $sub_array[] =' <span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[] ='<span class="label label-pill label-danger">Cerrado</span> ';

            }

            $sub_array[] = date("d-m-Y H:i:s", strtotime($row["fecha_crea"])); // Formato d-m-Y H:i:s
            $sub_array[] = '<button type="button" onClick="editar(' . $row["ticket_id"] . ');" id="' . $row["ticket_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye" aria-hidden="true"></i></button>';
            $data[] = $sub_array;
        }
        
        // Asumiendo que se está utilizando DataTables, aquí puedes contar el número total de registros para el paginado
        $totalRecords = count($data); // Puede que necesites ajustar esto según la consulta SQL real
        $result = array(
            "sEcho" => intval($_POST["sEcho"]), // Asegúrate de pasar el parámetro sEcho para DataTables
            "iTotalRecords" => $totalRecords, // Total de registros en la consulta (sin filtro)
            "iTotalDisplayRecords" => $totalRecords, // Total de registros después del filtrado, si hay paginación
            "aaData" => $data // Datos a mostrar en la tabla
        );
        
        echo json_encode($result);
        break;
    case "listar":
        // Verifica que el método correcto sea llamado
        $datos = $ticket->listar_ticket();
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["ticket_id"];
            $sub_array[] = $row["categoria_id"];
            $sub_array[] = $row["ticket_titulo"];

            if ($row["ticket_estado"]=="Abierto") {
                $sub_array[] =' <span class="label label-pill label-success">Abierto</span>';
            } else {
                $sub_array[] ='<span class="label label-pill label-danger">Cerrado</span> ';

            }



            $sub_array[] = date("d-m-Y H:i:s", strtotime($row["fecha_crea"])); // Formato d-m-Y H:i:s
            $sub_array[] = '<button type="button" onClick="editar(' . $row["ticket_id"] . ');" id="' . $row["ticket_id"] . '" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye" aria-hidden="true"></i></button>';
            $data[] = $sub_array;
        }
        
        // Asumiendo que se está utilizando DataTables, aquí puedes contar el número total de registros para el paginado
        $totalRecords = count($data); // Puede que necesites ajustar esto según la consulta SQL real
        $result = array(
            "sEcho" => intval($_POST["sEcho"]), // Asegúrate de pasar el parámetro sEcho para DataTables
            "iTotalRecords" => $totalRecords, // Total de registros en la consulta (sin filtro)
            "iTotalDisplayRecords" => $totalRecords, // Total de registros después del filtrado, si hay paginación
            "aaData" => $data // Datos a mostrar en la tabla
        );
        
        echo json_encode($result);
        break;
}
?>
