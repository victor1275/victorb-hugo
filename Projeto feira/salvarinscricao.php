<?php
	
	
	$podeinserir=true;
	$codigoaceito=true;
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
		 "<h1>Conectou</h1>";
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
	$comandosql = "SELECT count(*) as total FROM tb_inscricao WHERE opcao_um=".$opcao1;
	$resultado = mysql_query($comandosql);
	$itembancodados = mysql_fetch_assoc($resultado);
	$qtdeinscritosc1 = $itembancodados['total'];
	
	if ($qtdeinscritosc1 >= $qtdevagas1){
		echo "<h1>Não existem vagas na sua primeira opção, tente novamente</h1>";
		echo "<a href='inscricao.html'>Clique aqui para voltar</a>";
		$podeinserir=false;
	} 
		
	/*Quantidade de vagas no centro 2*/
	$comandosql = "SELECT  quantidade_vagas FROM tb_centro_interesse WHERE id_centro_interesse = ".$opcao2;
	$resultado = mysql_query($comandosql);
	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	$itembancodados = mysql_fetch_array($resultado);
	$qtdevagas2 = $itembancodados['quantidade_vagas'];
	
	$comandosql = "SELECT count(*) as total FROM tb_inscricao WHERE opcao_dois=".$opcao2;
	$resultado = mysql_query($comandosql);
	

	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	$itembancodados = mysql_fetch_assoc($resultado);
	$qtdeinscritosc2 = $itembancodados['total'];
	
	
	if ($qtdeinscritosc2 >= $qtdevagas2){
		echo "<h1>Não existem vagas na sua segunda opção, tente novamente</h1>";
		echo "<a href='inscricao.html'>Clique aqui para voltar</a>";
		$podeinserir=false;
	}
	
	/*verifique o codigo do aluno*/
	$comandosql = "SELECT código_aluno FROM tb_inscricao WHERE código_aluno = ".$codigo;
	$resultado = mysql_query($comandosql);
	
	if (mysql_errno()) {
		$error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>";
		echo $error;
	}
	$itembancodados = mysql_fetch_array($resultado);
	$codigodatabela = $itembancodados['código_aluno'];
	
	$comandosql = "SELECT count(*) as total FROM tb_inscricao WHERE código_aluno=".$codigo;
	$resultado = mysql_query($comandosql);
	$itembancodados = mysql_fetch_assoc($resultado);
	$codigodoaluno = $itembancodados['total'];

	if ($codigodoaluno = $codigodoaluno){
		echo "<h1>Esse código do aluno ja esta cadastrado, tente novamente</h1>";
		echo "<a href='inscricao.html'>Clique aqui para voltar</a>";
		$codigoaceito=false;
	}
	
	
	
	if($podeinserir){	

		$comandosql = "INSERT INTO tb_inscricao VALUES ('','$codigo', '$nome', '$turma', '$opcao1','$opcao2', '2016-08-24', '07:10:00')";		
		 $comandosql;
		
		$resultado = mysql_query($comandosql);
		/*Encerra a conexao*/
		
		if (mysql_errno()) { 
		  $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>Quando executou:<br>\n$comandosql\n<br>"; 
		  echo $error; 
		}else{
			echo "<h1>Cadastro Realizado com sucesso</h1>";
			echo "<a href='inscricao.html'>Clique aqui para realizar uma nova inscricao</a>";
		}
	}
	mysql_close();
?>