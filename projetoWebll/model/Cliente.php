<?php
class Cliente{

    private $clienteid;
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $num_cartaocredito;
    private $usuarioid;





    public function __construct($clienteid, $nome, $email, $telefone, $cpf, $num_cartaocredito,  $usuarioid)
    {
        $this->clienteid                 = $clienteid;
        $this->nome                      =$nome;
        $this->email                     =$email;
        $this->telefone                  =$telefone;
        $this->cpf                       =$cpf;
        $this->num_cartaocredito         =$num_cartaocredito;       
        $this->usuarioid                 =$usuarioid;


    }

    public function getClienteid() { return $this->clienteid; }
    public function setClienteid($clienteid) {$this->clienteid = $clienteid;}   

    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getEmail() { return $this->email; }
    public function setEmail($email) {$this->email = $email;}

    public function getTelefone() { return $this->telefone; }
    public function setTelefone($telefone) {$this->telefone = $telefone;}

    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) {$this->cpf = $cpf;}
    
    public function getNum_cartaocredito() { return $this->num_cartaocredito; }
    public function setNum_cartaocredito($num_cartaocredito) {$this->num_cartaocredito = $num_cartaocredito;}
    
    public function getUsuarioid() { return $this->usuarioid; }
    public function setUsuarioid($usuarioid) {$this->usuarioid = $usuarioid;}




}
