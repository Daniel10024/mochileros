<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];


?>

<?php if ($use == 1) {
  header("location: p1.php");
} ?>

<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver viajes</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">

    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">
</head>
<body class="h">
    <header>
        <div class="container">
          <div class="row">
  <div class="col-sm-12">
<ul class="nav nav-tabs">
  <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>

    <ul class="nav navbar-right">
      <li class="dropdown right">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown">
              <span class="glyphicon glyphicon-th-list glylg"></span> 
          </a>
          
          <ul class="dropdown-menu dropdown-menu-right">
              <li>
                  <div class="navbar-login">
                      <div class="row">
                          <div>
                              <p class="text-center">
                                  <span><img class="cardo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAg5kaJfBJTNlwuPx8r3b6aJ7hEJb5jW9mMXEvbnDdu9aIuiaz" alt="" /></span>
                              </p>
                          </div>
                          <div>
                              <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p2.php" class="btn btn-info btn-block">Mi perfil</a>
                              </p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p4.php" class="btn btn-primary btn-block">Mis viajes</a>
                              </p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p7.php" class="btn btn-success btn-block">Contactos</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
              <li class="divider"></li>
              <li>
                  <div class="navbar-login navbar-login-session">
                      <div class="row">
                          <div class="col-lg-12">
                              <p>
                                  <a href="index.html" class="btn btn-danger btn-block">Cerrar Sesion</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>
      </li>
  </ul>
  </ul>
  </div>
</div>
<br>



<form action="">

          <div class="col-md-12">
            <label class="licki" for="mapa">Marque el lugar del viaje</label>
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <label class="licki" for="desde">fecha de llegada a destino</label>
          <input id="desde" disabled="" class="form-control" type="date">
        </div>
        <div class="col-xs-6">
          <label class="licki" for="hasta">fecha de partida</label>
          <input id="hasta" disabled="" class="form-control" type="date">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox">
            <label class="licki"><input type="checkbox" class="big-checkbox" value="" disabled>Extraterrestres</label>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="checkbox">
            <label class="licki"><input type="checkbox" class="big-checkbox" checked value="" disabled>Volar</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox">
            <label class="licki"><input type="checkbox" class="big-checkbox" checked value="" disabled>Capturar Pokemons</label>
          </div> 
        </div>
        <div class="col-xs-6">
          <div class="checkbox">
            <label class="licki"><input type="checkbox" class="big-checkbox" value="" disabled>Otros</label>
          </div> 
        </div>
      </div>
      

</form>

<br>
        <div class="col col-xs-10 ">
            <a href="p4.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
        </div>
        <div class="col col-xs-2 text-right">
              <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-create glyphicon glyphicon-pencil "></button>
        </div>
        </div>
        <div class="row hidden" id="btnedit">
            <div class="col-xs-5 col-xs-offset-1">
                  <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                  <section class="visible-xs">Editar</section>
                  </button>
            </div>
            <div class="col-xs-5 col-md-6">
                  <a href="p6.php"><button type="button" id="atr" class="btn btn-lg  btn-block cancel-btn">Atras</button></a>                       
            </div>
        </div>
        </div>
    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>

    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="js/scrips.js"></script>
</body>
</html>


<?php } ?>