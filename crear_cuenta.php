<?php
  session_start();
  include("sesion.php");
?>


<?php 
  


 ?>

<?php 

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$foto = $_POST["foto"];
$contacto = $_POST["contacto"];


 
$queryexist = "SELECT * FROM usuario WHERE ID_Usuario = $id";
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) {
  while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID=$row['ID_Usuario'];
        $db_nombre=$row['Nombre'];
        $db_apellido=$row['Apellido'];
        $db_foto=$row['Imagen'];
        
      }
      $_SESSION[‘ID_user’] = "$db_ID";
      $_SESSION[‘Nombre’] = "$db_nombre";
      $_SESSION[‘Apellido’] = "$db_apellido";
      $_SESSION[‘Foto’] = "$db_foto";
    
  
  
}
else {
  $insert_Usuario = "INSERT INTO usuario (ID_Usuario, Nombre, Apellido, Imagen)
                      VALUES ('$id', '$nombre', '$apellido', '$foto')";
 /* echo '<script language="javascript">console.log("grabo algo no me mientas");</script>';*/
  if ($mysqli->query($insert_Usuario) === TRUE) { 

  
    
  } 
  else {  
   
   echo "1";
   

  }
}   
  

/*echo '<script language="javascript">alert("hollaa");</script>'; 

echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;


*/

      ?>
        





