<?php

include_once('PedidoDao.php');
include_once('PostgresDao.php');

class PostgresPedidoDao extends PostgresDao implements PedidoDao {

    private $table_name = 'pedido';

    public function insere($pedido) {
        $id = 0;

        $query = 'INSERT INTO ' . $this->table_name .
                ' ( "dataPedido", "dataEntregue", situacao) VALUES' .
                ' ( now(), null, :situacao) returning numero';

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":situacao", $pedido->getSituacao()); 
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $id = $row['numero'];
        }
        
        return $id;
    }

    public function insereItemPedido($pedido, $produto, $item_pedido) {
        $query = 'INSERT INTO "itemPedido"' .
                ' ( quantidade, preco, pedidoid, produtoid) VALUES' .
                ' ( :quantidade, :preco, :pedidoid, :produtoid)';

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":quantidade", $item_pedido->quantidade);
        $stmt->bindValue(":preco", $produto->getEstoque()->getPreco());
        $stmt->bindValue(":pedidoid", $pedido->getNumero());
        $stmt->bindValue(":produtoid", $item_pedido->produtoid);
        
        return $stmt->execute();
    }

    public function removePorId($pedidoid)
    {
        // $query = "DELETE FROM " . $this->table_name .
        //     " WHERE clienteid = :clienteid";

        // $stmt = $this->conn->prepare($query);

        // // bind parameters
        // $stmt->bindParam(':clienteid', $pedidoid);

        // // execute the query
        // if ($stmt->execute()) {
        //     return true;
        // }

        // return false;
    }

    public function altera($pedido)
    {

        // $query = "UPDATE " . $this->table_name .
        //     " SET nome = :nome, cpf = :cpf, telefone = :telefone, email = :email, cartaocredito= :cartaocredito" .
        //     " WHERE clienteid = :clienteid";

        // $stmt = $this->conn->prepare($query);

        // // bindValue || bindParam
        // $stmt->bindValue(":nome", $cliente->getNome());
        // $stmt->bindValue(":cpf", $cliente->getCpf());
        // $stmt->bindValue(":telefone", $cliente->getTelefone());
        // $stmt->bindValue(":email", $cliente->getEmail());
        // $stmt->bindValue(":cartaocredito", $cliente->getCartaocredito());
        // $stmt->bindValue(":clienteid", $cliente->getClienteid());

        // // execute the query
        // if ($stmt->execute()) {
        //     return true;
        // }else{
        //     return false;
        // }

        
    }

    public function buscaPorId($pedidoid){  

        $pedido = null;

        $query = "SELECT
                   *
                FROM
                    " . $this->table_name . "
                WHERE
                    numero = ?
                LIMIT
                    1 OFFSET 0";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $pedidoid);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $pedido = new Pedido($row['numero'], $row['dataPedido'], $row['dataEntregue'], $row['situacao']);
        }

        return $pedido;
    }



    public function buscaTodos()    {

        // $clientes = array();

        // $query = "SELECT
        //             clienteid, nome, cpf, telefone, email,cartaocredito
        //         FROM
        //             " . $this->table_name .
        //     " ORDER BY clienteid";

        // $stmt = $this->conn->prepare($query);
        // $stmt->execute();

        // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //     extract($row);
        //     $clientes[] = new Cliente($clienteid, $nome, $cpf, $telefone, $email, $cartaocredito);
        // }

        // return $clientes;
    }
}
