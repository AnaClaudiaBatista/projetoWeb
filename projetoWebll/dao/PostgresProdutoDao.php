<?php

include_once('ProdutoDao.php');
include_once('PostgresDao.php');

class PostgresProdutoDao extends PostgresDao implements ProdutoDao {

    private $table_name = 'produto';
    
    public function insere($produto) {

        $query = "INSERT INTO " . $this->table_name . 
        " (nome, descricao) VALUES" .
        " (:nome, :descricao)";

        $stmt = $this->conn->prepare($query);

        
        $nome       = $produto->getNome();        
        $descricao  = $produto->getDescricao();

        // bind values 
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    public function removePorId($produtoid) {

        $query = "DELETE FROM " . $this->table_name . 
        " WHERE produtoid = :produtoid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':produtoid', $produtoid);

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
        " SET nome = :nome, descricao = :descricao" .
        " WHERE produtoid = :produtoid";

        $stmt = $this->conn->prepare($query);

        $nome       = $produto->getNome();        
        $descricao  = $produto->getDescricao();
        $produtoid  = $produto->getProdutoid();

        // bind parameters
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);       
        $stmt->bindParam(':produtoid', $produtoid);

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($produtoid) {
        
        $produto = null;

        $query = "SELECT
                    nome
                FROM
                    " . $this->table_name . "
                WHERE
                    produtoid = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $produtoid);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new produto(null,$row['nome'],null, null);
        } 
     
        return $produto;
    }

    public function buscaNome($produtoNome) {
        
        $produto = null;

        $query = "SELECT
                    nome
                FROM
                    " . $this->table_name . "
                WHERE
                    produtoid = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $produtoNome);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new produto(null,$row['nome'],null, null);
        } 
     
        return $produto;
    }

    
  

    public function buscaTodos() {

        $produtos = array();

        $query = "SELECT
                    produtoid, nome, descricao
                FROM
                    " . $this->table_name . 
                    " ORDER BY produtoid ASC";
     
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $produtos[] = new Produto($produtoid,$nome,$descricao, null);
        }
        
        return $produtos;
    }
}
?>