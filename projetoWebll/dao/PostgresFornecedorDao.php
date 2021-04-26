<?php

include_once('FornecedorDao.php');
include_once('PostgresDao.php');

class PostgresFornecedorDao extends PostgresDao implements FornecedorDao
{

    private $table_name = 'fornecedor';

    public function insere($fornecedor)
    {
        $query = "INSERT INTO " . $this->table_name .
            " ( nome,  cnpj,  descricao,  telefone, email) VALUES" .
            " (:nome, :cnpj, :descricao, :telefone,:email)";

        $stmt = $this->conn->prepare($query);

        // bind values bindParam || bindValue 
        $stmt->bindValue(":nome", $fornecedor->getNome());
        $stmt->bindValue(":cnpj", $fornecedor->getCnpj());
        $stmt->bindValue(":telefone", $fornecedor->getTelefone());
        $stmt->bindValue(":email", $fornecedor->getEmail());
        $stmt->bindValue(":descricao", $fornecedor->getDescricao());
        /*ver como inserir o endereco*/

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function removePorId($fornecedorid)
    { /*por cnpj*/
        $query = "DELETE FROM " . $this->table_name .
            " WHERE fornecedorid = :fornecedorid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':fornecedorid', $fornecedorid);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    /*
    public function remove($fornecedor) {
        return removePorId($fornecedor->getCNPJ());
    }*/

    public function altera($fornecedor)
    {

        $query = "UPDATE " . $this->table_name .
            " SET nome = :nome, cnpj = :cnpj, telefone = :telefone, email = :email, descricao = :descricao" .
            " WHERE fonecedorid = :fornecedorid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":nome", $fornecedor->getNome());
        $stmt->bindParam(":cnpj", ($fornecedor->getCnpj()));        
        $stmt->bindParam(":telefone", $fornecedor->getTelefone());
        $stmt->bindParam(':email', $fornecedor->getEmail());
        $stmt->bindParam(":descricao", $fornecedor->getDescricao());
        $stmt->bindValue(':fornecedorid', $fornecedor->getFornecedorid());

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function buscaPorId($fornecedorid)
    {

        $fornecedor = null;

        $query = "SELECT
                    fornecedorid, nome, cnpj, telefone, email, descricao
                FROM
                    " . $this->table_name . "
                WHERE
                    fornecedorid = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $fornecedorid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $fornecedor = new Fornecedor($row['fornecedorid'], $row['nome'], $row['cnpj'], $row['telefone'], $row['email'], $row['descricao']);
        }

        return $fornecedor;
    }



    public function buscaTodos()
    {

        $fornecedores = array();

        $query = "SELECT
                    fornecedorid, nome, cnpj, descricao, telefone, email
                FROM
                    " . $this->table_name .
            " ORDER BY nome ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $fornecedores[] = new Fornecedor($fornecedorid, $nome, $cnpj, $descricao, $telefone, $email);
        }

        return $fornecedores;
    }
}
