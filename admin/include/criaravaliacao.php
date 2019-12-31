<?php 
	include './init.php';
	$idMateria = $_GET['idMateria'];
	$idTurma = $_GET['idTurma'];
	$avaliacao = $_POST['avaliacao'];
	$trimestre = $_POST['group1'];
	$data = date("Y-m-d");
	session_start();
	$idUser = $_SESSION['id'];

	$sql = "INSERT INTO avaliacoes (fk_materia,fk_turma,nome,data,trimestre,fk_professor) VALUES ($idMateria,$idTurma,'$avaliacao','$data',$trimestre, $idUser)";
	$q = mysqli_query($con,$sql);
	header('Location: ../gerenciar.php');
?>