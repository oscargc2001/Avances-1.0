<?php

session_start();

class Conectar {
    protected $dbh;

    protected function Conexion() {
        try {
            $this->dbh = new PDO("mysql:host=localhost;dbname=sistema", "root", "");

            // Establecer el conjunto de caracteres a UTF-8
            $this->dbh->query("SET NAMES 'utf8'");

            return $this->dbh;
        } catch (PDOException $e) {
            // Manejar el error de conexión de manera adecuada
            print "¡Error DB!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_name() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public  static function ruta() { // Nos mandaba error por el statin que como en js nos ayuda a exportar funciones 
        return "http://localhost/sistema1.0/";
    }
}

?>
