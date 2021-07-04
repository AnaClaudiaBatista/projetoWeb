<?php
class ItemPedido {
    
    private $produtoid;
    private $quantidade;

    public function __construct( $produtoid, $quantidade)
    {
        $this->produtoid=$produtoid;
        $this->quantidade=$quantidade;
    }

    public function getProdutoid() { return $this->produtoid; }
    public function setProdutoid($produtoid) { $this->produtoid = $produtoid; }

    public function getQuantidade() { return $this->quantidade; }
    public function setQuantidade($quantidade) {$this->quantidade = $quantidade;}
}
