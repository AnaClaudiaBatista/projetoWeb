<?php

include_once('ClienteDao.php');
include_once('MySqlDao.php');

class MySqlClienteDao extends MySqlDao implements ClienteDao {

    private $table_name = 'cliente';

    public function insere($cliente) {
        
       $query = "INSERT INTO " . $this->table_name .
            " (  nome,  email,  telefone,  cpf,  tipo_usuario,  num_cartaocredito,  cvv_cartaocredito,  titular_cartaocredito,  vencimento_cartaocredito, usuarioid) VALUES" .
            " ( :nome, :email, :telefone, :cpf , :tipo_usuario, :num_cartaocredito, :cvv_cartaocredito, :titular_cartaocredito, :vencimento_cartaocredito,  :usuarioid)";

        $stmt = $this->conn->prepare($query);


        $nome                      = $cliente->getNome();
        $email                     = $cliente->getEmail();
        $telefone                  = $cliente->getTelefone();
        $cpf                       = $cliente->getCpf();       
        $tipo_usuario              = $cliente->getSenha();
        $num_cartaocredito         = $cliente->getNum_cartaocredito();
        $cvv_cartaocredito         = $cliente->geCvv_cartaocredito();
        $titular_cartaocredito     = $cliente->getTitular_cartaocredito();
        $vencimento_cartaocredito  = $cliente->getVencimento_cartaocredito();
        $usuarioid                 = $cliente->getUsuarioid();


  

        // bindValue || bindParam
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":telefone", $telefone); 
        $stmt->bindValue(":cpf",$cpf);
        $stmt->bindValue(":tipo_usuario",$tipo_usuario);
        $stmt->bindValue(":num_cartaocredito",$num_cartaocredito);
        $stmt->bindValue(":cvv_cartaocredito",$cvv_cartaocredito);
        $stmt->bindValue(":titular_cartaocredito",$titular_cartaocredito);
        $stmt->bindValue(":vencimento_cartaocredito",$vencimento_cartaocredito); 
        $stmt->bindValue(":usuarioid",$usuarioid);     

       
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
    { " (  nome,  email,  telefone,  cpf,  ,  tipo_usuario,  num_cartaocredito,  cvv_cartaocredito,  titular_cartaocredito,  vencimento_cartaocredito) VALUES" .
        " ( :nome, :email, :telefone, :cpf, , :tipo_usuario, :num_cartaocredito, :cvv_cartaocredito, :titular_cartaocredito, :vencimento_cartaocredito)";


        $query = "UPDATE " . $this->table_name .
            " SET nome = :nome,  email = :email,telefone = :telefone, cpf = :cpf,num_cartaocredito = :num_cartaocredito, cvv_cartaocredito = :cvv_cartaocredito,  titular_cartaocredito = :titular_cartaocredito,  vencimento_cartaocredito = :vencimento_cartaocredito " .
            " WHERE clienteid = :clienteid";

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":nome", $cliente->getNome());
        $stmt->bindValue(":email", $cliente->getEmail());
        $stmt->bindValue(":telefone", $cliente->getTelefone());
        $stmt->bindValue(":cpf", $cliente->getCpf());
        $stmt->bindValue(":num_cartaocredito", $cliente->getNum_cartaocredito());
        $stmt->bindValue(":cvv_cartaocredito", $cliente->getCvv_cartaocredito());
        $stmt->bindValue(":titular_cartaocredito", $cliente->getTitular_cartaocredito());
        $stmt->bindValue(":vencimento_cartaocredito", $cliente->getVencimento_cartaocredito());

         

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
                   clienteid, nome, cpf, telefone, email,num_cartaocredito,usuarioid
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
            $cliente = new Cliente($row['clienteid'], $row['nome'], $row['email'], $row['telefone'], $row['cpf'], $row['tipo_usuario'],$row['num_cartaocredito'],$row['cvv_cartaocredito'],$row['titular_cartaocredito'],$row['vencimento_cartaocredito'],$row['usuarioid']);

        }

        return $cliente;
    }



    public function buscaTodos()    {

        $clientes = array();

        $query = "SELECT
                    clienteid, nome, email, telefone, cpf
                FROM
                    " . $this->table_name .
            " ORDER BY clienteid";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
          //  $clientes[] = new Cliente($clienteid,$nome, $email, $telefone, $cpf, $tipo_usuario, $num_cartaocredito, $cvv_cartaocredito, $titular_cartaocredito, $vencimento_cartaocredito, $usuarioid);
           $clientes[] = new Cliente($clienteid,$nome, $email, $telefone, $cpf, null, null, null,null, null, null);

        }

        return $clientes;
    }

    public function buscaUsuarioCliente($usuarioid) {

        $cliente = array();

        $query = "select a.*
                FROM
                    " . $this->table_name . " a
                inner join usuario u on a.usuarioid = u.id
                where u.id = :usuario";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam('usuario', $usuarioid);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $cliente = new Cliente($clienteid, $nome, $cpf, $telefone, $email, $num_cartaocredito, $usuarioid, null, null, null, null);
        }
        
        return $cliente;
    }
}  
