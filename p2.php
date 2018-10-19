<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
?>

<?php 
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      
      $query = "UPDATE usuario SET Img_user = '$file' WHERE ID_Usuario = '$use'" ; 
      if(mysqli_query($mysqli, $query))  
      {  
           //echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 } 
 ?>

<?php if ($use == 1) {
  header("location: p1.php");
} ?>

<?php 
$usuario_id = 1;
$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $use");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $idi = $data_cli['Idioma'];
    $pai = $data_cli['Pais'];
    $int = $data_cli['Intereses'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion_U'];
    $fot = $data_cli['Img_gmail'];
    $fo2 = $data_cli['Img_user'];
    }
 ?>

 <?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" charset=UTF-8"> 
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
                                        if (!is_null($fo2)) {
                                          echo '<span><img class="cardo" alt="hola" src="data:image/jpeg;base64,'.base64_encode( $fo2 ).'"/></span>';
                                        }
                                        else {
                                          echo '<span><img class="cardo" alt="chau" src="'.$fot.'"/></span>';
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
                        <div class="col-xs-5">
                          <form id="form-foto" enctype="multipart/form-data" method="POST" >
                             <div class="box12">
                              <?php 
                                if (!is_null($fo2)) {
                                  echo '<label for="image"><img id="foto_user" alt="hola" src="data:image/jpeg;base64,'.base64_encode( $fo2 ).'"/></label>';
                                }
                                else {
                                  echo '<label for="image"><img id="foto_user" alt="chau" src="'.$fot.'"/></label>';
                                } 
                              ?>
                              <div class="box-content" align="right">
                                <div class="icon">
                                    <label for="image"><span class="glyphicon glyphicon-camera camara-icono"></span></label>
                                    <input name="image" id="image" type="file" class="hidden">
                                  </div>
                              </div>
                            </div>
                            <input name="insert" id="insert" type="submit" value="submit" class="hidden" data-toggle="modal" data-target="#modal_error">
                          </form>  
                        </div>
                        <form id="form_usuario" action="editar_perfil.php" method="POST" accept-charset="utf-8" class="form" role="form">
                        <div class="col-xs-7">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control nombreUsuario" placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control nombreUsuario" placeholder="Apellido"  />
                            <p id="p-ap" class="error"></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Pais</label>
                <select class="form-control" disabled="" id="select_pais" name="pais">
                  <option selected value="<?php echo $pai; ?>"><?php echo $pai; ?></option>
                  <option value="Argentina">Argentina</option>
                  <option value="Inglaterra">Inglaterra</option>
                  <option value="Francia">Francia</option>
                  <option value="Otro">Otro</option>
                  <option value="">(Borrar Dato)</option>
                </select>
                <!-- <input type="text" id="pai-form" disabled="" name="pais" value="<?php echo $pai;?>" class="form-control" placeholder="Pais"  /> -->
                <p id="p-pai" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Fecha de nacimiento</label>
                <input type="date" id="eda-form" disabled="" name="edad" value="<?php echo $eda;?>" class="form-control" placeholder="Edad"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Intereses</label>
                <input type="text" id="int-form" disabled="" name="intereses" value="<?php echo $int;?>" class="form-control" placeholder="Intereses"  />
                <p id="p-int" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Idioma</label>
                <select class="form-control" disabled="" id="select_idioma" name="idioma">
                  <option selected value="<?php echo $idi; ?>"><?php echo $idi;?></option>
                  <option value="Español">Español</option>
                  <option value="Ingles">Ingles</option>
                  <option value="Frances">Frances</option>
                  <option value="Otro">Otro</option>
                  <option value="">(Borrar Dato)</option>
                </select>
                <!-- <input type="text" id="idi-form" disabled="" name="idioma" value="<?php echo $idi;?>" class="form-control" placeholder="Idioma"  /> -->
                <p id="p-idi" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto</label>
                <input type="text" id="con-form" disabled="" name="contacto" value="<?php echo $con;?>" class="form-control" placeholder="Contacto"  />
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion</label>
                <textarea name="des_form" id="des-form" rows="2" placeholder="Descripcion" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-9 col-sm-10 col-md-11">
                <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
            </div>
            <div class="col col-xs-3 col-sm-2 col-md-1">
                  <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-create glyphicon glyphicon-pencil right"></button>
            </div>
        </div>

        <div class="row hidden" id="btnedit">
            <div class="col-xs-5 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                  <button id="btn_guardar" class="btn btn-lg btn-primary btn-block signup-btn" data-toggle="modal" data-target="#modal_error" type="submit">Editar</button>
            </div>
            <div class="col-xs-5 col-sm-6">
                  <a href="p2.php"><button type="button" id="atr" class="btn btn-lg  btn-block cancel-btn">Atras</button></a>                       
            </div>
        </div> 
    </form>
<!-- ventana modal _______________________________________________________________________________________________________ -->
      <div class="modal fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div id="mensaje_modal" class="modal-body"></div>
        </div>
      </div>
<!-- _____________________________________________________________________________________________________________________ -->

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