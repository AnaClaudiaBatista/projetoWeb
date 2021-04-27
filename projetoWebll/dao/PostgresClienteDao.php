<?php

include_once('ClienteDao.php');
include_once('PostgresDao.php');

class PostgresClienteDao extends PostgresDao implements ClienteDao {

    private $table_name = 'cliente';

    public function insere($cliente) {
        
       $query = "INSERT INTO " . $this->table_name .
            " (  nome,  cpf,  telefone,  email,  cartaocredito) VALUES" .
            " ( :nome, :cpf, :telefone, :email, :cartaocredito)";

        $stmt = $this->conn->prepare($query);


        $nome          = $cliente->getNome();
        $cpf           = $cliente->getCpf();
        $telefone      = $cliente->getTelefone();
        $email         = $cliente->getEmail();
        $cartaocredito = $cliente->getCartaocredito();

        // bindValue || bindParam
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":cpf",$cpf);
        $stmt->bindValue(":telefone", $telefone); 
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":cartaocredito", $cartaocredito);   

       
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

}    

    public function removePorId($clienteid)
    {
        $query = "DELETE FROM " . $this->table_name .
            " WHERE clienteid = :clienteid";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':clienteid', $clienteid);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    /*
    public function remove($cliente) {
        return removePorId($cliente->getCPF());
    }*/

    public function altera($cliente)
    {

        $query = "UPDATE " . $this->table_name .
            " SET nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, cartaocredito= :cartaocredito" .
            " WHERE clienteid = :clienteid";

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":cpf", $cliente->getCpf());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":cartaocredito", $cliente->getCartaocredito());
        $stmt->bindValue(":clienteid", $cliente->getClienteid());

        // execute the query
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }

        
    }

    public function buscaPorId($clienteid){  

        $cliente = null;

        $query = "SELECT
                   clienteid, nome, cpf, telefone, email,cartaocredito
                FROM
                    " . $this->table_name . "
                WHERE
                    clienteid = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $clienteid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $cliente = new Cliente($row['clienteid'], $row['nome'], $row['cpf'], $row['telefone'], $row['email'], $row['cartaocredito']);
        }

        return $cliente;
    }



    public function buscaTodos()    {

        $clientes = array();

        $query = "SELECT
                    clienteid, nome, cpf, telefone, email,cartaocredito
                FROM
                    " . $this->table_name .
            " ORDER BY clienteid";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $clientes[] = new Cliente($clienteid, $nome, $cpf, $telefone, $email, $cartaocredito);
        }

        return $clientes;
    }
}
