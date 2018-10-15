<?php
  session_start();
  include("sesion.php");
?>

<?php 
header('Content-Type: text/html; charset=utf-8');

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET CHARACTER SET utf8");

$query_pais = mysqli_query($mysqli, "SELECT * FROM pais_de_origen");
    echo '<option value="0">[SELECCIONE]</option>';
		while($data_prenda=mysqli_fetch_assoc($query_pais))
            {
                $id_pre=$data_prenda['ID_Pais'];
                $des_pre=$data_prenda['Descripcion_P'];
            ?> 
                  <option value="<?php echo $id_pre ?>"><?php echo $des_pre ?></option>
                  
                 
          <?php  
             }
		 ?>  