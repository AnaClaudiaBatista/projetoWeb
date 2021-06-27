<?php
class Pedido {
    
    private $numero;
    private $dataPedido;
    private $dataEntregue;
    private $situacao;

    public function __construct( $numero, $dataPedido, $dataEntregue, $situacao)
    {
        $this->numero=$numero;
        $this->dataPedido=$dataPedido;
        $this->dataEntregue=$dataEntregue;
        $this->situacao=$situacao;
    }

    public function getNumero() { return $this->numero; }
    public function setNumero($numero) { $this->numero = $numero; }

    public function getDataPedido() { return $this->dataPedido; }
    public function setDataPedido($dataPedido) {$this->dataPedido = $dataPedido;}

    public function getDataEntregue() { return $this->dataEntregue; }
    public function setEntregue($dataEntregue) {$this->dataEntregue = $dataEntregue;}

    public function getSituacao() { return $this->situacao; }
    public function setSituacao($situacao) {$this->situacao = $situacao;}
}
