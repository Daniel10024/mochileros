<?php
  session_start();
  include("sesion.php");
?>


<?php 
  
header('Content-Type: application/json');

 ?>

<?php 

$id = $_POST["id"];
$posta = array();

$queryexist = "SELECT * FROM viaje JOIN escala ON viaje.ID_ESCALA = escala.ID_ESCALA WHERE viaje.ID_Usuario = $id";


$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_escala=$row['ESCALA'];
        $db_user=$row['ID_Usuario'];
        $db_nombre=$row['NOMBRE'];
        $db_viaje=$row['ID_VIAJE'];


		$json = array(
	          'vuser' => $db_user,
            'vvia' => $db_viaje,
	          'vnom' => $db_nombre,
	          'vesca' => $db_escala
	        );
		array_push($posta, $json);
      }
}
else {
  echo '<script language="javascript">alert("hollaa");</script>';
}
echo json_encode($posta); 
/*echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;*/
?>

