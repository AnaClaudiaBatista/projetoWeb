<?php

include_once('model/Usuario.php');
include_once('dao/UsuarioDao.php');
include_once('model/Cliente.php');
include_once('dao/ClienteDao.php');
include_once('model/Fornecedor.php');
include_once('dao/ClienteDao.php');
include_once('model/Produto.php');
include_once('dao/ProdutoDao.php');

include_once('dao/DaoFactory.php');
include_once('dao/PostgresDaoFactory.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$factory = new PostgresDaofactory();

?>