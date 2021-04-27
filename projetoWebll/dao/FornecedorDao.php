<?php
interface FornecedorDao {

    public function insere($fornecedor);
    //public function remove($fornecedor);
    public function removePorId($fornecedorid);
    public function altera($fornecedor);
    public function buscaPorId($fornecedorid);
    public function buscaTodos();
}
?>