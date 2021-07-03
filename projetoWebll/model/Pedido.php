<?php
class Pedido {
    
    private $pedidoid;
    private $data_emissao;
    private $data_entrega;
    private $situacao;

    public function __construct( $pedidoid, $data_emissao, $data_entrega, $situacao)
    {
        $this->pedidoid=$pedidoid;
        $this->data_emissao=$data_emissao;
        $this->data_entrega=$data_entrega;
        $this->situacao=$situacao;
    }

    public function getPedidoid() { return $this->pedidoid; }
    public function setPedidoid($pedidoid) { $this->pedidoid = $pedidoid; }

    public function getData_emissao() { return $this->data_emissao; }
    public function setData_emissao($data_emissao) {$this->data_emissao = $data_emissao;}

    public function getData_entrega() { return $this->data_entrega; }
    public function setData_entrega($data_entrega) {$this->data_entrega = $data_entrega;}

    public function getSituacao() { return $this->situacao; }
    public function setSituacao($situacao) {$this->situacao = $situacao;}
}
