 <?php
  session_start();
  include("sesion.php");
?>

<?php
$id_punto = $_POST["id_punto1"];
$delet_intereses = "DELETE FROM le_interesa WHERE ID_PUNTO = '$id_punto'";
$delet_punto = "DELETE FROM punto WHERE ID_PUNTO = '$id_punto'";

      if ($mysqli->query($delet_intereses) === TRUE) 
      {
          if ($mysqli->query($delet_punto) === TRUE) 
          {
              echo 'bien';
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