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
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mochileros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
    <link rel="icon" type="image/png" href="img/logomini.png" />

    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">
</head>
<body class="f_PC">
    <header>
        <div class="container" id="cabezalMenu">
<div class="row menuArriba">
  <div class="col-sm-12">
  <ul class="nav nav-tabs">
    <div class="row">
      <div class="col-xs-2">
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/logomini.png" alt="" /></span></a></li>
      </div>
      <div class="col-xs-8">
      </div>
      <div class="col-xs-2">
        <ul class="nav navbar-right">
              <li class="dropdown right">
                  <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown" id="botoncitoMenu">
                      <span class="glyphicon glyphicon-th-list glylg"></span> 
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right menucito">
                      <li>
                          <div class="navbar-login">
                              <div class="row">
                                  <div>
                                      <p class="text-center">
                                      <?php 
                                        echo '<span><img class="cardo" alt="chau" src="img/foto/'.$use.'.jpg"/></span>'; 
                                      ?>
                                      </p>
                                  </div>
                                <div>
                                    <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                                </div>
                              </div>
                            <?php if ($use == 1) {?>
                              <div class="g-signin2 botonLoginInvitado" data-onsuccess="onSignIn"></div>
                           <?php  }; ?> 
                           <?php if ($use != 1) {?>
                              <div class="row">
                                  <div class="col-sm-12">
                                      <p>
                                          <a href="p2.php" class="btn btn-info btn-block botoncitoBorrable">Mi Perfil</a>
                                      </p>
                                  </div>
                              </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p4.php" class="btn btn-primary btn-block botoncitoBorrable">Mis Viajes</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p7.php" class="btn btn-success btn-block botoncitoBorrable">Contactos</a>
                                    </p>
                                </div>
                            </div>
                              <?php   } ?> 
                          </div>
                      </li>
                      <li class="divider"></li>
                      <li>
                          <div class="navbar-login navbar-login-session">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <p>
                                        <a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Cerrar Sesion</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
    </div>
    </ul>
  </div>
</div>
<br>



          
            <!-- <label class="licki" for="mapa">Marque el lugar del viaje</label> -->
<!-- </div> -->
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0;" allowfullscreen></iframe>
      
<!-- <div class="container"> -->
      <div class="row">
        <div class="col-xs-6">
          <label class="licki" for="desde">Fecha de LLegada</label>
          <input id="desde" ="" class="form-control" type="date" disabled="">
        </div>
        <div class="col-xs-6">
          <label class="licki" for="hasta">Fecha de Partida</label>
          <input id="hasta" ="" class="form-control" type="date" disabled="">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-6">
          <label class="licki" for="desde">Intereses</label>


      <div class="dropdown dropdown-large">
        <button class="btn dropdown-toggle form-control" id="dropdownMenu1" data-toggle="dropdown">Intereses <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-large row">
          <li class="col-xs-12">
            <ul>
              <li class="dropdown-header">Intereses</li>
              <li><div class="row">
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                    <label for="op1" class=""><input type="checkbox" id="op1" class="big-checkbox" value="" disabled="">Esquiar</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                     <label for="op2" class=""><input type="checkbox" id="op2" class="big-checkbox" checked="" value="" disabled="">Volar</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                     <label for="op5" class=""><input type="checkbox" id="op5" class="big-checkbox" checked="" value="" disabled="">Fiesta Nocturna</label>
                  </div>
                </div>
              </div></li>
              <li role="separator" class="divider hidden-xs"></li>
              <li><div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="checkbox">
                    <label for="op3" class=""><input type="checkbox" id="op3" class="big-checkbox" checked="" value="" disabled="">Capturar Pokemons</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="checkbox">
                     <label for="op4" class=""><input type="checkbox" id="op4" class="big-checkbox"  value="" disabled="">Otros</label>
                  </div>
                </div>
              </div></li>
            </ul>
          </li>
        </ul>
      </div>

        </div>
        
      </div> 
      


<br>
      <div class="row">
        <div class="col col-xs-9 col-sm-10 col-md-11">
            <a href="p4.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
        </div>
        <div class="col col-xs-3 col-sm-2 col-md-1 text-right">
              <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-create glyphicon glyphicon-pencil "></button>
        </div>
      </div>
      <div class="row hidden" id="btnedit">
            <div class="col-xs-6">
                  <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Editar</button>
            </div>
            <div class="col-xs-6">
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