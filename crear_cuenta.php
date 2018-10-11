<?php
  session_start();
  include("sesion.php");
?>


<?php 

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$foto = $_POST["foto"];
$contacto = $_POST["contacto"];

/*
$aca = getcwd();

copy($foto, ''.$aca.'/img/foto/'.$id.'.jpg');

$directory=''.$aca.'/img/foto';
$dirint = dir($directory);
while (($archivo = $dirint->read()) !== false)
{
    if ($archivo == $id.'.jpg'){
        $tu_foto = $archivo;
    }
}
$dirint->close();
*/

$queryexist = "SELECT * FROM usuario WHERE ID_Usuario = $id";
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) {
  while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID=$row['ID_Usuario'];
        $db_nombre=$row['Nombre'];
        $db_apellido=$row['Apellido'];
        $db_foto=$row['Img_gmail'];
        $db_foto2=$row['Img_user'];
        
      }
      if ($db_foto !== $foto) {
          $editar_foto = "UPDATE usuario SET Img_gmail = '$foto' WHERE ID_Usuario = $id";
          $mysqli->query($editar_foto);
      }

      $_SESSION[‘ID_user’] = "$db_ID";
      $_SESSION[‘Nombre’] = "$db_nombre";
      $_SESSION[‘Apellido’] = "$db_apellido";
      $_SESSION[‘Foto’] = "$foto";
      $_SESSION[‘Foto2’] = "$db_foto2";

}
else {
  $insert_Usuario = "INSERT INTO usuario (ID_Usuario, Nombre, Apellido, Img_gmail)
                      VALUES ('$id', '$nombre', '$apellido', '$foto')";
 /* echo '<script language="javascript">console.log("grabo algo no me mientas");</script>';*/
  if ($mysqli->query($insert_Usuario) === TRUE) { 
    
  } 
  else {  
   
   echo "1";
   
  }
}   
  

/*
echo '<script language="javascript">alert("hollaa");</script>'; 

echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;
*/

?>
        





