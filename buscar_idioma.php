<?php
  session_start();
  include("sesion.php");
?>

<?php 
header('Content-Type: text/html; charset=utf-8');

$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET CHARACTER SET utf8");

$query_idioma = mysqli_query($mysqli, "SELECT * FROM idioma_hablado");
    echo '<option value="0">[SELECCIONE]</option>';
		while($data_prenda=mysqli_fetch_assoc($query_idioma))
            {
                $id_pre=$data_prenda['ID_Idioma'];
                $des_pre=$data_prenda['Descripcion_I'];
			?> 
                  <option value="<?php echo $des_pre ?>"><?php echo $des_pre ?></option>
                  
                 
          <?php  
             }
			?>  