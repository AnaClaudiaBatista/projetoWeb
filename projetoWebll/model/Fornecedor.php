<?php
class Fornecedor{
    
    private $fornecedorID;
    private $nome;
    private $cnpj; 
    private $descricao;
    private $telefone;
    private $email;
    public function __construct($fornecedorID, $nome, $cnpj,$descricao, $telefone, $email)
    {
        $this->fornecedorID=$fornecedorID;
        $this->nome=$nome;
        $this->cnpj=$cnpj;
        $this->descricao=$descricao;
        $this->telefone=$telefone;
        $this->email=$email;
        
    }

    public function getFornecedorID() { return $this->fornecedorID; }
    public function setFornecedorID($fornecedorID) {$this->fornecedorID = $fornecedorID;}
    
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