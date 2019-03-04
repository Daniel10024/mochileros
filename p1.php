
<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];



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
    <meta charset="UTF-8">
    <title>Mochilero</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
	<link rel="icon" type="image/png" href="img/logomini.png" />
    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">    
</head>
<body class="f_PC" onload="startApp()">
    <header>
        <div class="container" id="cabezalMenu">

<div class="row">
  <div class="col-sm-12">
	<ul class="nav nav-tabs">
		<div class="row menuArriba">
			<div class="col-xs-3 col-sm-2 col-md-2">
				<li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/logomini.png" alt="" /></span></a></li>
			</div>
			<div class="col-xs-6 col-sm-8 col-md-8">
				<li class="center"><a href="p3.php"><button class="btn btn-sm btn-block btn-primary textoBuscarViajes"> <span class="glyphicon glyphicon-search"></span> Buscar Viajes</button></a></li>
			</div>
			<div class="col-xs-3 col-sm-2 col-md-2">
				<ul class="nav navbar-right">
	      			<li class="dropdown right">

	      				<!-- COSITO DEL MENU -->
	          			<a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown" id="botoncitoMenu">
	              			<span class="glyphicon glyphicon-th-list glylg"></span> 
	          			</a>

	          			<ul class="dropdown-menu dropdown-menu-right menucito ">
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
			                      	<div id="customBtn" class="2customGPlusSignIn">
						              <button class="btn btn-info btn-block botoncitoBorrable">Iniciar Sesion</button>
						            </div>
			                        <!-- <div class="g-signin2 botonLoginInvitado" data-onsuccess="onSignIn"></div> -->
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
	                              				<?php if ($use ==1): ?>
	                              					<a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Salir</a>
	                              				<?php endif ?>
	                              				<?php if ($use != 1): ?>
	                              					<a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Cerrar Sesion</a>
	                              				<?php endif ?>
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
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active muroDeNoticias" id="tab1info">
						<?php if ($use != 1): ?>				
                    	<div class="pensando">
                    		<div class="row">
					            <div class="col-md-12">
					                <div class="with-nav-tabs">
										<form action="publicar.php" enctype="multipart/form-data" method="post" id="form-publicacion">
						                    <div class="esto">
						                        <ul class="nav nav-tabs">
						                        	<label class="abajo hidden-xs">Caracteres restantes: <span id="span"></span></label>
						                            <li class="active"><a data-toggle="tab" href="#posts">Publicar Comentario</a></li>
						                        </ul>
						                    </div>
						                    <div class="card-body">
						                        <div class="tab-content" id="myTabContent">
						                            <div class="tab-pane fade in active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
						                                <div class="form-group row">
						                                		<div id="content_coment" class="col-xs-12 col-md-12">
						                                			<textarea maxlength="210" name="comentario" class="form-control ancho" rows="3" id="message" placeholder="¿Que estas pensando?"></textarea>
						                                			<label class="visible-xs">Caracteres restantes: <span id="span2"></span></label>
						                                		</div>
						                                		<div class="col-md-5" id="aca">
						                                		</div>
						                                </div>
						                            </div>
						                        </div>
						                        <div class="col-md-12">
						                        	<input type="file" name="image" id="publicar-foto" class="hidden">
						                            <div class="btn-group">
						                                <button name="submit" type="submit" data-toggle="modal" data-target="#modal_error" class="btn btn-primary compart">Compartir</button>
						                            </div>
						                        	<div class="btn-group">
						                                <label id="label_foto" for="publicar-foto" class="btn btn-info compart">Agregar Foto</label>
						                            </div>
						                            <div class="btn-group right">
						                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" >
						                                    <i id="dibujito" class="glyphicon glyphicon-user"></i>
						                                </button>
						                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
						                                	<div class="navbar-login">
									                      	<div class="row">
									                      		<div class="col-sm-12">
										                            <p><label class="btn btn-primary btn-block botoncitoBorrable" for="Friends">Amigos</label></p>
										                        </div>
									                      	</div>
										                    <div class="row">
										                        <div class="col-sm-12">
									                              	<p><label class="btn btn-info btn-block botoncitoBorrable" for="Public">Publico</label></p>
									                          	</div>
										                    </div>
							                  			</div>
						                                </div>    
						                            </div>
						                        </div>
						                    </div>
						                    <input type="radio" id="Friends" name="gender" class="hidden" value="1" checked>
  											<input type="radio" id="Public" name="gender" class="hidden" value="2">
										</form> 
					                </div>
					            </div>
                    		</div>
                    	</div>
                    	<?php endif ?>
                    	<div id="notice"></div>
					</div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <a href="p7.php" id="notifi" class="nonotifi"><span class="glyphicon glyphicon-bell campanita"><span id="num_soli" class="badge numleft"></span></span></a>
    </div>

<!-- ventana modal de error _______________________________________________________________________________________________________ -->
      <div class="modal fade" id="modal_error" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
          <div id="mensaje_modal" class="modal-body"></div>
        </div>
      </div>
<!-- _____________________________________________________________________________________________________________________ -->

<!-- _________________________ventana modal de borrar__________________________ -->
		<div class="modal fade" id="delete_public" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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

    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <!-- <script src="js/fancywebsocket.js"></script> -->



    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="js/scrips.js"></script>
    
</body>
</html>