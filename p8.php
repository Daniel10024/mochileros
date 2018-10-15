<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
?>

<?php 
$query = "SELECT * FROM usuario WHERE ID_Usuario = $use";  
$result = mysqli_query($mysqli, $query);  
while($row = mysqli_fetch_assoc($result))  
{  
  $db_foto=$row['Img_gmail'];
  $db_foto2=$row['Img_user'];
}
  
?>

<?php if ($use == 1) {
  header("location: p1.php");
} ?>

<?php
$amigo_id = $_GET['id'];

$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $amigo_id");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $idi = $data_cli['Idioma'];
    $pai = $data_cli['Pais'];
    $int = $data_cli['Intereses'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion'];
    $foto = $data_cli['Img_gmail'];
    }



if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mochileros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
    <link rel="icon" type="image/png" href="img/backpack.png" />


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
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>
      </div>
      <div class="col-xs-8">

      </div>
      <div class="col-xs-2">
        <ul class="nav navbar-right">
              <li class="dropdown right">
                  <a href="#" class="dropdown-toggle " data-toggle="dropdown" id="botoncitoMenu">
                      <span class="glyphicon glyphicon-th-list glylg"></span> 
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right menucito">
                      <li>
                          <div class="navbar-login">
                              <div class="row">
                                  <div>
                                      <p class="text-center">
                                      <?php 
                                        if (!is_null($db_foto2)) {
                                          echo '<span><img class="cardo" alt="hola" src="data:image/jpeg;base64,'.base64_encode( $db_foto2 ).'"/></span>';
                                        }
                                        else {
                                          echo '<span><img class="cardo" alt="chau" src="'.$db_foto.'"/></span>';
                                        } 
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
                                          <a href="p2.php" class="btn btn-info btn-block botoncitoBorrable">Mi perfil</a>
                                      </p>
                                  </div>
                              </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p4.php" class="btn btn-primary btn-block botoncitoBorrable">Mis viajes</a>
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
                            <img src="<?php echo $foto;?>" alt="" />
                        </div>


                        <div class="col-xs-8">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control " placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control " placeholder="Apellido"  />
                            <p id="p-nom" class="error"></p>
                        </div>



                        
                    </div>
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Pais</label>
                <input type="text" id="pai-form" disabled="" name="nombre" value="<?php echo $pai;?>" class="form-control" placeholder="Nombre"  />
                <p id="p-pai" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Fecha de nacimiento</label>
                <input type="date" id="eda-form" disabled="" name="nombre" value="<?php echo $eda;?>" class="form-control" placeholder="Edad"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Intereses</label>
                <input type="text" id="int-form" disabled="" name="nombre" value="<?php echo $int;?>" class="form-control" placeholder="Nombre"  />
                <p id="p-int" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Idioma</label>
                <input type="text" id="idi-form" disabled="" name="nombre" value="<?php echo $idi;?>" class="form-control" placeholder="Nombre"  />
                <p id="p-idi" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto</label>
                <input type="text" id="con-form" disabled="" name="nombre" value="<?php echo $con;?>" class="form-control" placeholder="Nombre"  />
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion</label>
                <textarea name="des-form" id="des-form" rows="2" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>
        <div class="row">
        <div class="col col-xs-12 ">
            <a href="p7.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
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
</body>
</html>


<?php } ?>