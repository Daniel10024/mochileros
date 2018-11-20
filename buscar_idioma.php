<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
?>

<?php 
header('Content-Type: text/html; charset=utf-8');
$mysqli->query("SET NAMES 'utf8'");
$mysqli->query("SET CHARACTER SET utf8");
$query_habla = mysqli_query($mysqli, "SELECT * FROM habla WHERE ID_Usuario = $use");
while($row=mysqli_fetch_assoc($query_habla))
      {
        $habla=$row['ID_IDIOMA'];
        
      }
echo '<option value=""><?php echo $habla ?></option>';      
$query_prenda = mysqli_query($mysqli, "SELECT * FROM idiomas");

		while($data_prenda=mysqli_fetch_assoc($query_prenda))
            {
                $id_pre=$data_prenda['ID_IDIOMA'];
                $des_pre=$data_prenda['IDIOMA'];
            ?> 
                  <option value="<?php echo $id_pre ?>"><?php echo $des_pre ?></option>
                  
                 
          <?php  
             }
		 ?>  

<?php 




