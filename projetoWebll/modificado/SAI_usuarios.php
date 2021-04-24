<?php
// layout do cabeçalho

include "verifica.php";

$page_title = "Demo : Listagem de Usuários";

include_once "layout_header.php";
include_once "fachada.php";

echo "<section>";

// procura usuários

$dao = $factory->getUsuarioDao();
$usuarios = $dao->buscaTodos();

// display the products if there are any
if($usuarios) {
 
	echo "<table class='table table-hover table-responsive table-bordered'>";
	echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Login</th>";
		echo "<th>Nome</th>";
	echo "</tr>";

	foreach ($usuarios as $usuario) {

		echo "<tr>";
			echo "<td>{$usuario->getId()}</td>";
			echo "<td>{$usuario->getLogin()}</td>";
			echo "<td>{$usuario->getNome()}</td>";
			echo "<td>";
				// botão para mostrar um usuário
				echo "<a href='mostra_usuario.php?id={$usuario->getId()}' class='btn btn-primary left-margin'>";
					echo "<span class='glyphicon glyphicon-list'></span> Mostra";
				echo "</a>";
				// botão para alterar um usuário
				echo "<a href='modifica_usuario.php?id={$usuario->getId()}' class='btn btn-info left-margin'>";
				echo "<span class='glyphicon glyphicon-edit'></span> Altera";
				echo "</a>";
				// botão para remover um usuário
				echo "<a href='remove_usuario.php?id={$usuario->getId()}' class='btn btn-danger left-margin'";
				echo "onclick=\"return confirm('Tem certeza que quer excluir?')\">";
				echo "<span class='glyphicon glyphicon-remove'></span> Exclui";
				echo "</a>";
			echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
}
 
echo "<a href='novo_usuario.php' class='btn btn-primary left-margin'>";
echo "Novo";
echo "</a>";

echo "</section>";

// layout do rodapé
include_once "layout_footer.php";
?>

