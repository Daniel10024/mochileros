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

<script type="text/javascript">
    var myvar='<?php echo $use;?>';
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

<div class="row nav_muro">
	<div class="col-md-12">
        <div class="panel with-nav-tabs panel-info">
            <div class="panel-heading center">
                <ul class="nav nav-tabs">
                    <li class="active col-xs-6"><a href="#tab1info" data-toggle="tab">Amigos</a></li>
                    <li class="col-xs-6"><a href="#tab2info" data-toggle="tab">Solicitudes <span id="num_soli2" class="badge"></span></a></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active muroDeNoticias" id="tab1info">
						<!-- tabla1_______________________________________ -->
                    	<div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6 col-md-6">
                          <h3 class="panel-title">Lista de Contactos</h3>
                      </div >
                      <br><br>
                    </div>
                  </div>
                  <div class="panel-body">
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-sortable" id="tab_logic">
                      <thead>
                        <tr>
                          <th><p>Foto</p></th>
                          <th><p>Nombre</p></th>
                          <th><p>Ver/Eliminar</p></th>
                        </tr> 
                      </thead>
                      <tbody id="tbody">
                            
                       </tbody>
                    </table>
                  </div>
            </div>
            <div class="row">
            <div class="col col-xs-12 ">
              <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
            </div>
            </div>
            <!-- _________________________ventana modal de borrar__________________________ -->
             <div id="modal_aca2">
            </div> 
            <!-- ________________________________________________________ -->
            <!-- _________________________ventana modal de borrar__________________________ -->
    <div class="modal fade" id="delete_amix" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <h4 class="modal-title custom_align" id="Heading">Eliminar contacto</h4>
              </div>
                 <div class="modal-body">
                  <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>
                </div>
                <div class="modal-footer ">
                  <button id="botonsi_eliminar" type="button" class="btn btn-success botonmodal"><span class="glyphicon glyphicon-ok-sign row-remove"></span>Si</button>
                  <button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                </div>
            </div>
          </div>
        </div>
            <!-- ________________________________________________________ -->
                    	<!-- ____________________________________________ -->
					</div>
                    <div class="tab-pane fade muroDeNoticias" id="tab2info">
                    	<!-- tabla2__________________________________ -->
                    	<div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6 col-md-6">
                          <h3 class="panel-title">Lista de Solicitudes</h3>
                      </div >
                      <br><br>
                    </div>
                  </div>
                  <div class="panel-body">
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-sortable" id="tab_logic">
                      <thead>
                        <tr>
                          <th><p>Foto</p></th>
                          <th><p>Nombre</p></th>
                          <th><p>Aceptar/Rechazar</p></th>
                        </tr> 
                      </thead>
                      <tbody id="tbody2">
                            
                       </tbody>
                    </table>
                  </div>
            </div>
        <div class="row">
          <div class="col col-xs-12 ">
            <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
          </div>
       </div> 
            <!-- _________________________ventana modal de borrar__________________________ -->
             <div id="modal_aca">
            </div> 
            <!-- ________________________________________________________ -->
                    	<!-- _________________________________________ -->
                    </div>
                </div>
            </div>
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