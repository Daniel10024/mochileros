 <?php
  session_start();
  include("sesion.php");
?>

<?php
$id_viaje = $_POST["id_viaje"];
$delet_intereses = "DELETE FROM le_interesa WHERE ID_VIAJE = '$id_viaje'";
$delet_punto = "DELETE FROM punto WHERE ID_VIAJE = '$id_viaje'";
$delet_viaje = "DELETE FROM viaje WHERE ID_VIAJE = '$id_viaje'";
if ($mysqli->query($delet_intereses) === TRUE) 
{
      if ($mysqli->query($delet_punto) === TRUE) 
      {
          if ($mysqli->query($delet_viaje) === TRUE) 
          {
              header("location: p4.php"); 
          }
          else 
          {
              echo '1';
          }
      }
      else 
      {
          echo '1';
      }
}
else 
{
    echo '1';
}

?>