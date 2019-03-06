<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>


<?php 
header('Content-Type: application/json');
 ?>

<?php 
$posta = array();

$queryexist = "SELECT * FROM habla JOIN idiomas ON idiomas.ID_IDIOMA = habla.ID_IDIOMA WHERE habla.ID_Usuario = $use";

$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID_habla=$row['ID_IDIOMA'];
        $db_habla=$row['IDIOMA'];



		$json = array(
	          'idh' => $db_ID_habla,
	          'habla' => $db_habla
	        );
		array_push($posta, $json);
      }
}
else {
  $json = array(
            'idh' => 999,
            'habla' => "[SELECCIONE]" 
          );
    array_push($posta, $json);
}
echo json_encode($posta); 
/*echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;*/
?>