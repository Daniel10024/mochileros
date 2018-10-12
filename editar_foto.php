<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>


<?php

$aca = getcwd();

$location = ''.$aca.'/img/foto/';
$foto_name = $use;


?>

<?php 





echo "string";

//$filoso = $_POST["file"];


$new = $_FILES['file'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];


$smsg = ""; 
$max_size = 100000;  
$extension = substr($name, strpos($name, '.') + 1);
$location = ''.$aca.'/img/foto/';
$foto_name = $use;
if(isset($name) && !empty($name)){
  if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg"){
    echo "2as";
    if(move_uploaded_file($tmp_name, $location.$foto_name.'.jpg')){
      $smsg = "Uploaded Successfully";
      echo $smsg;
    }
  }
}


$directory=''.$aca.'/img/foto';
$dirint = dir($directory);
while (($archivo = $dirint->read()) !== false)
{
    if ($archivo == $foto_name.'.jpg'){
        $tu_foto = $archivo;
        echo '<script language="javascript">alert("$descripcion");</script>';
    }
}
$dirint->close();


if (!empty($smsg)) {

  $file = addslashes(file_get_contents($tmp_name)); 
  $editar_perfil = "INSERT INTO usuario(Img_user) VALUES ('$file') WHERE ID_Usuario = $use";  
 // $editar_perfil = "UPDATE usuario SET Img_user = '$file' WHERE ID_Usuario = $use";


/*echo '<script language="javascript">alert("$descripcion");</script>'; */

    if ($mysqli->query($editar_perfil) === TRUE) {  
        header("location: p2.php");
        echo '<script language="javascript">alert($fot);</script>';
    }
    else 
    {
        echo "Error al modificar el usuario."; 
    }   
} 
      ?>
        
