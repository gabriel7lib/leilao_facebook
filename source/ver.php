<?php
	require __DIR__ . '/Config/DB.php';
	require __DIR__ . '/lance.php';

	$banco = new \Source\Config\DB();

	/* Se os campos de entrada estiverem preenchidos, adicione uma linha à tabela Empregados. */
	$nome = 'Gabriel'; #htmlentities($_POST['nome']);
	$id_user_face = '1'; #htmlentities($_POST['id']);


	/* Connect to MySQL and select the database. */
	$connection = mysqli_connect($banco->servidor, $banco->user, $banco->senha);

	if (mysqli_connect_errno()){
		#echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$database = mysqli_select_db($connection, $banco->database);


	#consultar o último registro da tabela (último lance);
	$filtro = mysqli_query($connection, "SELECT * FROM users ORDER BY ID DESC LIMIT 1;");
	$print_data = mysqli_fetch_row($filtro);
	
	#Imprimir valores da primeira e segunda colunas.
	#echo $print_data[0]."\n".$print_data[1];

	/* Se os campos de entrada estiverem preenchidos, adicione uma linha à tabela Empregados. */
	#$nome = htmlentities($_POST['nome']);
	#$id_user_face = htmlentities($_POST['id']);


	if ((strlen($nome) || strlen($id_user_face)) AND $print_data[2] != $id_user_face) {
		AddUsuario($connection, $nome, $id_user_face);
	}else{
		#echo "O usuário ".$id_user_face." já está cadastrado = ".$print_data[2];
		echo '<script>$("#adicionar").remove()</script>';
	}

?>
