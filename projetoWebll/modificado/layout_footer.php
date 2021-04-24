<aside>
		<h2>Navegação</h2>
		<ul>
		<?php

		include_once "comum.php";
		
		if ( is_session_started() === FALSE ) {
			session_start();
		}	
		
        // Menu de navegação : mostra sempre

		echo "<li><a href='index.php'>Home</a></li>";

		if(isset($_SESSION["nome_usuario"])) {
			// Menu de navegação : só mostra se logado
			echo "<li>";
			echo "<a href='usuarios.php'>Usuários</a>";
			echo "</li>";
		} 
	    ?>
		</ul>
	</aside>

	<footer>
		<p>Este é o mini-website de demonstração do PHP : 2019 - Alexandre Krohn</p>
	</footer>

</body>

</html>