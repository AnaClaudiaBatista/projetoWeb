<?php

include_once('DaoFactory.php');
include_once('PostgresUsuarioDao.php');
include_once('PostgresClienteDao.php');
include_once('PostgresFornecedorDao.php');
include_once('PostgresProdutoDao.php');
include_once('PostgresPedidoDao.php');

class PostgresDaofactory extends DaoFactory {

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "postgres";
    private $port = "5432";
    private $username = "postgres";
    private $password = "postgres";
    //private $password = "sql";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name, $this->username, $this->password);
            //$this->conn = new PDO("pgsql:host=localhost;port=5432;dbname=postgres", $this->username, $this->password);
    
      }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    public function getUsuarioDao() {
        return new PostgresUsuarioDao($this->getConnection());
    }

    public function getClienteDao() {
        return new PostgresClienteDao($this->getConnection());
    }

    public function getFornecedorDao() {
        return new PostgresFornecedorDao($this->getConnection());
    }

    public function getProdutoDao() {
        return new PostgresProdutoDao($this->getConnection());
    }

    public function getPedidoDao() {
        return new PostgresPedidoDao($this->getConnection());
    }
}
?>