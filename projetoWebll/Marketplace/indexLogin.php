<?php
    include_once "../fachada.php";
    $isPedido = 0;
    $isLogin = 0;

    if(isset($_GET['isPedido']))
    {
        $isPedido = 1;
    }

    if(isset($_GET['isLogin']))
    {
        $isLogin = 1;
    }
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>

    <style>
        .box{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <!-- Custom fonts for this template-->
    <link href="../libs/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top:250px;">
        <div class="row">
            <h2 class="box">Login do Sistema</h2>
        </div>
        <br/>
        <form action="../executa_login.php" method="post">
            <div class="row box">
                <div class="col-2">
                    <input type="hidden" name="isPedido" value="<?php echo $isPedido; ?>"/>
                    <input type="hidden" name="isLogin" value="<?php echo $isLogin; ?>"/>
                    <input required name="login" type="text" class="form-control text-center" placeholder="Usuário">
                    <input required name="senha" type="password" class="form-control text-center" style="margin-top:10px;" placeholder="Usuário">
                    <button type="submit" class="btn btn-primary" style="margin-top:10px;">Entrar</button>
                    <a href="../cliente/cadastroCliente.php?isPedido=1" class="btn btn-warning" style="margin-top:10px;">Novo Usuário</a>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm-2" class="box">
                    
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../libs/vendor/jquery/jquery.min.js"></script>
    <script src="../libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/Marketplace/indexPedido.js"></script>

    


</body>
</html>