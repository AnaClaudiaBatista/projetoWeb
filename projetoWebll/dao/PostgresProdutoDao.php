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

        
        $nome       = $produto->getNome();        
        $descricao  = $produto->getDescricao();
        $foto = $produto->getFoto();
        
        
        // bind values 
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":foto", $foto);

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
                    p.produtoid, p.nome, p.descricao, e.quantidade, e.preco
                FROM
                    " . $this->table_name . " p" .
                    " left join estoque e on p.produtoid = e.produtoid  " .
                    "WHERE p.produtoid = ? " .
                    "LIMIT 1 OFFSET 0";

        /*$query = "SELECT
                    produtoid, nome, descricao
                FROM
                    " . $this->table_name . "
                WHERE
                    produtoid = ?
                LIMIT
                    1 OFFSET 0";*/
     
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $produtoid);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new produto($row['produtoid'],$row['nome'], $row['descricao'], null);
            $produto->setEstoque(new Estoque($row['produtoid'], $row['preco'], $row['quantidade']));
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

        $produtos = array();

        $query = "SELECT
                    p.produtoid, p.nome, p.descricao, e.quantidade, e.preco, encode(p.foto, 'base64') as foto
                FROM
                    " . $this->table_name . " p" .
                    " left join estoque e on p.produtoid = e.produtoid  " .
                    " ORDER BY p.produtoid ASC";
     
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $data_foto = null;
            

            if(isset($foto))
            {
                $data_foto = 'data:image/png;base64,' . $foto;
            }

            $item = new Produto($produtoid,$nome,$descricao, $data_foto);
            $item->setEstoque(new Estoque($produtoid, $preco, $quantidade));

            $produtos[] = $item;
        }
        
        return $produtos;
    }
}
?>