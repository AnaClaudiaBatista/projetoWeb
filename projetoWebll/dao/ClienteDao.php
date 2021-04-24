<?php
interface ClienteDao {

    public function insere($cliente);
    //public function remove($cliente);
    public function removePorId($id);
    public function altera(&$cliente);
    public function buscaPorId($id);
    public function buscaTodos();
}
?>