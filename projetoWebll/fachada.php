<?php

include_once('model/Usuario.php');
include_once('dao/UsuarioDao.php');

include_once('model/Cliente.php');
include_once('dao/ClienteDao.php');

include_once('model/Fornecedor.php');
include_once('dao/FornecedorDao.php');

include_once('model/Produto.php');
include_once('dao/ProdutoDao.php');

include_once('model/Estoque.php');
//include_once('dao/MySqlEstoque.php');

include_once('model/Pedido.php');
include_once('dao/PedidoDao.php');

include_once('dao/DaoFactory.php');
include_once('dao/MySqlDaoFactory.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$factory = new MySqlDaofactory();

?>