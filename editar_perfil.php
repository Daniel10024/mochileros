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



if (!empty($nombre)) {


  $editar_perfil = "UPDATE usuario SET Nombre = '$nombre', Apellido = '$apellido', Edad = '$edad', Idioma = '$idioma', Pais = '$pais', Intereses = '$intereses', Contacto = '$contacto', Descripcion_U = '$des' WHERE ID_Usuario = $use";


/*echo '<script language="javascript">alert("$descripcion");</script>'; */
    if ($mysqli->query($editar_perfil) === TRUE) {  
        header("location: p2.php");
        echo '<script language="javascript">alert($fot);</script>';
    }
    else 
    {
        echo "Error al modificar el usuario.";
        echo "Error: " . $editar_perfil . "<br>" . $mysqli->error; 
    }   
}  
      ?>
        
