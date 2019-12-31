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
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/estilo.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body class="grey lighten-4">
    <?php include 'include/nav.php';
    include './include/identificacao.php';
    ?>
    
    <div class="container-fluid">
      <?php
        $idTurma = $_SESSION['turma'];
        $sql = "SELECT * FROM gerenciarturmas WHERE fk_turma = $idTurma";
        $q1 = mysqli_query($con,$sql);
        while ($materias = mysqli_fetch_assoc($q1)) {
          $idMateria = $materias['fk_materia'];
          $sql3 = "SELECT * FROM materias WHERE id = $idMateria";
          $q3 = mysqli_query($con,$sql3);
          $conteudoMateria = mysqli_fetch_assoc($q3);
          $nomeMateria = $conteudoMateria['nome'];

      ?>
      <!-- Conteudo da materia -->
      <p class="center " style="font-weight: bolder; font-size: 22px; color: #1a237e;"><?php echo "$nomeMateria"; ?></p>
      <div class="divider"></div>
      <p class="center" style="font-weight: bolder; color: #616161;">1º Trimestre</p>
      <div class="divider"></div>
      <table class="striped centered responsive-table">
       <thead>
        <tr>
          <th>Avaliações</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 1";
          $q4 = mysqli_query($con,$sql4);
          while ($conteudo1Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo1Tri['nome'];
            $idAvaliacao = $conteudo1Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $conteudoNota = mysqli_fetch_assoc($q5);
            $nota = $conteudoNota['nota'];
        ?>
        <tr>
          <td><?php echo "$nomeAvaliacao"; ?></td>
          <td><?php echo "$nota"; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <!-- 2º Trimestre -->
    <div class="divider"></div>
    <p class="center" style="font-weight: bolder;color: #616161;">2º Trimestre</p>
    <div class="divider"></div>
    <table class="striped centered responsive-table">
       <thead>
        <tr>
          <th>Avaliações</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 2";
          $q4 = mysqli_query($con,$sql4);
          while ($conteudo1Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo1Tri['nome'];
            $idAvaliacao = $conteudo1Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $conteudoNota = mysqli_fetch_assoc($q5);
            $nota = $conteudoNota['nota'];
        ?>
        <tr>
          <td><?php echo "$nomeAvaliacao"; ?></td>
          <td><?php echo "$nota"; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
    <!-- 3º Trimeste -->
    <div class="divider"></div>
    <p class="center" style="font-weight: bolder;color: #616161;">3º Trimestre</p>
    <div class="divider"></div>
    <table class="striped centered responsive-table">
       <thead>
        <tr>
          <th>Avaliações</th>
          <th>Notas</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 3";
          $q4 = mysqli_query($con,$sql4);
          while ($conteudo1Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo1Tri['nome'];
            $idAvaliacao = $conteudo1Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $conteudoNota = mysqli_fetch_assoc($q5);
            $nota = $conteudoNota['nota'];
        ?>
        <tr>
          <td><?php echo "$nomeAvaliacao"; ?></td>
          <td><?php echo "$nota"; ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <?php } ?>
</div>


<?php include 'include/footer.php';?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/js.js"></script>
</body>
</html>