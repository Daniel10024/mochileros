<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>


<?php 
  
  

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


/*echo '<script language="javascript">alert("hollaa");</script>'; */
if (!empty($nombre)) {


  $editar_perfil = "UPDATE usuario SET Nombre = '$nombre', Apellido = '$apellido', Edad = '$edad', Idioma = '$idioma', Pais = '$pais', Intereses = '$intereses', Contacto = '$contacto', Descripcion = '$des' WHERE ID_Usuario = $use";


/*echo '<script language="javascript">alert("$descripcion");</script>'; */
    if ($mysqli->query($editar_perfil) === TRUE) {  
        header("location: p2.php");
    }
    else 
    {
        echo "Error al modificar el usuario."; 
    }   
}  
      ?>
        
