<?php
include_once "../fachada.php";
$arquivo = $_FILES['arquivo']['name'];

//Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'projetoWebll/foto/';

//Tamanho máximo do arquivo em Bytes
$_UP ['tamanho'] = 1024*1024*100; //5mb

//Array com a extensoes permitidas
$_UP ['extensoes'] = array ('pgn', 'jpg', 'jpeg', 'gif');

//Renomear
$_UP['renomeia'] = false;

//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o uploar do arquivo';

//Verifica se houve agum erro com o uploar, Se sim exibe a mensagem de erro
if ($_FILES ['arquivo']['error'] != 0){
    die ("Não foi possivel fazer o uploar, erro <br />" . $_UP['erros']{$_FILES['arquivo']['error']});
    exit; // Para a execucao do script
}

//Faz a verificacao da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if(array_search($extensao, $_UP['extensoes']) === false){
    echo "<META HTTP-EQUIV-REFRESH CONTENT = '0, HRL=ocalhost/projetoWeb/projetoWebll/produto/cadastroProduto.php'>
    <script type \"text/javascript\">
    alert(\A imagem nao foi cadastrada, por favor envie os arquivo com as seguintes extencoes: png, jpeg, jpg e git.
    As informacoes foram cadastradas.\");
    </script>";
}





?>
