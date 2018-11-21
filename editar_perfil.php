<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];




if(isset($_FILES['image']['name'])) {  //comprovamos que se haya cargado el archivo 

   if(is_uploaded_file($_FILES['image']['tmp_name'])) { 
    
    
   //empieza la redimension, tomamos la imagen temporal subida que puede ser jpg, png o gif 
   $info = getimagesize($_FILES['image']['tmp_name']);  
   //segun el caso sera jpg, gif, png 
   switch ($info[2]) { 
  case 1: 
    $imagen = imagecreatefromgif($_FILES['image'] ['tmp_name']); break; 
  case 2: 
    $imagen = imagecreatefromjpeg($_FILES['image'] ['tmp_name']); break; 
  case 3: 
    $imagen = imagecreatefrompng($_FILES['image'] ['tmp_name']); break; 
  // etcétera //  
  } 

$original = $imagen; 
$original_w = imagesx($original); 
$original_h = imagesy($original); 

$max = 150;  //AQUI PONES EL TAMAÑO DE LA IMAGEN A LO QUE QUIERAS segun la tabla donde la muestres 

if($original_w>$original_h) {
    $muestra_w = $max; 
    $muestra_h = intval(($original_h/$original_w)*$max); 
    } 
else { 
    $muestra_w = intval(($original_w/$original_h)*$max); 
    $muestra_h = $max; 
    } 

$muestra = imagecreatetruecolor($muestra_w,$muestra_h);  
imagecopyresampled($muestra,$original,0,0,0,0, $muestra_w,$muestra_h,$original_w,$original_h);//aqui se crea la imagen en la variable $muestra 

imagedestroy($original); // aqui destruyo el original, pues no hace falta ya 

$aca = getcwd();

$ruta_destino = ''.$aca.'/img/foto/';
// comenzamos a guardar el archivo 
        //$ruta_destino = "thumbnails/"; //ponemos la ruta donde queremos almacenar los archivos en el server 
        $namefinal=$use.'.jpg'; //trim ($_FILES['fichero']['name']); //quito espacios iniciales y finales del nombre del archivo 
        //$namefinal= preg_replace (" ", "", $namefinal); //quito los espacios entre el nombre para no tener despues problemas de codigo 
        $uploadfile= $ruta_destino . $namefinal; //monto la ruta seguida del nombre del archivo en $uploadfile 
        if(imagejpeg($muestra,$uploadfile,'100')) { // se coloca en su lugar final,  el 100 el la calidad del jpg 
          header("location: p2.php");
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
            echo "Nombre: <i><a href=\"".$uploadfile."\">".$_FILES['image']['name']."</a></i><br>";  
            echo "Tipo MIME: <i>".$_FILES['image']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['image']['size']." bytes</i><br>";  
                        echo "<br><hr><br>";  

                     }   }}
                    




$aca = getcwd();
$location = ''.$aca.'/img/foto/';
$foto_name = $use;
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$pais = $_POST["pais"];
$edad = $_POST["edad"];
$intereses = $_POST['intereses'];
$idioma = $_POST['idioma'];
$contacto = $_POST['contacto'];
$des = $_POST["des_form"];
if (!empty($nombre)) {
    $editar_perfil = "UPDATE usuario SET Nombre = '$nombre', Apellido = '$apellido', Edad = '$edad', Pais = '$pais', Contacto = '$contacto', Descripcion_U = '$des' WHERE ID_Usuario = $use";
    if ($mysqli->query($editar_perfil) === TRUE) {header("location: p2.php");exit();}
    else 
    {
        echo "Error al modificar el usuario.";
        echo "Error: " . $editar_perfil . "<br>" . $mysqli->error; 
    }   
}  
?>