<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	
	
	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
  	<!-- our custom CSS -->
  	<link rel="stylesheet" href="libs/css/style.css" />
      <link rel="stylesheet" href="libs/css/2custom2.css" />
      <link rel="stylesheet" href="libs/css/1custom.css" />
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />

</head>

<body>
	<header>
		
		<div class="pull-right" id="login_info">
            <h2>Logo Aqui</h2>
		<?php	
		include_once "comum.php";
		
		if ( is_session_started() === FALSE ) {
			session_start();
		}	
		
		if(isset($_SESSION["nome_usuario"])) {
			// Informações de login
			echo "<span>Você está logado como " . $_SESSION["nome_usuario"];		
			echo "<a href='executa_logout.php'> Logout </a></span>";
		} else {
			echo "<span><a href='login.php'> Efetuar Login </a></span>";
		}
		?>	
		</div>
	</header>

