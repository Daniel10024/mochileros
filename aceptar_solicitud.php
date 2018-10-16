 <?php
  session_start();
  include("sesion.php");
?>

 <?php
 $id_amigo = $_POST["id_amigo"];
 $id_yo = $_POST["id_yo"];
 $queryexist = "SELECT * FROM solisitud WHERE User = $id_amigo AND Amigo = $id_yo";
$respuesta = mysqli_query($mysqli, $queryexist);
$numero = mysqli_num_rows($respuesta);
if ($numero == 1) 
{
    while($row=mysqli_fetch_assoc($respuesta))
    {
      $db_ID_soli=$row['ID_solisitud'];
    }
    $aceptar="UPDATE solisitud SET Estado = '1' WHERE ID_solisitud = '$db_ID_soli'";
    if ($mysqli->query($aceptar) === TRUE) 
    {
        header("location: p7.php"); 
    }
    else 
    {
        echo '1'; 
    }
}
else {
  echo '1';
}
?>