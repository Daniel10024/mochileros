 <?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>

 <?php
 $id_yo =$_POST["id_yo"];
 $id_p = $_POST["soli"];

    $delet = "DELETE FROM publicacion WHERE ID_Publicacion = '$id_p'";
    if ($mysqli->query($delet) === TRUE) 
    {
        header("location: p1.php"); 
    }
    else 
    {
        echo '1';
    }
?>