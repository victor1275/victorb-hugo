<?php
	echo "GET:" . var_dump($_GET) . "<br>";
	echo "POST:" . var_dump($_POST) . "<br>";
	echo "posicao nome" . $_POST['nome'];
	
	/*configura�ao de endere�amento do banco de dados*/
	$servidor="localhost";
	$usuario ="root";
	$senha ="";
	
	/*configura�ao do banco de dados*/
	$nome_banco= "bd_centro_interesse";
	
	$conexao = mysql_conect($servidor,$usuario,$senha);
	
	$banco = mysql_select_bd($_banco,$conexao);
?>