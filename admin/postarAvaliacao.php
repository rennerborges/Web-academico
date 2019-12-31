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
    </ul>
    <?php 
      $idTurma = $_GET['idTurma'];
      $idMateria = $_GET['idMateria'];
      $idAvaliacao = $_GET['idAvaliacao'];
    ?>
    <form action="./avaliacao.php?idAvaliacao=<?php echo $idAvaliacao;?>&idTurma=<?php echo $idTurma?>" method="POST">
    <?php 
      $sql = "SELECT * FROM usuarios WHERE turma = $idTurma ORDER BY nome";
      $q1 = mysqli_query($con,$sql);
      while ($dadosUser = mysqli_fetch_assoc($q1)) {
      $idUser = $dadosUser['id'];
      $primeiroNome = $dadosUser['nome'];
      $name = "aluno"."$idUser";
    ?>
    <label><?php echo "$primeiroNome"; ?><input type="text" required="required" name="<?php echo $name;?>"></label>
  <?php } ?>
  <input type="submit" class="btn" value="Enviar" style="margin-left: 1.5%; margin-bottom: 0.8%; background-color: #1a237e;">
  </form>
    <?php include 'include/footer.php';?>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script src="../js/js.js"></script>
  </body>
  </html>
