<?php

include_once('PedidoDao.php');
include_once('MySqlDao.php');

class MySqlPedidoDao extends MySqlDao implements PedidoDao {

    private $table_name = 'pedido';

    public function insere($pedido) {
        $id = 0;

        $query = 'INSERT INTO ' . $this->table_name .
                ' ( "data_emissao", "data_entrega", situacao, clienteid) VALUES' .
                ' ( now(), null, :situacao, :clienteid) returning pedidoid';

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":situacao", $pedido->getSituacao());
        $stmt->bindValue(":clienteid", $pedido->getClienteid());
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $id = $row['pedidoid'];
        }
        
        return $id;
    }

    public function insereItemPedido($pedido, $produto, $item_pedido) {
        $query = 'INSERT INTO "item_pedido"' .
                ' ( quantidade, preco, pedidoid, produtoid) VALUES' .
                ' ( :quantidade, :preco, :pedidoid, :produtoid)';

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":quantidade", $item_pedido->quantidade);
        $stmt->bindValue(":preco", $produto->getEstoque()->getPreco());
        $stmt->bindValue(":pedidoid", $pedido->getpedidoid());
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
            $query_set = " SET situacao = :situacao, \"data_entrega\" = now()";
        }
        else{
            $query_set = " SET situacao = :situacao";
        }

        $query = "UPDATE " . $this->table_name .
            $query_set .
            " WHERE pedidoid = :pedidoid";

        $stmt = $this->conn->prepare($query);

        // bindValue || bindParam
        $stmt->bindValue(":situacao", $pedido->getSituacao());
        $stmt->bindValue(":pedidoid", $pedido->getPedidoid());

        // execute the query
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function buscaPorId($pedidoid){  

        $pedido = null;

        $where_clause = ' and pedido.pedidoid = :pedidoid';

        $query = 'select ' .
            ' pedido.pedidoid , ' .
            ' pedido."data_emissao", ' .
            ' pedido.situacao , ' .
            ' pedido."data_entrega", ' .
            ' sum(item_pedido.quantidade * estoque.preco) as valorTotal, ' .
            ' cliente.nome ' .
            ' from pedido ' .
            ' inner join usuario on usuario.usuarioid = pedido.usuarioidd ' .
            ' inner join cliente on cliente.usuarioid = usuario.usuarioid' .
            ' left join item_pedido on pedido.pedidoid = item_pedido.pedidoid ' .
            ' left join produto on item_pedido.produtoid = produto.produtoid ' .
            ' left join estoque on produto.produtoid = estoque.produtoid ' .
            ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' pedido.pedidoid , ' .
            ' pedido."data_emissao", ' .
            ' pedido.situacao , ' .
            ' pedido."data_entrega", ' .
            ' cliente.nome ' .
            ' LIMIT 1 OFFSET 0 ';
                    

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pedidoid', $pedidoid);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($pedidoid, $data_emissao, $data_entrega, $situacao, $row['valortotal'],null,null);
            $pedido->setNomeCliente($nome);
        }

        return $pedido;
    }

    public function buscaItensPorPedido($pedidoid){  

        $pedido_items = array();

        $where_clause = '  pedido.pedidoid = :pedidoid';

        $query = 'select distinct ' .
            ' item_pedido.quantidade,' .
            ' item_pedido.produtoid' .
            ' from pedido ' .
            ' inner join item_pedido on pedido.pedidoid = item_pedido.pedidoid' .
            ' where 1=1 ' .
            $where_clause;
                    

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':pedidoid', $pedidoid);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido_items[] = new ItemPedido($produtoid, $quantidade);
        }

        return $pedido_items;
    }

    public function buscaTodos($perfil_usuario, $clienteid)  {

        $pedidos = array();
        $where_clause = ' ';

        if($perfil_usuario > 1)
        {
            $where_clause = ' and usuario.usuarioid = ' . $clienteid;
        }

        $query = 'select ' .
            ' pedido.pedidoid, ' .
            ' pedido."data_emissao", ' .
            ' pedido."data_entrega" , ' .
            ' pedido.situacao, ' .
            ' sum(item_pedido.quantidade * estoque.preco) as valorTotal, ' .
            ' cliente.nome ' .
            ' from pedido ' .
            ' inner join usuario on usuario.usuarioid = pedido.usuarioid ' .
            ' inner join cliente on cliente.usuarioid = usuario.usuarioid ' .
            ' left join item_pedido on pedido.pedidoid = item_pedido.pedidoid ' .
            ' left join produto on item_pedido.produtoid = produto.produtoid  ' .
            ' left join estoque on produto.produtoid = estoque.produtoid ' .
            ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' pedido.pedidoid , ' .
            ' pedido."data_emissao", ' .
            ' pedido.situacao , ' .
            ' pedido."data_entrega", '.
            ' cliente.nome ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($pedidoid, $data_emissao, $data_entrega, $situacao, $row['valortotal'],null,null);
            $pedido->setNomeCliente($nome);
            $pedidos[] = $pedido;
        }

        return $pedidos;
    }
    public function buscaTodosIdNome($pedidoid, $nome)  {

        $pedidos = array();

        if($pedidoid != "")
        {
            $where_clause = ' and pedido.pedidoid = ' . $pedidoid;
        }

        if($nome != "")
        {
            $where_clause = " and UPPER(cliente.nome) like UPPER('%" . $nome . "%')";
        }
        

        $query = 'select ' .
        ' pedido.pedidoid, ' .
        ' pedido."data_emissao", ' .
        ' pedido."data_entrega" , ' .
        ' pedido.situacao, ' .
        ' sum(item_pedido.quantidade * estoque.preco) as valorTotal, ' .
        ' cliente.nome ' .
        ' from pedido ' .
        ' inner join usuario on usuario.usuarioid = pedido.usuarioid ' .
        ' inner join cliente on cliente.usuarioid = usuario.usuarioid ' .
        ' left join item_pedido on pedido.pedidoid = item_pedido.pedidoid ' .
        ' left join produto on item_pedido.produtoid = produto.produtoid  ' .
        ' left join estoque on produto.produtoid = estoque.produtoid ' .
        ' where 1=1 ' .
            $where_clause . 
            ' group by ' .
            ' p.pedidoid , ' .
            ' p."data_emissao", ' .
            ' p.situacao , ' .
            ' p."data_entrega", '.
            ' c.nome ';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $pedido = new Pedido($pedidoid, $data_emissao, $data_entrega, $situacao, $row['valortotal'],null,null);
            //$pedido->setNomeCliente($nome);
            $pedidos[] = $pedido;
        }

        return $pedidos;
    }
}
