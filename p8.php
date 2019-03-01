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
$amigos = array();
$queryexist = "SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.Amigo WHERE solisitud.User = $use
UNION
SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.User WHERE solisitud.Amigo = $use";
$respuesta = mysqli_query($mysqli, $queryexist);
    while($row=mysqli_fetch_assoc($respuesta))
    {
      $db_ID_user=$row['ID_Usuario'];
      $amigo = $db_ID_user;
      array_push($amigos, $amigo);
    }
?>

<?php if ($use == 1) {
  header("location: p1.php");
} 
?>

<?php
$amigo_id = $_GET['id'];
if (isset($_GET['mapa'])) {
  $mapa = $_GET['mapa'];
}


$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $amigo_id");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $pai = $data_cli['Pais'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion_U'];
    }

if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
}
?>


<script type="text/javascript">
    var myvar='<?php echo $use;?>';
    var suvar='<?php echo $amigo_id;?>';
</script>


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
      <div class="col-xs-3 col-sm-2 col-md-2">
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/logomini.png" alt="" /></span></a></li>
      </div>
      <div class="col-xs-6 col-sm-8 col-md-8">
        <?php if ($amigo_id != $use and !in_array($amigo_id, $amigos)): ?>
          <li class="center"><button class="btn btn-sm btn-block btn-success textoBuscarViajes" onclick="enviar();"> <span class="glyphicon glyphicon-search"></span> Enviar Solicitud</button></li>
        <?php endif ?>
      </div>
      <div class="col-xs-3 col-sm-2 col-md-2">
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
        <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <div class="row">
                        <div class="col-xs-4">
                            <?php echo '<label for="image"><div id="foto_perfil"><img id="foto_user" alt="chau" src="img/foto/'.$amigo_id.'.jpg"/></div></label>'; ?>
                        </div>


                        <div class="col-xs-8">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control " placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control " placeholder=""  />
                            <p id="p-nom" class="error"></p>
                        </div>



                        
                    </div>
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Pais</label>
                <input type="text" id="pai-form" disabled="" name="nombre" value="<?php echo $pai;?>" class="form-control" placeholder="Pais"  />
                <p id="p-pai" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Fecha de Nacimiento</label>
                <input type="date" id="eda-form" disabled="" name="nombre" value="<?php echo $eda;?>" class="form-control" placeholder="Fecha de nacimiento"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto</label>
                <input type="text" id="con-form" disabled="" name="nombre" value="<?php echo $con;?>" class="form-control" placeholder="Contacto"  />
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion</label>
                <textarea name="des-form" id="des-form" rows="2" placeholder="Descripcion" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>
        <div class="row">
        <div class="col col-xs-12 ">
          <?php if (isset($_GET['mapa'])) {?>
            <a href="p3.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a>
          <?php } 
          else {
            echo '<a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a>';
          } ?>
             
        </div>
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
    <script src="js/fancywebsocket.js"></script>
</body>
</html>