<?php
session_start();
include("sesion.php");
$use = $_SESSION["‘ID_user’"];
if(isset($_POST["submit"]))
{
$coment = $_POST["comentario"];
$public = $_POST["gender"];
$fechaactual = date('Y-m-d');
$agregar_publicacion = "INSERT INTO publicacion (ID_Usuario, Comentario, Publico, Fecha)
                      VALUES ('$use', '$coment', '$public', '$fechaactual')";
if ($mysqli->query($agregar_publicacion) === TRUE) {
  }
  else {
   echo "Error: " . $agregar_publicacion . "<br>" . $mysqli->error . "<br>";
  }
  }
   if(is_uploaded_file($_FILES['image']['tmp_name'])) {
   $info = getimagesize($_FILES['image']['tmp_name']);
   switch ($info[2]) {
  case 1:
    $imagen = imagecreatefromgif($_FILES['image'] ['tmp_name']); break;
  case 2:
    $imagen = imagecreatefromjpeg($_FILES['image'] ['tmp_name']); break;
  case 3:
    $imagen = imagecreatefrompng($_FILES['image'] ['tmp_name']); break;
  }
$original = $imagen;
$original_w = imagesx($original);
$original_h = imagesy($original);
$max = 185;  //AQUI PONES EL TAMAÑO DE LA IMAGEN A LO QUE QUIERAS segun la tabla donde la muestres
if($original_w>$original_h) {
    $muestra_w = $max;
    $muestra_h = intval(($original_h/$original_w)*$max);
    }
else {
    $muestra_w = intval(($original_w/$original_h)*$max);
    $muestra_h = $max;
    }
$muestra = imagecreatetruecolor($muestra_w,$muestra_h);
imagecopyresampled($muestra,$original,0,0,0,0, $muestra_w,$muestra_h,$original_w,$original_h);
imagedestroy($original);
$aca = getcwd();
$ruta_destino = ''.$aca.'/img/publicaciones/';
        $namefin=$mysqli->insert_id;
        $namefinal= $namefin.'.jpg';
        $uploadfile= $ruta_destino . $namefinal; //monto la ruta seguida del nombre del archivo en $uploadfile
        if(imagejpeg($muestra,$uploadfile,'100')) {header("location: p1.php");exit();}
        else{echo "no se guardo la foto, ni se inserto  en la Base de Datos";} 
        }else{header("location: p1.php");exit();}
?>