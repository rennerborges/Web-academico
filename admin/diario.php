   <?php 
   include './include/init.php';
   include './include/verificacao.php';
   ?>
   <!DOCTYPE html>
   <html>
   <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../css/estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body class="grey lighten-4">
    <?php include 'include/nav.php';?>
    
    <ul class="collection" style="margin: 0px;">
      <!-- Apenas no mobile -->
      <li class="collection-item avatar hide-on-large-only">
        <i class="material-icons circle pink lighten-1">assignment_ind</i>
        <span class="title"><?php echo "$nome"; ?></span>
        <p>Matricula: <?php echo "$matricula"; ?><br>
         Turma: 3ºTI
       </p>
     </li>
     <ul class="collection" style="margin: 0px !important;">
       <?php 
       $idAdm = $_SESSION['id'];
       $sql = "SELECT * FROM gerenciarturmas WHERE fk_usuario = $idAdm";
       $q1 = mysqli_query($con,$sql);
       while ($linha = mysqli_fetch_assoc($q1)) {
        $idTurma = $linha['fk_turma'];
        $idMateria = $linha['fk_materia'];
        $sql2 = "SELECT * FROM turmas WHERE id = $idTurma";
        $q2 = mysqli_query($con,$sql2);
        $dado = mysqli_fetch_assoc($q2);
        $nomeTurma = $dado['nome'];
        $sql3 = "SELECT * FROM materias WHERE id = $idMateria";
        $q3 = mysqli_query($con,$sql3);
        $dadosMateria = mysqli_fetch_assoc($q3);
        $nomeMateria = $dadosMateria['nome'];
        ?>
        <li class="collection-item"><a href="./faltas.php?idTurma=<?php echo $idTurma;?>&idMateria=<?php echo $idMateria; ?>"><?php echo("$nomeTurma - $nomeMateria") ?></a></li>
    <?php } ?>
    </ul>
    <?php include 'include/footer.php';?>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/js.js"></script>
  </body>
  </html>
