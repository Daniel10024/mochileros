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
$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $use");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $pai = $data_cli['Pais'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion_U'];
    }
 ?>

 <?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
}
?>
<script type="text/javascript">
    var myvar='<?php echo $use;?>';
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" charset=UTF-8"> 
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

        <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <div class="row">
                        <div class="col-xs-5">
<!--                           <form action="editar_foto.php" id="form-foto" enctype="multipart/form-data" method="POST" > -->
  <form id="form_usuario" action="editar_perfil.php" enctype="multipart/form-data" method="POST" accept-charset="utf-8" class="form" role="form">
                             <div class="box12">
                              <?php 
                                echo '<label for="image"><div id="foto_perfil"><img id="foto_user" alt="chau" src="img/foto/'.$use.'.jpg"/></div></label>';
                              ?>
                              <div class="box-content" align="right">
                                <div class="icon">
                                    <label for="image"><span class="glyphicon glyphicon-camera camara-icono"></span></label>
                                    <input name="image" id="image" type="file" class="hidden">
                                  </div>
                              </div>
                            </div>
<!--                             <input name="insert" id="insert" type="submit" value="submit" class="hidden" data-toggle="modal" data-target="#modal_error">
                          </form>   -->
                        </div>
                        
                        <div class="col-xs-7">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control nombreUsuario" placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control nombreUsuario" placeholder=""  />
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
                  <!-- <option selected value="<?php echo $pai; ?>"><?php echo $pai; ?></option>
                  <option value="Argentina">Argentina</option>
                  <option value="Inglaterra">Inglaterra</option>
                  <option value="Francia">Francia</option>
                  <option value="Otro">Otro</option>
                  <option value="">(Borrar Dato)</option> -->
                </select>
                <p id="p-pai" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <label class="licki">idioma</label>
                <select class="form-control" disabled="" id="select_idioma" name="idioma">
                </select>
                
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Fecha de Nacimiento</label>
                <input type="date" id="eda-form" disabled="" name="edad" value="<?php echo $eda;?>" class="form-control" placeholder="Edad"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto <span id="span"> </span></label>
                
                <textarea maxlength="64" id="con-form" disabled="" name="contacto" class="form-control alto" placeholder="Contacto"><?php echo $con;?></textarea>
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion <span id="span2"> </span></label>
                <textarea maxlength="320" name="des_form" id="des-form" rows="2" placeholder="Descripcion" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-5 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
            </div>
            <div class="col-xs-5 col-sm-6">
                  <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-block btn-create right">Editar</button>
            </div>
            
        </div>

        <div class="row hidden" id="btnedit">


           <div class="col-xs-5 col-xs-offset-1 col-sm-6 col-sm-offset-0">
                   <a href="p2.php"><button type="button" id="atr" class="btn btn-lg  btn-block cancel-btn">Cancelar</button></a>
            </div>
            <div class="col-xs-5 col-sm-6">
                   
                  <button id="btn_guardar" class="btn btn-lg btn-primary btn-block signup-btn" data-toggle="modal" data-target="#modal_error" type="submit">Guardar</button>

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
    <script src="js/fancywebsocket.js"></script>
</body>
</html>