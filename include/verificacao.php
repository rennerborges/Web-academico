  <?php 
  session_start();
  if (!isset($_SESSION['matricula'])) {
    header('Location: ./login.php');
  }
  if($_SESSION['tipo'] != 0){
    header('Location: ./admin/index.php');
  }

  $nome = $_SESSION['nome'];
  $matricula = $_SESSION['matricula'];
  ?>