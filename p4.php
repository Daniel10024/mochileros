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


          <div class="panel panel-default panel-table">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col col-xs-6 col-md-6">
                          <h3 class="panel-title">Lista de viajes</h3>
                      </div >
                      <div class="col col-xs-6 col-md-6 text-right form-group">
                          <a href="p5.php"><button class="btn btn-primary">agregar viaje</button> </a> 
                      </div>
                      <div class="col-xs-12">
                          <form action="#" method="get">
                              <div class="input-group">
                                  <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                  <input class="form-control" id="system-search" name="q" placeholder="Buscar" required>
                                  <span class="input-group-btn">
                                      <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                  </span>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="panel-body">
              </div>
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover table-sortable" id="tab_logic">
                      <thead>
                          <tr>
                              <th><p>Nº</p></th>
                              <th><p>Viaje</p></th>
                              <th><p>Ver/Eliminar</p></th>
                          </tr> 
                      </thead>
                      <tbody>
                          <tr id='addr1' data-id="1" class="hiddenlo">         
                              <td data-name="ID"><p name="id1">Nº</p></td>
                              <td data-name="nom"><p name="nom1">nombre de viaje</p></td>
                              <td data-name="opt" align="center">
                                <a name="ver1" href="p6.php" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>
                                <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete"><em class="glyphicon glyphicon-trash"></em></a>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
              <div class="panel-footer">
                  <div class="row">
                      <div class="col col-xs-12 center">
                        <ul class="pagination pull-center">
                          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-step-backward"></span></a></li>
                          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                      
                        <!-- <a id="add_row" class="btn btn-default pull-right">Add Row</a> -->
                      </div>
                  </div>
              </div>
          </div>


          <div class="col col-xs-12 ">
            <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
        </div>
            <!-- _________________________ventana modal de borrar__________________________ -->
             

                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h4 class="modal-title custom_align" id="Heading">Eliminar viaje</h4>
                  </div>
                     <div class="modal-body">
                   
                      <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>
                   
                    </div>
                    <div class="modal-footer ">
                      <button id="botonsi" type="button" class="btn btn-success botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign row-remove"></span> Si</button>
                      <button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
              
              </div>
               
          </div>
          
            <!-- ________________________________________________________ -->

          
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