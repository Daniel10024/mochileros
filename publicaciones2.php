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
$id_yo = $_POST["id"];
$queryexist = "SELECT * FROM publicacion JOIN usuario ON publicacion.ID_Usuario = usuario.ID_Usuario AND publicacion.Publico = 2";

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
