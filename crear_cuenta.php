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

        
      }

      $_SESSION[‘ID_user’] = "$db_ID";
      $_SESSION[‘Nombre’] = "$db_nombre";
      $_SESSION[‘Apellido’] = "$db_apellido";


}
else {
  $aca = getcwd();
  $insert_Usuario = "INSERT INTO usuario (ID_Usuario, Nombre, Apellido)
                      VALUES ('$id', '$nombre', '$apellido')";
  copy($foto, ''.$aca.'/img/foto/'.$id.'.jpg');
 /* echo '<script language="javascript">console.log("grabo algo no me mientas");</script>';*/
  if ($mysqli->query($insert_Usuario) === TRUE) {
  	$_SESSION[‘ID_user’] = "$id";
    $_SESSION[‘Nombre’] = "$nombre";
    $_SESSION[‘Apellido’] = "$apellido";
  } 
  else {  
   
   echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;
   
  }
}   
  

/*
echo '<script language="javascript">alert("hollaa");</script>'; 

echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;
*/

?>
        





