<?php 
	include './include/init.php';
	$idTurma = $_GET['idTurma'];
	$idAvaliacao = $_GET['idAvaliacao'];

	$sql = "SELECT * FROM usuarios WHERE turma = $idTurma ORDER BY nome";
	$q1 = mysqli_query($con,$sql);
	while ($dadosUser = mysqli_fetch_assoc($q1)) {
	$idUser = $dadosUser['id'];
	$primeiroNome = $dadosUser['nome'];
	$name = "aluno".$idUser;
	
	$nota = $_POST[$name];
	$sql2 = "INSERT INTO notas (fk_avaliacao,fk_usuario,nota) VALUES ($idAvaliacao,$idUser,'$nota')";
	$q2 = mysqli_query($con,$sql2);
	}
	header('Location: ./gerenciar.php');
?>