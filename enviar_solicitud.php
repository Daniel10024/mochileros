 <?php
  session_start();
  include("sesion.php");
?>

 <?php
 $id_amigo = $_POST["id_amigo"];
 $id_yo = $_POST["id_yo"];
$agregar_amigo = "INSERT INTO solisitud (User, Amigo, Estado)
                      VALUES ('$id_yo', '$id_amigo', '2')";
if ($mysqli->query($agregar_amigo) === TRUE) { 

  } 
else {  

echo "1";

}
?>