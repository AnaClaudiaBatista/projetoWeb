<?php
interface ProdutoDao {

    public function insere($produto);
    //public function remove($produto);
    public function removePorId($produtoid);
    public function altera($produto);
    public function buscaPorId($produtoid);
    public function buscaTodos();
}
?>