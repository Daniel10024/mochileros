
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




<!DOCTYPE html>
<html lang="en">
<head>
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
		<div class="row">
			<div class="col-xs-2">
				<li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>
			</div>
			<div class="col-xs-8 ">
				<li class="center"><a href="p3.php"><button class="btn btn-sm btn-primary textoBuscarViajes"> <span class="glyphicon glyphicon-search"></span> Buscar viajes</button></a></li>
			</div>
			<div class="col-xs-2">
				<ul class="nav navbar-right">
	      			<li class="dropdown right">

	      				<!-- COSITO DEL MENU -->
	          			<a href="#" class="dropdown-toggle " data-toggle="dropdown" id="botoncitoMenu">
	              			<span class="glyphicon glyphicon-th-list glylg"></span> 
	          			</a>

	          			<ul class="dropdown-menu dropdown-menu-right menucito menucito">
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
			                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
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

<div id="muroDeNoticias" >
	<div class="noticia">
		<span class="textoViaje">Viaje 1</span>
		<img src="img/map.png" class="mapa" alt="">
	</div>
	<div class="noticia">
		<span class="textoViaje">Viaje 2</span>

		<img src="img/map.png" class="mapa" alt="">
		
	</div>
	<div class="noticia">
		<span class="textoViaje">Viaje 3</span>

		<img src="img/map.png" class="mapa" alt="">
		
	</div>
	<div class="noticia">
		<span class="textoViaje">Viaje 4</span>

		<img src="img/map.png" class="mapa" alt="">
		
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