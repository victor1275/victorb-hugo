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
	
	$conexao = mysql_connect($servidor, $usuario, $senha);
	
	$banco = mysql_select_db($nome_banco,$conexao);
	
	/*verificar se a conexao realmente foi criada*/
	/*se (nao conexao) entao, ou seja,  conexao e falsa*/
	if (!$conexao) {
		echo "nao foi posivel conectar ao banco de dados mysql.";
		exit;
	}else{/*senao*/
	echo " conectou!";
	}
?>