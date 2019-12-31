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
      <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>
      <link rel="stylesheet" href="./css/estilo.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style>
        .tabs .tab a{
          color:#9fa8da !important;
          } /*Black color to the text*/

          .tabs .tab a:hover {
            background-color:#e8eaf6 !important;
            color:#1a237e !important;
            } /*Text color on hover*/

            .tabs .tab a.active {
              background-color:#9fa8da !important;
              color:#1a237e  !important;
              } /*Background and text color when a tab is active*/

              .tabs .indicator {
                background-color:#9fa8da !important;
                } /*Color of underline*/
                .collapsible-body{
                  padding: 0px !important;
                }
              </style>
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

             <div class="col s12" style="padding: 0px !important;">
              <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#test1">Turmas</a></li>
                <li class="tab col s3"><a href="#test2">Avaliações</a></li>
              </ul>
            </div>
            <div id="test1" class="col s12" style="padding: 0px !important;">
              <!-- Collapsible -->
              <ul class="collapsible" style="margin: 0px !important; padding: 0px">
                <?php
                $idUser = $_SESSION['id'];
                $sql2 = "SELECT * FROM gerenciarturmas WHERE fk_usuario = $idUser GROUP BY fk_turma";
                $q2 = mysqli_query($con,$sql2);
                while ($conteudo = mysqli_fetch_assoc($q2)) {

                  $idTurma = $conteudo['fk_turma'];
                  $sql4 = "SELECT * FROM turmas WHERE id = $idTurma";
                  $q4 = mysqli_query($con,$sql4);
                  $conteudoTurma = mysqli_fetch_assoc($q4);
                  $nomeTurma = $conteudoTurma['nome'];

                  ?>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">import_contacts</i><?php echo "$nomeTurma"; ?></div>
                    <div class="collapsible-body" style="padding: 0px !important;"><span>
                      <ul class="collection">

                        <?php 
                        $sql5 = "SELECT * from usuarios WHERE turma = $idTurma";
                        $q5 = mysqli_query($con,$sql5);
                        while ($linha = mysqli_fetch_assoc($q5)) {
                          $nomeUsuarios = $linha['nome'];
                          $tipo = $linha['tipo'];
                          if ($tipo == 0) {

                            ?>
                            <li class="collection-item"><?php echo "$nomeUsuarios"; ?></li>
                            <?php                               
                          }} ?>
                        </ul>
                      </span></div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <div id="test2" class="col s12">

               <!-- Collapsible -->
               <ul class="collapsible" style="margin: 0px !important; padding: 0px">
                <?php
                $sql2 = "SELECT * FROM gerenciarturmas WHERE fk_usuario = $idUser GROUP BY fk_turma";
                $q2 = mysqli_query($con,$sql2);
                while ($conteudo = mysqli_fetch_assoc($q2)) {

                  $idTurma = $conteudo['fk_turma'];
                  $idMateria = $conteudo['fk_materia'];
                  $sql4 = "SELECT * FROM turmas WHERE id = $idTurma";
                  $q4 = mysqli_query($con,$sql4);
                  $conteudoTurma = mysqli_fetch_assoc($q4);
                  $nomeTurma = $conteudoTurma['nome'];

                  ?>
                  <li>
                    <div class="collapsible-header"><i class="material-icons">import_contacts</i><?php echo "$nomeTurma"; ?></div>
                    <div class="collapsible-body" style="padding: 0px !important;"><span>
                      <ul class="collection">
                        <?php 
                        $sql14 = "SELECT * FROM avaliacoes WHERE fk_turma = $idTurma and fk_professor = $idUser";
                        $q14 = mysqli_query($con,$sql14);
                        while($contAvaliacoes = mysqli_fetch_assoc($q14)){
                          $nomeAvaliacao = $contAvaliacoes['nome'];
                          $idAvaliacao = $contAvaliacoes['id'];
                          ?>
                          <li class="collection-item"><a class="modal-trigger" href="./postarAvaliacao.php?idTurma=<?php echo $idTurma; ?>&idMateria=<?php echo $idMateria;?>&idAvaliacao=<?php echo $idAvaliacao; ?>"><?php echo "$nomeAvaliacao"; ?></a>
                          </li>
                        <?php } ?>
                        <li class="collection-item"><a style="color: #d50000;" class="modal-trigger" href="#modal1">Criar Avaliação</a></li>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                          <div class="modal-content">
                            <h4>Criar avaliação</h4>
                            <div class="row">
                              <form action="./include/criarAvaliacao.php?idTurma=<?php echo $idTurma ?>&idMateria=<?php echo $idMateria ?>" method="POST">
                                <div class="input-field col s12">
                                  <input id="nomeAvaliacao" type="text" name="avaliacao" required="required">
                                  <label for="nomeAvaliacao">Nome da avaliação</label>
                                </div>
                                <div class="input-field col s12">
                                  <p>Trimestre</p>
                                  <p>
                                    <label>
                                      <input name="group1" value="1" type="radio" />
                                      <span>Primeiro</span>
                                    </label>
                                  </p>
                                  <p>
                                    <label>
                                      <input name="group1" value="2" type="radio" />
                                      <span>Segundo</span>
                                    </label>
                                  </p>
                                  <p>
                                    <label>
                                      <input name="group1" value="3" type="radio" />
                                      <span>Terceiro</span>
                                    </label>
                                  </p>
                                </div>
                              </div>
                              <input type="submit" value="Salvar" class="btn">
                            </form>
                          </div>
                          <div class="modal-footer">
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                          </div>
                        </div>
                      </ul>
                    <?php } ?>
                  </ul>
                </div>

              </div>

              <?php include 'include/footer.php';?>
              <!--JavaScript at end of body for optimized loading-->
              <script type="text/javascript" src="./js/materialize.min.js"></script>
              <script src="./js/js.js"></script>
              <script>
                M.AutoInit();
                document.addEventListener('DOMContentLoaded', function() {
                  var elems = document.querySelectorAll('.modal');
                  var instances = M.Modal.init(elems, options);
                });
              </script>
            </body>
            </html>
