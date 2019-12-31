     <?php 
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

              <div class="fixed-action-btn">
                <a class="btn-floating btn-large red">
                  <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                  <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                  <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                  <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                  <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                </ul>
              </div>
              
              <ul class="collection" style="margin: 0px;">
                <!-- Apenas no mobile -->
                <li class="collection-item avatar hide-on-large-only">
                  <i class="material-icons circle pink lighten-1">assignment_ind</i>
                  <span class="title"<?php echo "$nome"; ?></span>
                  <p>Matricula: <?php echo "$matricula"; ?><br>
                   Turma: 3ºTI
                 </p>
               </li>
             </ul>

             <div class="col s12" style="padding: 0px !important;">
              <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#test1">Aluno</a></li>
                <li class="tab col s3"><a href="#test2">Professores</a></li>
                <li class="tab col s3"><a href="#test3">Turmas</a></li>
                <li class="tab col s3"><a href="#test4">Materia</a></li>
              </ul>
            </div>
            <div id="test1" class="col s12" style="padding: 0px !important;">
              <form class="col s12" method="POST" action="./include/alunoCadastro.php">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nome" type="text" name="nome">
                    <label for="nome">Nome</label>
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="text" name="matricula">
                    <label for="icon_prefix">Matricula</label>
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input id="turma" type="text" name="turma">
                    <label for="turma">Turma</label>
                  </div>
                </div>
                <input type="submit" class="btn indigo darken-3" value="Cadastrar" style="margin-bottom: 3%;">
              </form>
            </div>
            <div id="test2" class="col s12">
               <form class="col s12" method="POST" action="./include/professorCadastro.php">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nomeProfessor" type="text" name="nome">
                    <label for="nomeProfessor">Nome do professor</label>
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="matriculaProfessor" type="text" name="matricula">
                    <label for="matriculaProfessor">Matricula do professor</label>
                  </div>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input id="materia" type="text" name="materia">
                    <label for="materia">Materia</label>
                  </div>
                </div>
                <input type="submit" class="btn indigo darken-3" value="Cadastrar" style="margin-bottom: 3%;">
              </form>
            </div>
            <div id="test3" class="col s12">
               <form class="col s12" method="POST" action="./include/turmaCadastro.php">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nomeTurma" type="text" name="nomeTurma">
                    <label for="nomeTurma">Nome da Turma</label>
                  </div>
                </div>
                <input type="submit" class="btn indigo darken-3" value="Cadastrar" style="margin-bottom: 3%;">
              </form>
            </div>
             <div id="test4" class="col s12">
               <form class="col s12" method="POST" action="./include/materiaCadastro.php">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="nomeMateria" type="text" name="materia">
                    <label for="nomeMateria">Nome da materia</label>
                  </div>
                </div>
                <input type="submit" class="btn indigo darken-3" value="Cadastrar" style="margin-bottom: 3%;">
              </form>
            </div>

            <?php include 'include/footer.php';?>
            <!--JavaScript at end of body for optimized loading-->
            <script type="text/javascript" src="./js/materialize.min.js"></script>
            <script src="./js/js.js"></script>
          </body>
          </html>
