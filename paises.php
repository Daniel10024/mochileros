<?php
  session_start();
  include("sesion.php");
?>

<?php 
header('Content-Type: application/json');
 ?>

<?php

$posta = array();
header('Content-Type: text/html; charset=utf-8');

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET CHARACTER SET utf8");

$query_pais = mysqli_query($mysqli, "SELECT * FROM escala");
    while($data_pais=mysqli_fetch_assoc($query_pais))
            {
                $id_idi=$data_pais['ID_ESCALA'];
                $des_idi=$data_pais['ESCALA'];

          $json = array(
            'idp' => $id_idi,
            'pais' => $des_idi
          );
          array_push($posta, $json); 
             }
echo json_encode($posta);
      ?>  