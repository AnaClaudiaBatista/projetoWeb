<?php
$page_title = "Demo : Autenticação Obrigatória";

// layout do cabeçalho
include_once "home/teste_layout_header.php";

/* API Lucas*/
require "";

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':

        $Pedidos;

        if (empty($_GET["IdPedido"]))
        {
            $idPedido= $_GET["idPedido"];
            $Pedidos= $db->Pedido()->getTodosJSON(["idPedido" => $idPedido]);
        }
        else
        {
            $Pedidos = $db->Pedido()->getTodosJSON();
        }

        echo $Pedidos;

        http_response_code(200);

        break;

        default:
            http_response_code(405);
            break;

    }

?>

<div>
<p>Teste</p>
</div>