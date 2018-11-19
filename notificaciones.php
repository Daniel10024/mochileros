 <?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>

<?php 
$queryexist = "SELECT * FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.User WHERE solisitud.Amigo = $use AND solisitud.Estado = 2";
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero  >  0) {
	echo $numero;
}

?>