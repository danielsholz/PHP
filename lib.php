<?php
function conecta()
{
	$banco 		= "fatec";
	$usuario 	= "root";
	$senha 		= "";
	$hostname	= "localhost";
	
		$mysqli = new mysqli($hostname, $usuario, $senha, $banco);
		if ($mysqli -> connect_errno)
		{
			printf("Connect failed: %s\n",$mysqli->connect_error);
			exit;
		}

		return $mysqli;
}

$mysqli = conecta();
$sql	= " INSERT INTO produto
			(id, nome, preco, estoque)
			values
			(null, 'Manopla Lotse', '104.99','10')";	
$mysqli -> query($sql);
$sql 	= "SELECT  * FROM produto ORDER BY nome";
if (!$resultado = $mysqli ->query($sql)){

	echo  "Erro de SQL: " .$sql. "\n";
	echo  "Errno: " .$mysqli-> errno  .
		  " - Errno: " .$mysqli -> error . "\n";
	exit;

}

echo "Produtos cadastrados <hr>";
while ($linha=$resultado -> fetch_array(MYSQLI_ASSOC))

{

	$codigo		= $linha["id"];
	$nome		= $linha["nome"];
	$preco		= $linha["preco"];
	$estoque	= $linha["estoque"];

	echo "Código: 	$codigo |
		  Nome:  	$nome | 
		  Preco 	$preco |
		  Estoque 	$estoque  <hr>";
}



?>