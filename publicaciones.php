<?php
  session_start();
  include("sesion.php");
?>


<?php 
  
header('Content-Type: application/json');

 ?>

<?php 


$posta = array();
$id = $_POST["id"];

$queryamigos = "SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.Amigo WHERE solisitud.User = $id AND solisitud.Estado = 1
UNION
SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.User WHERE solisitud.Amigo = $id AND solisitud.Estado = 1";

$queryexist = "SELECT * FROM publicacion JOIN usuario ON publicacion.ID_Usuario = usuario.ID_Usuario WHERE publicacion.ID_Usuario IN ($queryamigos) OR publicacion.ID_Usuario = $id";

$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID_publi=$row['ID_Publicacion'];
        $db_coment=$row['Comentario'];
        $db_publi=$row['Publico'];
        $db_fecha=$row['Fecha'];
        $db_ID_user=$row['ID_Usuario'];
        $db_nombre=$row['Nombre'];
        $db_apellido=$row['Apellido'];
        $db_foto=$row['Img_gmail'];
        $db_foto2=$row['Img_user'];
        /*if (!is_null($db_foto2)) {
          $db_foto=$db_foto2;
        }*/
        

		$json = array(
	          'ida' => $db_ID_user,
	          'nombre' => $db_nombre,
	          'apellido' => $db_apellido,
	          'foto' => $db_foto,
            'coment' => $db_coment,
            'fecha' => $db_fecha
	        );
		array_push($posta, $json);
      }
}
else {
  
}
echo json_encode($posta); 
/*echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;*/
?>
