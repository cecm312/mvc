<?php

abstract class DBModel {

    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    protected $db_name = 'itic';
    public $query;
    protected $rows = array();
    private $conn;
    public $mensaje = "hecho";

    abstract protected function get();

    abstract protected function set();

    abstract protected function edit();

    abstract protected function delete();

    //conectar ala base de datos
    private function open_connection() {
        $this->conn = new mysqli(
                self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
    }

    private function close_conection() {
        $this->conn->close();
    }

    //ejecuta un query si,ple del tipo inset,delete,update
    protected function execute_query() {
        if ($_POST) {
            $this->open_connection();
            $this->conn->query($this->query);
            $this->close_conection();
        } else {
            $this->mensaje = 'Metodo no permitido';
        }
    }

    //Traer resuktadis de una consulta en un array
    protected function get_results_query() {
        $this->open_connection();
        $result = $this->conn->query($this->query);
        while ($this->rows[] = $result->fetch_assoc());
        $result->close();
        $this->close_conection();
        array_pop($this->rows);
    }

}

?>