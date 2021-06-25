<?php
class Produto{
    
    private $produtoid;
    private $nome;
    private $descricao; 
    private $foto;

    public function __construct($produtoid, $nome, $descricao, $foto)
    {
        $this->produtoid   =$produtoid;
        $this->nome        =$nome;
        $this->descricao   =$descricao;
        $this->foto        =$foto;
    }

    public function getProdutoid() { return $this->produtoid; }
    public function setProdutoid($produtoid) {$this->produtoid = $produtoid;}
    
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) {$this->descricao = $descricao;}


    public function getFoto() { return $this->foto; }
    public function setFoto($foto) {$this->foto = $foto;}

}