<?php
interface PedidoDao {

    public function insere($pedido);
    public function removePorId($pedidoid);
    public function altera($pedido);
    public function buscaPorId($pedidoid);
    public function buscaTodos();
}
?>