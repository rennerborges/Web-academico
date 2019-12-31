<?php 
include './include/init.php';
$idTurma = $_GET['idTurma'];
$idMateria = $_GET['idMateria'];
$sql = "SELECT * FROM usuarios WHERE turma = $idTurma ORDER BY nome";
$q1 = mysqli_query($con,$sql);
$data = date("Y-m-d");
echo "$data";
while ($dadosUser = mysqli_fetch_assoc($q1)) {
	$idUser = $dadosUser['id'];
	$primeiroNome = $dadosUser['nome'];
	$name = "aluno".$idUser;

	$aluno = $_POST[$name];
	if ($aluno == NULL) {
		$aluno = 0;
	}
	$sql2 = "INSERT INTO faltas(fk_usuario,dia,faltas,fk_materia) VALUES ($idUser,'$data',$aluno,$idMateria)";
	$q2 = mysqli_query($con,$sql2);
	header('Location: ./diario.php');
}

?>