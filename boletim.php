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

    <table class="striped centered responsive-table">
      <thead>
        <tr>
          <th>Materia</th>
          <th>Nota 1</th>
          <th>Falta</th>
          <th>Nota 2</th>
          <th>Falta</th>
          <th>Nota 3</th>
          <th>Falta</th>
          <th>Media</th>
        </tr>
      </thead>

      <tbody>
        <?php 
        $idTurma = $_SESSION['turma'];
        $sql = "SELECT * FROM gerenciarturmas WHERE fk_turma = $idTurma";
        $q1 = mysqli_query($con,$sql);
        while ($materias = mysqli_fetch_assoc($q1)) {
          // Nome materia
          $idMateria = $materias['fk_materia'];
          $sql3 = "SELECT * FROM materias WHERE id = $idMateria";
          $q3 = mysqli_query($con,$sql3);
          $conteudoMateria = mysqli_fetch_assoc($q3);
          $nomeMateria = $conteudoMateria['nome'];
          // Notas

          // 1ºTrimestre
          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 1";
          $q4 = mysqli_query($con,$sql4);
          $media1 = 0;
          $num= 0;
          while ($conteudo1Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo1Tri['nome'];
            $idAvaliacao = $conteudo1Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $rows = mysqli_num_rows($q5);
            if ($rows != 0) {
              $conteudoNota = mysqli_fetch_assoc($q5);
              $nota = $conteudoNota['nota'];
              $media1 += $nota;
              $num += 1;
            }
            if ($media1!= 0) {
              $media1 = $media1/$num;
            }
          }

          // 2º Trimestre
          
          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 2";
          $q4 = mysqli_query($con,$sql4);
          $media2 = 0;
          $num= 0;
          while ($conteudo2Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo2Tri['nome'];
            $idAvaliacao = $conteudo2Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $rows = mysqli_num_rows($q5);
            if ($rows != 0) {
              $conteudoNota = mysqli_fetch_assoc($q5);
              $nota = $conteudoNota['nota'];
              $media2 += $nota;
              $num += 1;
            }
            if ($media2!= 0) {
              $media2 = $media2/$num;
            }
          }

          // 3º Trimestre

          $sql4 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_materia = $idMateria and trimestre = 3";
          $q4 = mysqli_query($con,$sql4);
          $media3 = 0;
          $num= 0;
          while ($conteudo3Tri = mysqli_fetch_assoc($q4)) {
            $nomeAvaliacao = $conteudo3Tri['nome'];
            $idAvaliacao = $conteudo3Tri['id'];
            $sql5 = "SELECT * FROM notas WHERE fk_avaliacao = $idAvaliacao and fk_usuario = $idUser";
            $q5 = mysqli_query($con,$sql5);
            $rows = mysqli_num_rows($q5);
            if ($rows != 0) {
              $conteudoNota = mysqli_fetch_assoc($q5);
              $nota = $conteudoNota['nota'];
              $media3 += $nota;
              $num += 1;
            }
            if ($media3!= 0) {
              $media3 = $media3/$num;
            }
          }  

          $mediaTotal= round (($media1+$media2+$media3)/3,1);
          ?>
          <tr>
            <td><?php echo $nomeMateria; ?></td>
            <td><?php echo "$media1"; ?></td>
            <td>NULL</td>
            <td><?php echo "$media2"; ?></td>
            <td>NULL</td>
            <td><?php echo "$media3"; ?></td>
            <td>NULL</td>
            <td><?php echo "$mediaTotal"; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>


    <?php include 'include/footer.php';?>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/js.js"></script>
  </body>
  </html>
