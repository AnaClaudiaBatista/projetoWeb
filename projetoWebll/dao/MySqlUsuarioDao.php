<?php

include_once('UsuarioDao.php');
include_once('MySqlDao.php');

class MySqlUsuarioDao extends MySqlDao implements UsuarioDao {

    private $table_name = 'usuario';
    
    public function insere($usuario) {

        $query = "INSERT INTO " . $this->table_name . 
        " (login, senha, nome) VALUES" .
        " (:login, :senha, :nome)";

        $stmt = $this->conn->prepare($query);

        $login = $usuario->getLogin();
        $senha = md5($usuario->getSenha());
        $nome = $usuario->getNome();

        // bind values 
        $stmt->bindParam(":login", $login);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":nome", $nome);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function removePorId($usuarioid) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE usuarioid = :usuarioid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':usuarioid', $usuarioid);

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }
/*
    public function remove($usuario) {
        return removePorId($usuario->getId());
    }*/

    public function altera(&$usuario) {

        $query = "UPDATE " . $this->table_name . 
        " SET login = :login, senha = :senha, nome = :nome" .
        " WHERE usuarioid = :usuarioid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", md5($usuario->getSenha()));
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(':usuarioid', $usuario->getUsuarioid());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($usuarioid) {
        
        $usuario = null;

        $query = "SELECT
                    usuarioid, login, nome, senha
                FROM
                    " . $this->table_name . "
                WHERE
                usuarioid = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $usuarioid);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $usuario = new Usuario($row['usuarioid'],$row['login'], $row['senha'], $row['nome']);
        } 
     
        return $usuario;
    }

    public function buscaPorLogin($login) {

        $usuario = null;

        $query = "SELECT
                    usuarioid, login, senha, nome
                FROM
                    " . $this->table_name . "
                WHERE
                    login = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $login);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $usuario = new Usuario($row['usuarioid'],$row['login'], $row['senha'], $row['nome']);
        }
     
        return $usuario;
    }

    /*
    public function buscaTodos() {

        $query = "SELECT
                    usuarioid, login, senha, nome
                FROM
                    " . $this->table_name . 
                    " ORDER BY usuarioid ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
    */

    public function buscaTodos() {

        $usuarios = array();

        $query = "SELECT
                    usuarioid, login, senha, nome
                FROM
                    " . $this->table_name . 
                    " ORDER BY usuarioid ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $usuarios[] = new Usuario($usuarioid,$login,$senha,$nome);
        }
        
        return $usuarios;
    }
}
?>