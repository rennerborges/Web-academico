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
    <?php include 'include/navLogin.php';?>
    <div class="container-fluid">
      <div class="row" style="margin-bottom: 3.5%;">
        <div class="col s2"></div>
        <div class="col s8 white z-depth-1" style="margin-top: 3.6%; border-radius: 5px;">

          <form class="col s12" method="POST" action="./include/login.php">
            <div class="row">
              <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="matricula" type="text" name="matricula">
                <label for="matricula">Matricula</label>
              </div>
              <div class="input-field col s12">
                <i class="material-icons prefix">lock</i>
                <input id="senha" type="password" name="senha">
                <label for="senha">Senha</label>
              </div>

            </div>
            <input type="submit" class="btn indigo darken-3" value="Login" style="margin-bottom: 3%;">
          </form>


        </div>
        <div class="col s2"></div>
      </div>
    </div>
    <?php include 'include/footer.php';?>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/js.js"></script>
  </body>
  </html>
