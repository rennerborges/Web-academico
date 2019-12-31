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

    <ul class="collection" style="margin: 0px;">
     <li class="collection-item avatar" onclick="boletim()">
      <i class="material-icons circle amber">insert_chart</i>
      <span class="title">Boletim</span>
      <p>Medias<br>
       Faltas
     </p>
   </li>
   <li class="collection-item avatar" onclick="diario()">
    <i class="material-icons circle purple">import_contacts</i>
    <span class="title">Diario</span>
    <p>Avavaliações<br>
     Notas
   </p>
 </li>
 <li class="collection-item avatar">
  <i class="material-icons circle green">face</i>
  <span class="title">Informações do usuario</span>
  <p>Nome<br>
   Matricula
 </p>
</li>
<li class="collection-item avatar">
  <i class="material-icons circle red">create</i>
  <span class="title">Mudar informações pessoais</span>
  <p>Mudar senha<br>
   Corrigir nome
 </p>
</li>
</ul>

<?php include 'include/footer.php';?>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/js.js"></script>
<script>
  function boletim(){
    window.location.href = "./boletim.php"; 
  }
  function diario(){
    window.location.href = "./diario.php"; 
  }
</script>
</body>
</html>
