<?php
class Pedido {
    
    private $pedidoid;
    private $data_emissao;
    private $data_entrega;
    private $situacao;
    private $valorTotal;
    private $clienteid;
    private $nome_cliente;

    public function __construct( $pedidoid, $data_emissao, $data_entrega, $situacao,$valorTotal,$clienteid,$nome_cliente)
    {
        $this->pedidoid=$pedidoid;
        $this->data_emissao=$data_emissao;
        $this->data_entrega=$data_entrega;
        $this->situacao=$situacao;
        $this->valorTotal=$valorTotal;
        $this->clienteid=$clienteid;
        $this->nome_cliente=$nome_cliente;
    }

    public function getPedidoid() { return $this->pedidoid; }
    public function setPedidoid($pedidoid) { $this->pedidoid = $pedidoid; }

    public function getDataPedido() { return $this->data_emissao; }
    public function setDataPedido($data_emissao) {$this->data_emissao = $data_emissao;}

    public function getDataEntregue() { return $this->data_entrega; }
    public function setEntregue($data_entrega) {$this->data_entrega = $data_entrega;}

    public function getSituacao() { return $this->situacao; }
    public function setSituacao($situacao) {$this->situacao = $situacao;}

    public function getValorTotal() { return $this->valorTotal; }
    public function setValorTotal($valorTotal) {$this->valorTotal = $valorTotal;}

    public function getClienteid() { return $this->clienteid; }
    public function setClienteid($clienteid) {$this->clienteid = $clienteid;}

    public function getNomeCliente() { return $this->nome_cliente; }
    public function setNomeCliente($nome_cliente) {$this->nome_cliente = $nome_cliente;}
}
