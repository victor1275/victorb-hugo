<?php
	echo "GET:" . var_dump($_GET) . "<br>";
	echo "POST:" . var_dump($_POST) . "<br>";
	$nome = $_POST['nome'];
	$codigo=  $_POST['codigodoaluno'];
	$turma=  $_POST['codigoturma'];
	$opcao1 = $_POST['opcao1'];
	$opcao2 = $_POST['opcao2'];	
	
	/*configuraçao de endereçamento do banco de dados*/
	$servidor="localhost";
	$usuario ="root";
	$senha ="";
	
	
	/*configurco de cesso o bnco de ddos*/
	$nome_banco = "bd_centro_interesse";
	
	$conexao = mysql_connect($servidor, $usuario, $senha);
	
	/*verifica se a conexao realmente foi criada*/
	/*se (nao conexao) entao, ou seja, conexao e falsa*/
	if (!$conexao) {
		echo "Não foi possível connectar ao servidor";
		exit;
	}else{/*senao*/
		echo "<h1>Conectou!</h1>";
	}
	
	/*Selecione o banco de dados ou morra*/
	$banco = mysql_select_db($nome_banco, $conexao) or die ("Não foi possível conectar ao banco de dados");
	
	$comandosql = "INSERT INTO tb_inscricao VALUES ('','$nome','$codigo','$turma','$opcao1','$opcao2', '2016-08-24', '07:10:00')";
	
	echo $comandosql;
	
	$resultado = mysql_query($comandosql);
	/*Encerra a conexao*/
	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	
	mysql_close();
	?>
  