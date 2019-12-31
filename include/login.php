<?php 
	include'init.php';
	$matricula= ucwords($_POST['matricula']);
	$senha= ucwords(hash('sha256', $_POST['senha']));

	$sql1 = "SELECT * FROM usuarios WHERE matricula = '$matricula' and senha = '$senha'";
	$q2 = mysqli_query($con,$sql1);
	$conteudo = mysqli_fetch_assoc($q2);
	$row = mysqli_num_rows($q2);
	if ($row != 0) {
		session_start();
		$_SESSION['id'] = $conteudo['id'];
		$_SESSION['matricula'] = $matricula;
		$_SESSION['senha'] = $senha;
		$_SESSION['nome'] = $conteudo['nome'];
		$_SESSION['tipo'] = $conteudo['tipo'];
		$_SESSION['turma'] = $conteudo['turma'];
		if ($conteudo['tipo'] == 0) {
			header('Location: ../index.php');	
		}else
		header('Location: ../admin/index.php');
	}else{
		echo "Não foi possivel fazer o login";
	}


?>
