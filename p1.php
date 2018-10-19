
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


<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>


<script type="text/javascript">
    var myvar='<?php echo $use;?>';
</script>

<!DOCTYPE html>
<html lang="en">
<head>



<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> 

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
       
--> 


    <meta charset="UTF-8">
    <title>Mochilero</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">

    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">
    <link rel="icon" type="image/png" href="img/backpack.png" />
    


</head>
<body class="f_PC">
    <header>
        <div class="container" id="cabezalMenu">


<div class="row">
  <div class="col-sm-12">
	<ul class="nav nav-tabs">
		<div class="row menuArriba">
			<div class="col-xs-3 col-sm-2 col-md-2">
				<li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>
			</div>
			<div class="col-xs-6 col-sm-8 col-md-8">
				<li class="center"><a href="p3.php"><button class="btn btn-sm btn-block btn-primary textoBuscarViajes"> <span class="glyphicon glyphicon-search"></span> Buscar viajes</button></a></li>
			</div>
			<div class="col-xs-3 col-sm-2 col-md-2">
				<ul class="nav navbar-right">
	      			<li class="dropdown right">

	      				<!-- COSITO DEL MENU -->
	          			<a href="#" class="dropdown-toggle " data-toggle="dropdown" id="botoncitoMenu">
	              			<span class="glyphicon glyphicon-th-list glylg"></span> 
	          			</a>

	          			<ul class="dropdown-menu dropdown-menu-right menucito ">
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

<div class="row nav_muro">
	<div class="col-md-12">
        <div class="panel with-nav-tabs panel-info">
            <div class="panel-heading center">
                    <ul class="nav nav-tabs">
                        <li class="active col-xs-6"><a href="#tab1info" data-toggle="tab">Amigos</a></li>
                        <li class="col-xs-6"><a href="#tab2info" data-toggle="tab">Publico</a></li>
                    </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active muroDeNoticias" id="tab1info">
                    	<div class="pensando">
                    		<div class="row">
					            <div class="col-md-12">
					                <div class="with-nav-tabs">
					                    <div class="esto">
					                        <ul class="nav nav-tabs">
					                            <li class="active"><a data-toggle="tab" href="#posts">publica un comentario</a></li>
					                        </ul>
					                    </div>
					                    <div class="card-body">
					                        <div class="tab-content" id="myTabContent">
					                            <div class="tab-pane fade in active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
					                                <div class="form-group">
					                                    <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?"></textarea>
					                                </div>
					                            </div>
					                        </div>
					                        <div class="col-md-12">
					                            <div class="btn-group">
					                                <button type="submit" class="btn btn-primary compart">Compartir</button>
					                            </div>
					                            <div class="btn-group right">
					                                <button id="btnGroupDrop1" type="button" class="btn btn-link dropdown-toggle" data-toggle="dropdown" >
					                                    <i class="glyphicon glyphicon-user"></i>
					                                </button>
					                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnGroupDrop1">
					                                	<div class="navbar-login">
								                      	<div class="row">
								                          	<div class="col-sm-12">
								                              	<p>
								                                  	<a href="#" class="btn btn-info btn-block botoncitoBorrable">Public</a>
								                              	</p>
								                          	</div>
								                      	</div>
									                    <div class="row">
									                        <div class="col-sm-12">
									                            <p>
									                                <a href="#" class="btn btn-primary btn-block botoncitoBorrable">Friends</a>
									                            </p>
									                        </div>
									                    </div>
						                  			</div>
					                                </div>    
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
                    		</div>
                    	</div>
                    	<div id="notice"></div>
                    	  <!-- <div class="noticia">

						  <div class="row">
						        <div class="col-md-12">
						            <div class="testimonials">
						            	<div class="active item">
						                  <blockquote><a href="p8.php?id=111733596368903726939"><img alt="" src="http://keenthemes.com/assets/bootsnipp/img1-small.jpg" class="pull-left cardo">
						                  	<div class="pull-left">
						                  	<span class="testimonials-name">Lina Mars</span>
						                  </div></a>
						                      <span class="testimonials-post">dd-mm-aaaa</span>
						                  	</blockquote>
						                  <div class="table-responsive">
						                  	<table>
						                  	<p class="coment">Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p>
						                  </table>
						                  </div>
						                </div>
						            </div>
						        </div>
						    </div> -->

					</div>
                    
                    <div class="tab-pane fade muroDeNoticias" id="tab2info">
                    	<div id="notice2"></div>
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
    
</body  onload="publicaciones()">
</html>

<?php } ?>