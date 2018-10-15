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
$queryexist = "SELECT * FROM solisitud INNER JOIN usuario ON usuario.ID_Usuario = solisitud.User OR usuario.ID_Usuario = solisitud.Amigo WHERE  User != $id OR Amigo != $id";
/*$queryexist = "SELECT * FROM solisitud WHERE User = $id OR Amigo = $id";*/
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID_soli=$row['ID_solisitud'];
        $db_user=$row['User'];
        $db_amigo=$row['Amigo'];
        $db_estado=$row['Estado'];
        $db_ID_user=$row['ID_Usuario'];
        $db_nombre=$row['Nombre'];
        $db_apellido=$row['Apellido'];
        $db_foto=$row['Img_gmail'];

		$json = array(
	          'ida' => $db_ID_user,
	          'nombre' => $db_nombre,
	          'apellido' => $db_apellido,
	          'foto' => $db_foto
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

