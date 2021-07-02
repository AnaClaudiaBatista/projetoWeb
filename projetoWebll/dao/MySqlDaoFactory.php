<?php

include_once('DaoFactory.php');
include_once('MySqlUsuarioDao.php');
include_once('MySqlClienteDao.php');
include_once('MySqlFornecedorDao.php');
include_once('MySqlProdutoDao.php');
//include_once('MySqlPedidoDao.php');
//include_once('MySqlEstoqueDao.php');*/

class MySqlDaofactory extends DaoFactory {

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "loja_virtual";
    private $port = "3306";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
        $dsn= "mysql:host" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
        
  
        try{
            $this->conn = new PDO($dsn, $this->username, $this->password);
    
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage() . "\n";
            echo "DSN = " . $dsn;
        }
        return $this->conn;
    }

    public function getUsuarioDao() {
        return new MySqlUsuarioDao($this->getConnection());
    }

    public function getClienteDao() {
        return new MySqlClienteDao($this->getConnection());
    }

    public function getFornecedorDao() {
        return new MySqlFornecedorDao($this->getConnection());
    }

    public function getProdutoDao() {
        return new MySqlProdutoDao($this->getConnection());
    }

   /* public function getPedidoDao() {
        return new MySqlPedidoDao($this->getConnection());
    }

    public function getEstoqueDao() {
        return new MySqlEstoqueDao($this->getConnection());
    }*/
}
?>