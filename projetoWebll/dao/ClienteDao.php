<?php
interface ClienteDao {

    public function insere($cliente);
    //public function remove($cliente);
    public function removePorId($clienteid);
    public function altera(&$cliente);
    public function buscaPorId($clienteid);
    public function buscaTodos();
}
?>