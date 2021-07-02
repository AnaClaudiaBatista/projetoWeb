<?php
class Cliente{

    private $clienteid;
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $tipo_usuario;
    private $num_cartaocredito;
    private $cvv_cartaocredito;
    private $titular_cartaocredito;
    private $vencimento_cartaocredito;
    private $usuarioid;





    public function __construct($clienteid, $nome, $email, $telefone, $cpf,  $tipo_usuario, $num_cartaocredito, $cvv_cartaocredito, $titular_cartaocredito, $vencimento_cartaocredito, $usuarioid)
    {
        $this->clienteid                 = $clienteid;
        $this->nome                      =$nome;
        $this->email                     =$email;
        $this->telefone                  =$telefone;
        $this->cpf                       =$cpf;
        $this->tipo_usuario              =$tipo_usuario;
        $this->num_cartaocredito         =$num_cartaocredito;
        $this->cvv_cartaocredito         =$cvv_cartaocredito;
        $this->titular_cartaocredito     =$titular_cartaocredito;
        $this->vencimento_cartaocredito  =$vencimento_cartaocredito;
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
    
    public function getTipo_usuario() { return $this->tipo_usuario; }
    public function setTipo_usuario($tipo_usuario) {$this->tipo_usuario = $tipo_usuario;}

    public function getNum_cartaocredito() { return $this->num_cartaocredito; }
    public function setNum_cartaocredito($num_cartaocredito) {$this->num_cartaocredito = $num_cartaocredito;}
    
    public function getCvv_cartaocredito() { return $this->cvv_cartaocredito; }
    public function setCvv_cartaocredito($cvv_cartaocredito) {$cvv_cartaocredito->cvv_cartaocredito = $cvv_cartaocredito;}

    public function getTitular_cartaocredito() { return $this->titular_cartaocredito; }
    public function setTitular_cartaocredito($titular_cartaocredito) {$this->titular_cartaocredito = $titular_cartaocredito;}

    public function getVencimento_cartaocredito() { return $this->vencimento_cartaocredito; }
    public function setVencimento_cartaocredito($vencimento_cartaocredito) {$this->vencimento_cartaocredito = $vencimento_cartaocredito;}

    public function getUsuarioid() { return $this->usuarioid; }
    public function setUsuarioid($usuarioid) {$this->usuarioid = $usuarioid;}




}
