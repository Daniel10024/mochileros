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
    <title>Mis viajes</title>
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
          <div class="panel panel-default panel-table">
                  <div class="panel-heading">
                    <div class="row">
                      <div class="col col-xs-6 col-md-6">
                          <h3 class="panel-title">Lista de contactos</h3>
                      </div >
                      <div class="col col-xs-6 col-md-6 text-right form-group">
                          <a href="p9.php"><button type="button" class="btn btn-sm btn-primary btn-create ">Solicitudes <span class="badge">1</span></button></a>
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
                          <th><p>Foto</p></th>
                          <th><p>Nombre</p></th>
                          <th><p>Ver/Eliminar</p></th>
                          
                        </tr> 
                      </thead>
                      <tbody>
                            <tr id='addr1' data-id="1" class="hiddenlo">
                                
                                <td data-name="ID">


 
                        <img class="cardo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAg5kaJfBJTNlwuPx8r3b6aJ7hEJb5jW9mMXEvbnDdu9aIuiaz" alt="" />


                                  <!-- <p name="id1">Nº</p> --></td>
                                <td data-name="nom"><p name="nom1">Pepe Jamon</p></td>
                                <td data-name="opt" align="center">
                                  <a name="ver1" href="p8.php" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>
                                  
                                  <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete"><em class="glyphicon glyphicon-trash"></em></a>
                  
                                </td>
                            </tr>
                       </tbody>
                    </table>
                  </div>
                  <div class="panel-footer">
                    <div class="row">
                     
                      <div class="col col-xs-9">
                        <ul class="pagination pull-right">
                          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-step-backward"></span></a></li>
                          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                          <li><a href="#"><span class="glyphicon glyphicon-step-forward"></span></a></li>
                        </ul>
                      </div>
                       <div class="col col-xs-3">
                        <a id="add_row" class="btn btn-default pull-right">Add Row</a>
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
                      <h4 class="modal-title custom_align" id="Heading">Eliminar contacto</h4>
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