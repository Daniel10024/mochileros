<?php  
function mysql_escape($cadena) {  //funcion para limpiar campos del form de codigo malicioso 
    if(get_magic_quotes_gpc() != 0) { 
        $cadena = stripslashes($cadena); 
    } 
    return mysql_real_escape_string($cadena); 
}   


//nos conectamos a la base de datos 
session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];

if(isset($_FILES['fichero']['name'])) {  //comprovamos que se haya cargado el archivo 

   if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
    
    
   //empieza la redimension, tomamos la imagen temporal subida que puede ser jpg, png o gif 
   $info = getimagesize($_FILES['fichero']['tmp_name']);  
   //segun el caso sera jpg, gif, png 
   switch ($info[2]) { 
  case 1: 
    $imagen = imagecreatefromgif($_FILES['fichero'] ['tmp_name']); break; 
  case 2: 
    $imagen = imagecreatefromjpeg($_FILES['fichero'] ['tmp_name']); break; 
  case 3: 
    $imagen = imagecreatefrompng($_FILES['fichero'] ['tmp_name']); break; 
  // etcétera //  
  } 

$original = $imagen; 
$original_w = imagesx($original); 
$original_h = imagesy($original); 

$max = 50;  //AQUI PONES EL TAMAÑO DE LA IMAGEN A LO QUE QUIERAS segun la tabla donde la muestres 

if($original_w>$original_h) {
    $muestra_w = $max; 
    $muestra_h = intval(($original_h/$original_w)*$max); 
    } else { 
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
        $namefinal="new"; //trim ($_FILES['fichero']['name']); //quito espacios iniciales y finales del nombre del archivo 
        //$namefinal= preg_replace (" ", "", $namefinal); //quito los espacios entre el nombre para no tener despues problemas de codigo 
        $uploadfile= $ruta_destino . $namefinal; //monto la ruta seguida del nombre del archivo en $uploadfile 
        if(imagejpeg($muestra,$uploadfile,'100')) { // se coloca en su lugar final,  el 100 el la calidad del jpg 
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
            echo "Nombre: <i><a href=\"".$uploadfile."\">".$_FILES['fichero']['name']."</a></i><br>";  
            echo "Tipo MIME: <i>".$_FILES['fichero']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                        echo "<br><hr><br>";  
                       


                         
 //insertamos en la BD los campos del form 
 if(isset($use)) // Aqui actualizaremos el perfil del usuario en la base de datos y le mostraremos que esta conectado
{

$orden = ("select * from usuario where ID_Usuario = ". $use ."");
  $mysqli->query("UPDATE  usuario SET  Img_user='".$_FILES['fichero']['type']."' where ID_Usuario = ". $use ."") ; 




  
}

                                      }else{echo "no se guardo la foto, ni se inserto  en la Base de Datos";} 
                     }else{echo "no se subio foto";} 
           }else{echo "no se selecciono la foto";} 


 //ahora el formulario 

?>  
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">  
  <p>Imagen perfil:  
      <input name="fichero" type="file" size="20" maxlength="20">
      <input name="submit" type="submit" value="Upload!">  
</form> 
</body> 

</html>




