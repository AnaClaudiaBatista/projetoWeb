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

    public function getprodutoid() { return $this->produtoid; }
    public function setprodutoid($produtoid) {$this->produtoid = $produtoid;}
    
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getCpf() { return $this->descricao; }
    public function setCpf($descricao) {$this->descricao = $descricao;}

    public function getfoto() { return $this->foto; }
    public function setfoto($foto) {$this->foto = $foto;}

}