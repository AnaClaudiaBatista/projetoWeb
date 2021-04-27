<?php

include_once('ProdutoDao.php');
include_once('PostgresDao.php');

class PostgresProdutoDao extends PostgresDao implements ProdutoDao {

    private $table_name = 'produto';
    
    public function insere($produto) {

        $query = "INSERT INTO " . $this->table_name . 
        " (nome, descricao, foto) VALUES" .
        " (:nome, :descricao, :foto)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":nome", $produto->getnome());
        $stmt->bindParam(":descricao", md5($produto->getDescricao()));
        $stmt->bindParam(":foto", $produto->getFoto());

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function removePorId($id) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $id);

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }
/*
    public function remove($produto) {
        return removePorId($produto->getId());
    }*/

    public function altera($produto) {

        $query = "UPDATE " . $this->table_name . 
        " SET nome = :nome, descricao = :descricao, nome = :nome" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":nome", $produto->getnome());
        $stmt->bindParam(":descricao", md5($produto->getdescricao()));
        $stmt->bindParam(":nome", $produto->getNome());
        $stmt->bindParam(':id', $produto->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $produto = null;

        $query = "SELECT
                    id, nome, nome, descricao
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new produto($row['id'],$row['nome'], $row['descricao'], $row['nome']);
        } 
     
        return $produto;
    }

    public function buscaPornome($nome) {

        $produto = null;

        $query = "SELECT
                    id, nome, nome, descricao
                FROM
                    " . $this->table_name . "
                WHERE
                    nome = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $nome);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new produto($row['id'],$row['nome'], $row['descricao'], $row['nome']);
        }
     
        return $produto;
    }

    /*
    public function buscaTodos() {

        $query = "SELECT
                    id, nome, descricao, nome
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        return $stmt;
    }
    */

    public function buscaTodos() {

        $produto = array();

        $query = "SELECT
                    id, nome, descricao, nome
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $produto[] = new produto($id,$nome,$descricao,$nome);
        }
        
        return $produto;
    }
}
?>