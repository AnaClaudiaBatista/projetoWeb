<?php
class Fornecedor{
    
    private $fornecedorid;
    private $nome;
    private $cnpj; 
    private $descricao;
    private $telefone;
    private $email;
    public function __construct($fornecedorid, $nome, $cnpj,$descricao, $telefone, $email)
    {
        $this->fornecedorid=$fornecedorid;
        $this->nome=$nome;
        $this->cnpj=$cnpj;
        $this->descricao=$descricao;
        $this->telefone=$telefone;
        $this->email=$email;
        
    }

    public function getFornecedorid() { return $this->fornecedorid; }
    public function setFornecedorid($fornecedorid) {$this->fornecedorid = $fornecedorid;}
    
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getCnpj() { return $this->cnpj; }
    public function setCnpj($cnpj) {$this->cnpj = $cnpj;}

    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) {$this->descricao = $descricao;}

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) {$this->telefone = $telefone;}

    public function getEmail() { return $this->email; }
    public function setEmail($email) {$this->email = $email;}

    }
?>