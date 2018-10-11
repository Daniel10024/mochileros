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

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$pais = $_POST["pais"];
$edad = $_POST["edad"];
$intereses = $_POST['intereses'];
$idioma = $_POST['idioma'];
$contacto = $_POST['contacto'];
$des = $_POST["des_form"];




/*$new = $_FILES['input_file'];
$name = $_FILES['input_file']['name'];
$size = $_FILES['input_file']['size'];
$type = $_FILES['input_file']['type'];
$tmp_name = $_FILES['input_file']['tmp_name'];


  
$max_size = 100000;  
$extension = substr($name, strpos($name, '.') + 1);
$location = ''.$aca.'/img/foto/';
$foto_name = $use;
if(isset($name) && !empty($name)){
  if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $extension == $size<=$max_size){
    
    if(move_uploaded_file($tmp_name, $location.$foto_name)){
      $smsg = "Uploaded Successfully";
    }
  }
}*/


if (!empty($nombre)) {


  $editar_perfil = "UPDATE usuario SET Nombre = '$nombre', Apellido = '$apellido', Edad = '$edad', Idioma = '$idioma', Pais = '$pais', Intereses = '$intereses', Contacto = '$contacto', Descripcion = '$des' WHERE ID_Usuario = $use";


/*echo '<script language="javascript">alert("$descripcion");</script>'; */
    if ($mysqli->query($editar_perfil) === TRUE) {  
        /*header("location: p2.php");*/
        echo '<script language="javascript">alert($fot);</script>';
    }
    else 
    {
        echo "Error al modificar el usuario."; 
    }   
}  
      ?>
        
