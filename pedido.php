<?php
// API de consulta dos pedidos
// Métodos de acesso ao banco de dados 
require "src/fachada.php"; 

$dao = $factory->getPedidoDao();

$request_method=$_SERVER["REQUEST_METHOD"];

if(!empty($_GET['id']))
    {
        $id=intval($_GET["id"]);
        $pedidoJSON = $dao->buscaPedidoJSON($id);
        if($pedidoJSON!=null) {
            echo $pedidoJSON;
            http_response_code(200); // 200 OK
        } else {
            http_response_code(404); // 404 Not Found
        }
    } //Busca uma turma
    else
    {
        echo $dao->buscaPedidosJSON();
        http_response_code(200); // 200 OK
    }

?>