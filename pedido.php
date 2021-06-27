<?php

// REST

/* API Lucas*/
require "DaoFactory.php";

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
    // Busca todos os pedidos 
        $Pedidos;
        if (!empty($_GET["numero"]))
        {
            $numero= $_GET["numero"];
            $Pedidos= $db->Pedido()->getTodosJSON(["numero" => $numero]);
        }
        else // Busca um pedido
        {
            $Pedidos = $db->Pedido()->getTodosJSON();
        }

        echo $Pedidos;

        http_response_code(200);

        break;

        default:
            http_response_code(404);
            break;


    }

?>