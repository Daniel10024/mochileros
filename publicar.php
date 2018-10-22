<?php  
//nos conectamos a la base de datos 
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
  echo "salio bien :D";
  } 
  else {  
   echo "Error: " . $agregar_publicacion . "<br>" . $mysqli->error . "<br>";
  }
  }  




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
imagecopyresampled($muestra,$original,0,0,0,0, $muestra_w,$muestra_h,$original_w,$original_h);//aqui se crea la imagen en la variable $muestra 

imagedestroy($original); // aqui destruyo el original, pues no hace falta ya 

$aca = getcwd();

$ruta_destino = ''.$aca.'/img/publicaciones/';
// comenzamos a guardar el archivo 
        //$ruta_destino = "thumbnails/"; //ponemos la ruta donde queremos almacenar los archivos en el server 
        $namefin=$mysqli->insert_id; //trim ($_FILES['fichero']['name']); //quito espacios iniciales y finales del nombre del archivo
        $namefinal= $namefin.'.jpg';
        //$namefinal= preg_replace (" ", "", $namefinal); //quito los espacios entre el nombre para no tener despues problemas de codigo 
        $uploadfile= $ruta_destino . $namefinal; //monto la ruta seguida del nombre del archivo en $uploadfile 
        if(imagejpeg($muestra,$uploadfile,'100')) { // se coloca en su lugar final,  el 100 el la calidad del jpg 
          header("location: p1.php");
                    echo "<b>Upload exitoso!. Datos:</b><br>";  
            echo "Nombre: <i><a href=\"".$uploadfile."\">".$_FILES['image']['name']."</a></i><br>";  
            echo "Tipo MIME: <i>".$_FILES['image']['type']."</i><br>";  
                    echo "Peso: <i>".$_FILES['image']['size']." bytes</i><br>";  
                        echo "<br><hr><br>";  
                                      }else{echo "no se guardo la foto, ni se inserto  en la Base de Datos";} 
                     }else{echo "no se subio foto";} 



?>