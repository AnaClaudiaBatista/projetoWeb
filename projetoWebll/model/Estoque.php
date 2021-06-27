<?php
class Estoque{
    
    private $produtoid;
    private $preco;
    private $quantidade;

    public function __construct($produtoid, $preco, $quantidade)
    {
        $this->produtoid   =$produtoid;
        $this->preco        =$preco;
        $this->quantidade   =$quantidade;
    }

    public function getProdutoid() { return $this->produtoid; }
    public function setProdutoid($produtoid) {$this->produtoid = $produtoid;}
    
    public function getPreco() { return $this->preco; }
    public function setPreco($preco) {$this->preco = $preco;}

    public function getQuantidade() { return $this->quantidade; }
    public function setQuantidade($quantidade) {$this->quantidade = $quantidade;}
}