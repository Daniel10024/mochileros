
<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
  $fot = $_SESSION["‘Foto’"];


?>

<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
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
  <li><a href="p3.php"><button class="btn btn-sm btn-primary "><span class="glyphicon glyphicon-search"></span> buscar viajes</button></a></li>
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

                              <?php 
                              if ($use == 1) {
                                echo '<span><img class="cardo" src="img/1.jpg"/></span>';
                               } 
                               else {?>
                                <span><img class="cardo" src="<?php echo $fot;?>" alt="" /></span>
                              <?php  }
                              /*echo '<span><img class="cardo" src="data:image/jpeg;base64,'.base64_encode( $fot ).'"/></span>';*/  ?>
                                  <!-- <span><img class="cardo" src="<?php echo $fot;?>" alt="" /></span> -->
                              </p>
                          </div>
                          <div>
                              <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                          </div>
                      </div>
                      <?php if ($use == 1) {?>
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                     <?php  }; ?> 
                     <?php if ($use != 1) {?>
                      
                  
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
                       <?php   } ?> 
                  </div>
              </li>
              <li class="divider"></li>
              <li>
                  <div class="navbar-login navbar-login-session">
                      <div class="row">
                          <div class="col-lg-12">
                              <p>
                                <a href="#" onclick="signOut();" class="btn btn-danger btn-block">Cerrar Sesion</a>

                                  <!--<a href="index.html" class="btn btn-danger btn-block">Cerrar Sesion</a> -->
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
<div class="row">
  <div class="col-xs-4">dolares</div>
  <div class="col-xs-3">pesos</div>
  <div class="col-xs-3">euros</div>
  <div class="col-xs-2"><button> <span class="glyphicon glyphicon-plus"></button></span></div>
</div>
<br><br>
<div class="row">
  aca va el muro
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