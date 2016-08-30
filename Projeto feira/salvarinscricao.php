<?php
	$nome = $_POST['nome'];
	$codigo=  $_POST['meucodigo'];
	$turma = $_POST['turma'];
	$opcao1 = $_POST['opcao1'];
	$opcao2 = $_POST['opcao2'];
	

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	
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
	
	/*Quantidade de vagas no centro 1*/
	$comandosql = "SELECT  quantidade_vagas FROM tb_centro_interesse WHERE id_centro_interesse = ".$opcao1;
	$resultado = mysql_query($comandosql);
	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	
	
	
	$itembancodados = mysql_fetch_array($resultado);
	
	 
	
	$qtdevagas1 = $itembancodados['quantidade_vagas'];
	
	
	
	
	/*Quantidade de vagas no centro 2*/
	$comandosql = "SELECT  quantidade_vagas FROM tb_centro_interesse WHERE id_centro_interesse = ".$opcao2;
	$resultado = mysql_query($comandosql);
	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	
	
	
	$itembancodados = mysql_fetch_array($resultado);
	
	
	
	$qtdevagas2 = $itembancodados['quantidade_vagas'];
	
	
	//Buscar a Quantidade de vagas do centro 1
	
	
	//Buscar a Quantidade de vagas do centro 2
	
	
	
	
	//Buscar a Quantidade de inscritos do centro 1
	
	$comandosql = "SELECT count(*) as total FROM tb_inscricao WHERE opcao_um=".$opcao1;
	
	$resultado = mysql_query($comandosql);
	
	$itembancodados = mysql_fetch_assoc($resultado);
	
	
	
	$qtdeinscritosc1 = $itembancodados['total'];
	
	echo "Quantidade de inscritos centro 1= " . $qtdeinscritosc1;
	echo "<br><br>" ;
	
	
	
	//Buscar a Quantidade de inscritos do centro 2
	
	$comandosql = "SELECT count(*) as total FROM tb_inscricao WHERE opcao_dois=".$opcao2;
	
	$resultado = mysql_query($comandosql);
	
	$itembancodados = mysql_fetch_assoc($resultado);
	
	
	
	$qtdeinscritosc2 = $itembancodados['total'];
	
	echo "Quantidade de inscritos centro 2= " . $qtdeinscritosc2;
	echo "<br><br>" ;
	
	/*configurco de enderecmento do bnco de ddos*/
	
	
	
	$comandosql = "INSERT INTO tb_inscricao VALUES ('','$codigo', '$nome', '$turma', '$opcao1','$opcao2', '2016-08-24', '07:10:00')";
	
	 $comandosql;
	
	$resultado = mysql_query($comandosql);
	/*Encerra a conexao*/
	
	if (mysql_errno()) { 
	  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>"; 
	  echo $error; 
	} 
	
	mysql_close();
?>