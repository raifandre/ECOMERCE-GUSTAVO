<?php

class Database{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $port = "3306";
    protected $conn = NULL;
    private $dbname = "database";

    public function open()
    {
        $this->conn = new PDO('mysql:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname . '', $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ));
        return $this->conn;
    }

    public function close()
    {
        $this->conn = NULL;
    }

}

?>