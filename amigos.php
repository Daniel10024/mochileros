<?php
  session_start();
  include("sesion.php");
?>


<?php 
  
header('Content-Type: application/json');

 ?>

<?php 

$id = $_POST["id"];
 
$queryexist = "SELECT * FROM solisitud WHERE User = $id OR Amigo = $id";
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero > 0) 
{
      while($row=mysqli_fetch_assoc($respuesta))
      {
        $db_ID=$row['ID_solisitud'];
        $db_user=$row['User'];
        $db_amigo=$row['Amigo'];
        $db_estado=$row['Estado'];
      }
    if ($db_user == $id) 
    {
        $queryexist = "SELECT * FROM usuario WHERE ID_Usuario = $db_amigo";
        $respuesta = mysqli_query($mysqli, $queryexist);
        $numero = mysqli_num_rows($respuesta);
        if ($numero > 0) 
        {
              while($row=mysqli_fetch_assoc($respuesta))
              {
                $db_ID=$row['ID_Usuario'];
                $db_nombre=$row['Nombre'];
                $db_apellido=$row['Apellido'];
                $db_foto=$row['Imagen']; 
              }

              $json = array(
                  'ida' => $db_ID,
                  'nombre' => $db_nombre,
                  'apellido' => $db_apellido,
                  'foto' => $db_foto
              );
              echo json_encode($json);



             /* echo $db_nombre;*/
        }   
    }
    else {
      $queryexist = "SELECT * FROM usuario WHERE ID_Usuario = $db_user";
        $respuesta = mysqli_query($mysqli, $queryexist);
        $numero = mysqli_num_rows($respuesta);
        if ($numero > 0) 
        {
              while($row=mysqli_fetch_assoc($respuesta))
              {
                $db_ID=$row['ID_Usuario'];
                $db_nombre=$row['Nombre'];
                $db_apellido=$row['Apellido'];
                $db_foto=$row['Imagen']; 
              }
              echo '<script language="javascript">alert("soy amigo");</script>';
        } 
    }
}
else {
  echo '<script language="javascript">alert("hollaa");</script>';
}
 

/*echo "Error: " . $insert_Usuario . "<br>" . $mysqli->error;*/
?>




