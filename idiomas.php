<?php
  session_start();
  include("sesion.php");
?>

<?php 

$query_idioma = mysqli_query($mysqli, "SELECT * FROM idiomas");
    while($data_idioma=mysqli_fetch_assoc($query_idioma))
            {
                $id_idi=$data_idioma['ID_IDIOMA'];
                $des_idi=$data_idioma['IDIOMA'];
      ?> 
                  <option value="<?php echo $id_idi ?>"><?php echo $des_idi ?></option>
                  
                 
          <?php  
             }
      ?> 