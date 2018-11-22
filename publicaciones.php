<?php
  session_start();
  include("sesion.php");
?>


<?php 
  
header('Content-Type: application/json');

 ?>

<?php 

$aca = getcwd();
$posta = array();
$id = $_POST["id"];

$querypublic = "SELECT * FROM publicacion JOIN usuario ON publicacion.ID_Usuario = usuario.ID_Usuario AND publicacion.Publico = 2";

$queryamigos = "SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.Amigo WHERE solisitud.User = $id AND solisitud.Estado = 1
UNION
SELECT ID_Usuario FROM usuario JOIN solisitud ON usuario.ID_Usuario = solisitud.User WHERE solisitud.Amigo = $id AND solisitud.Estado = 1";

$queryexist = "SELECT * FROM publicacion JOIN usuario ON publicacion.ID_Usuario = usuario.ID_Usuario WHERE publicacion.ID_Usuario IN ($queryamigos) OR publicacion.ID_Usuario = $id UNION ($querypublic) ORDER BY ID_Publicacion DESC";

$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $tu_foto = '<div></div>';
        $db_ID_publi=$row['ID_Publicacion'];
        $db_coment=$row['Comentario'];
        $db_publi=$row['Publico'];
        $db_fecha=$row['Fecha'];
        $db_ID_user=$row['ID_Usuario'];
        $db_nombre=$row['Nombre'];
        $db_apellido=$row['Apellido'];
        
        $directory=''.$aca.'/img/publicaciones';
        $dirint = dir($directory);
        while (($archivo = $dirint->read()) !== false)
        {
            if ($archivo == $db_ID_publi.'.jpg'){
                $tu_foto = '<img class="right" width="185" alt="" src="img/publicaciones/'.$archivo.'"/>';
            }
        }
        $dirint->close();

		$json = array(
	        'ida' => $db_ID_user,
	        'nombre' => $db_nombre,
	        'apellido' => $db_apellido,
            'coment' => $db_coment,
            'image' => $tu_foto,
            'fecha' => $db_fecha,
            'idp' => $db_ID_publi
	        );
		array_push($posta, $json);
      }
}
else {
  
}
echo json_encode($posta); 
/*echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;*/
?>
