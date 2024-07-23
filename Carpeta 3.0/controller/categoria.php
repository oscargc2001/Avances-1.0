<?php 
require_once("../conf/conexion.php"); 
require_once("../models/Categoria.php"); 
$categoria = new Categoria();

switch($_GET["op"]){
    case "combo":
        $datos = $categoria->get_categoria();
        if(is_array($datos) == true and count($datos)>0){
           /*  $html= "<option></option>";*/  
            foreach($datos as $row)
            {
                $html .= "<option value='" . $row['categoria_id'] . "'>" . $row['categoria_nombre'] . "</option>";

            }
            echo $html;
         

        }
        break;
}



?> 
