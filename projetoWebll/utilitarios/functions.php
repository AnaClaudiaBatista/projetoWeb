<?php
    function utf8ize($d)
    { 
        if (is_array($d) || is_object($d))
            foreach ($d as &$v) $v = utf8ize($v);
        else
            return utf8_encode($d);
    
        return $d;
    }

    function clearSessionCarrinho()
    {
        $_SESSION['produtos_quantidade'] = null;
        $_SESSION['produtos_carrinho'] = null;
    }

    function returnInfoUsuarioLogado()
    {
        $info = array();
        $usuario_logado = null;
        $nome_usuario = "";
        $action_url = "";

        if(isset($_SESSION['usuario_logado']))
        {
            $usuario_logado = $_SESSION['usuario_logado'];
            $nome_usuario = $usuario_logado->getNome();
            $action_url = "criarPedido.php";
        }
        else{
            $nome_usuario = "VISITANTE";
            $action_url   = "indexLogin.php";
        }

        $info[] = [
            'usuario_logado' => $usuario_logado, 
            'nome_usuario' => $nome_usuario,
            'action_url' => $action_url
        ];
       
        return $info;
    }
?>