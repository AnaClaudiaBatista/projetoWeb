<?php
class Usuario {
    
    private $usuarioid;
    private $login;
    private $senha;
    private $nome;

    public function __construct( $usuarioid, $login, $senha, $nome)
    {
        $this->usuarioid=$usuarioid;
        $this->login=$login;
        $this->senha=$senha;
        $this->nome=$nome;
    }

    public function getUsuarioid() { return $this->usuarioid; }
    public function setUsuarioid($usuarioid) {$this->usuarioid = $usuarioid;}

    public function getLogin() { return $this->login; }
    public function setLogin($login) {$this->login = $login;}

    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getSenha() { return $this->senha; }
    public function setSenha($senha) {$this->senha = $senha;}
}
