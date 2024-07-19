<?php
class Categoria extends Conectar {

    public function get_categoria() {
        $conectar = parent::conexion();
        parent::set_name(); // No se muestra la definición de este método en el código proporcionado
        $sql = "SELECT * FROM tm_categoria WHERE estado = 1;"; // Se recomienda usar espacios alrededor de los operadores de comparación
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(); // No es necesario asignar el resultado a una variable antes de retornarlo
    }

}
?>
