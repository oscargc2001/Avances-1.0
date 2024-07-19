<?php
class Ticket extends Conectar {
    public function insert_ticket($usuario_id, $categoria_id, $ticket_titulo, $ticket_descripcion) {
        $conectar = parent::conexion();
        parent::set_name();
        $sql = "INSERT INTO tm_ticket (usuario_id, categoria_id, ticket_titulo, ticket_descripcion,fecha_crea, estado) VALUES (?, ?, ?, ?, now(), 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $usuario_id);
        $sql->bindValue(2, $categoria_id);
        $sql->bindValue(3, $ticket_titulo);
        $sql->bindValue(4, $ticket_descripcion);
        $sql->execute();
        
        return $conectar->lastInsertId(); 
    }

        // Para mostrar las listas 
        public function listar_ticket_x_usu($usuario_id) {
            $conectar = parent::conexion();
            parent::set_name();
            $sql = "SELECT 
                tm_ticket.ticket_id,
                tm_ticket.usuario_id,
                tm_ticket.categoria_id,
                tm_ticket.ticket_titulo,
                tm_ticket.ticket_descripcion,
                tm_ticket.fecha_crea,
                tm_usuario.usuario_nombre,
                tm_usuario.usuario_apellido,
                tm_categoria.categoria_nombre
            FROM
                tm_ticket
            INNER JOIN tm_categoria ON tm_ticket.categoria_id = tm_categoria.categoria_id
            INNER JOIN tm_usuario ON tm_ticket.usuario_id = tm_usuario.usuario_id
            WHERE
                tm_ticket.estado = 1
                AND tm_usuario.usuario_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usuario_id);
            $sql->execute();
            return $sql->fetchAll();
        }
        
}
?>
