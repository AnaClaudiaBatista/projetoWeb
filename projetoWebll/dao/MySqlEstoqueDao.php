<?php
/*
include_once('PedidoDao.php');
include_once('MySqlDao.php');

class MySqlPedidoDao extends MySqlDao implements PedidoDao {

    private $table_name = 'pedido';

    public function insere($pedido) {
        $id = 0;

        $query = 'INSERT INTO ' . $this->table_name .
                ' ( "dataPedido", "dataEntregue", situacao, clienteid) VALUES' .
                ' ( now(), null, :situacao, :clienteid) returning numero';

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":situacao", $pedido->getSituacao());
        $stmt->bindValue(":clienteid", $pedido->getClienteid());
        
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

    public function alteraSituacao($pedido, $situacao)
    {
        if(strcmp($situacao, 'ENTREGUE') == 0)
        {
            $query_set = " SET situacao = :situacao, \"dataEntregue\" = now()";
        }
        else{
            $query_set = " SET situacao = :situacao";
        }

        $query = "UPDATE " . $this->table_name .
            $query_set .
            " WHERE numero = :numero";

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":situacao", $pedido->getSituacao());
        $stmt->bindValue(":numero", $pedido->getNumero());

        // execute the query
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function buscaPorId($pedidoid){  

        $pedido = null;

        $where_clause = ' and p.numero = :pedidoid';

        $query = 'select ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", ' .
            ' sum(ip.quantidade * e.preco) as valorTotal, ' .
            ' c.nome ' .
            ' from pedido p ' .
            ' inner join cliente c on c.clienteid = p.clienteid ' .
            ' inner join usuario u on c.usuarioid = u.id ' .
            ' left join "itemPedido" ip on p.numero = ip.pedidoid ' .
            ' left join produto p2 on ip.produtoid = p2.produtoid ' .
            ' left join estoque e on p2.produtoid = e.produtoid ' .
            ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", ' .
            ' c.nome ' .
            ' LIMIT 1 OFFSET 0 ';
                    

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pedidoid', $pedidoid);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($numero, $dataPedido, $dataEntregue, $situacao, $row['valortotal']);
            $pedido->setNomeCliente($nome);
        }

        return $pedido;
    }

    public function buscaItensPorPedido($pedidoid){  

        $pedido_items = array();

        $where_clause = ' and p.numero = :pedidoid';

        $query = 'select distinct ' .
            ' ip.quantidade,' .
            ' ip.produtoid' .
            ' from pedido p ' .
            ' inner join "itemPedido" ip on p.numero = ip.pedidoid ' .
            ' where 1=1 ' .
            $where_clause;
                    

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pedidoid', $pedidoid);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido_items[] = new PedidoItem($produtoid, $quantidade);
        }

        return $pedido_items;
    }

    public function buscaTodos($perfil_usuario, $clienteid)  {

        $pedidos = array();
        $where_clause = ' ';

        if($perfil_usuario > 1)
        {
            $where_clause = ' and u.id = ' . $clienteid;
        }

        $query = 'select ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", ' .
            ' sum(ip.quantidade * e.preco) as valorTotal, ' .
            ' c.nome ' .
            ' from pedido p ' .
            ' inner join cliente c on c.clienteid = p.clienteid ' .
            ' inner join usuario u on c.usuarioid = u.id ' .
            ' left join "itemPedido" ip on p.numero = ip.pedidoid ' .
            ' left join produto p2 on ip.produtoid = p2.produtoid ' .
            ' left join estoque e on p2.produtoid = e.produtoid ' .
            ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", '.
            ' c.nome ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($numero, $dataPedido, $dataEntregue, $situacao, $row['valortotal']);
            $pedido->setNomeCliente($nome);
            $pedidos[] = $pedido;
        }

        return $pedidos;
    }
    public function buscaTodosIdNome($numero, $nome)  {

        $pedidos = array();

        if($numero != "")
        {
            $where_clause = ' and p.numero = ' . $numero;
        }

        if($nome != "")
        {
            $where_clause = " and UPPER(c.nome) like UPPER('%" . $nome . "%')";
        }
        

        $query = 'select ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", ' .
            ' sum(ip.quantidade * e.preco) as valorTotal, ' .
            ' c.nome ' .
            ' from pedido p ' .
            ' inner join cliente c on c.clienteid = p.clienteid ' .
            ' inner join usuario u on c.usuarioid = u.id ' .
            ' left join "itemPedido" ip on p.numero = ip.pedidoid ' .
            ' left join produto p2 on ip.produtoid = p2.produtoid ' .
            ' left join estoque e on p2.produtoid = e.produtoid ' .
            ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' p.numero , ' .
            ' p."dataPedido", ' .
            ' p.situacao , ' .
            ' p."dataEntregue", '.
            ' c.nome ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($numero, $dataPedido, $dataEntregue, $situacao, $row['valortotal']);
            //$pedido->setNomeCliente($nome);
            $pedidos[] = $pedido;
        }

        return $pedidos;
    }
}
*/