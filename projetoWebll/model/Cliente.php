<?php
class Cliente{
    
    private $clienteid;
    private $nome;
    private $cpf; 
    private $telefone;
    private $email;
    private $cartaocredito;

    public function __construct($clienteid, $nome, $cpf, $telefone, $email, $cartaocredito)
    {
        $this->clienteid=$clienteid;
        $this->nome=$nome;
        $this->cpf=$cpf;
        $this->telefone=$telefone;
        $this->email=$email;
        $this->cartaocredito=$cartaocredito;
    }

    public function getClienteid() { return $this->clienteid; }
    public function setClienteid($clienteid) {$this->clienteid = $clienteid;}
    
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) {$this->cpf = $cpf;}

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) {$this->telefone = $telefone;}

    public function getEmail() { return $this->email; }
    public function setEmail($email) {$this->email = $email;}

    public function getCartaocredito() { return $this->cartaocredito; }
    public function setCartaocredito($cartaocredito) {$this->cartaocredito = $cartaocredito;}
}
?>