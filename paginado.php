<?php 
	$regporpag = 5;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<header>
		<div class="container">
<!-- ________________________________________aca termina el nav___________________________________________________ -->
			<h1 class="text-center">Credito para todos <span class="label label-default">Clientes</span></h1>
			<?php 
				$query_permisos = mysqli_query($mysqli, "SELECT * FROM permisos_usuario WHERE ID_ROL = $idrol");
		        while($data_permisos=mysqli_fetch_assoc($query_permisos))
		        {
		            $id_permisos=$data_permisos['ID_PERMISO'];
		            if ($id_permisos == 1) {
 				?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<br> <legend></legend>
						<!-- ___________________________________  bucador #ID  ______________________________ -->
<!-- ______________________________________________FILTRAR OIR #ID_______________________________________________ -->
<?php 	$pregunta =  mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1'");
  		$numrows = mysqli_num_rows($pregunta);
  		$cantpag = ceil($numpag = $numrows / $regporpag);
  		if (!isset($_GET['pagi'])) {
  			$pagi = 1;
  		}
  		else {
  			$pagi = $_GET['pagi'];
  		}
  		$sesult = ($pagi - 1)* $regporpag;
?>
		                  	<?php 
		                  	if (!empty($_GET['srhid'])) {
		                  		$srhid = $_GET['srhid'];
		                  		$query_cli = mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1' AND  ID_CLI LIKE $srhid");
		                  		while ($data_cli=mysqli_fetch_assoc($query_cli)) 
								{
								$idcli = $data_cli["ID_CLI"];
								$doccli = $data_cli["ID_DOC"];
								$apcli = $data_cli["APELLIDO_CLI"];
								$nomcli = $data_cli["NOMBRE_CLI"];
								$query_dir = mysqli_query($mysqli, "SELECT * FROM direccion WHERE ID_CLI = $idcli AND ID_TIPO_DIR = '2'");
								while($data_dir=mysqli_fetch_assoc($query_dir))
								{
									$nomdir = $data_dir["NOMBRE_DIR"];
									$altdir = $data_dir["ALTURA_DIR"];
									$query_tel = mysqli_query($mysqli, "SELECT * FROM telefono WHERE ID_CLI = $idcli AND ID_TIPO_TEL = '1'");
									while($data_tel=mysqli_fetch_assoc($query_tel))
									{
										$numtel = $data_tel["NRO_TEL"];
							?>
							<tr id='addr1' data-id="1" class="">
		                            <td data-name="ID"><p name="id1"><?php echo $idcli ;?></p></td>
		                            <td data-name="nom"><p name="nom1"><?php echo $nomcli ;?></p></td>
		                            <td data-name="ape"><p name="ape1"><?php echo $apcli ;?></p></td>
		                            <td data-name="dir"><p name="dir1"><?php echo $nomdir . " - " . $altdir;?></p></td>
		                            <td data-name="tel"><p name="tel1"><?php echo $numtel;?></p></td>
		                            <td data-name="opt" align="center">
									<?php echo '<a href="15ver_cliente.php?id=' . $idcli . '" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'; ?>
									    <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete<?php echo $idcli ?>"><em class="glyphicon glyphicon-trash"></em></a>
		                            </td>
		                        </tr>
<!-- _________________________________________________FILTRAR POR NOMBRE_______________________________________ -->
							<?php  
		                  	}}}}
		                  	elseif (!empty($_GET['srhnombre'])) {
		                  		$srhid = $_GET['srhnombre'];
		                  		$query_cli = mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1' AND  NOMBRE_CLI LIKE '%$srhid%'");
		                  		while ($data_cli=mysqli_fetch_assoc($query_cli)) 
								{
								$idcli = $data_cli["ID_CLI"];
								$doccli = $data_cli["ID_DOC"];
								$apcli = $data_cli["APELLIDO_CLI"];
								$nomcli = $data_cli["NOMBRE_CLI"];
								$query_dir = mysqli_query($mysqli, "SELECT * FROM direccion WHERE ID_CLI = $idcli AND ID_TIPO_DIR = '2'");
								while($data_dir=mysqli_fetch_assoc($query_dir))
								{
									$nomdir = $data_dir["NOMBRE_DIR"];
									$altdir = $data_dir["ALTURA_DIR"];
									$query_tel = mysqli_query($mysqli, "SELECT * FROM telefono WHERE ID_CLI = $idcli AND ID_TIPO_TEL = '1'");
									while($data_tel=mysqli_fetch_assoc($query_tel))
									{
										$numtel = $data_tel["NRO_TEL"];
							?>
							<tr id='addr1' data-id="1" class="">
		                            <td data-name="ID"><p name="id1"><?php echo $idcli ;?></p></td>
		                            <td data-name="nom"><p name="nom1"><?php echo $nomcli ;?></p></td>
		                            <td data-name="ape"><p name="ape1"><?php echo $apcli ;?></p></td>
		                            <td data-name="dir"><p name="dir1"><?php echo $nomdir . " - " . $altdir;?></p></td>
		                            <td data-name="tel"><p name="tel1"><?php echo $numtel;?></p></td>
		                            <td data-name="opt" align="center">
									<?php echo '<a href="15ver_cliente.php?id=' . $idcli . '" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'; ?>
									    <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete<?php echo $idcli ?>"><em class="glyphicon glyphicon-trash"></em></a>
		                            </td>
		                        </tr>
<!-- _______________________________________FILTRAR POR APELLIDO__________________________________________________ -->
							<?php  
		                  	}}}}
		                  	elseif (!empty($_GET['srhapellido'])) {
		                  		$srhid = $_GET['srhapellido'];
		                  		$query_cli = mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1' AND  APELLIDO_CLI LIKE '%$srhid%'");
		                  		while ($data_cli=mysqli_fetch_assoc($query_cli)) 
								{
								$idcli = $data_cli["ID_CLI"];
								$doccli = $data_cli["ID_DOC"];
								$apcli = $data_cli["APELLIDO_CLI"];
								$nomcli = $data_cli["NOMBRE_CLI"];
								$query_dir = mysqli_query($mysqli, "SELECT * FROM direccion WHERE ID_CLI = $idcli AND ID_TIPO_DIR = '2'");
								while($data_dir=mysqli_fetch_assoc($query_dir))
								{
									$nomdir = $data_dir["NOMBRE_DIR"];
									$altdir = $data_dir["ALTURA_DIR"];
									$query_tel = mysqli_query($mysqli, "SELECT * FROM telefono WHERE ID_CLI = $idcli AND ID_TIPO_TEL = '1'");
									while($data_tel=mysqli_fetch_assoc($query_tel))
									{
										$numtel = $data_tel["NRO_TEL"];
							?>
							<tr id='addr1' data-id="1" class="">
		                            <td data-name="ID"><p name="id1"><?php echo $idcli ;?></p></td>
		                            <td data-name="nom"><p name="nom1"><?php echo $nomcli ;?></p></td>
		                            <td data-name="ape"><p name="ape1"><?php echo $apcli ;?></p></td>
		                            <td data-name="dir"><p name="dir1"><?php echo $nomdir . " - " . $altdir;?></p></td>
		                            <td data-name="tel"><p name="tel1"><?php echo $numtel;?></p></td>
		                            <td data-name="opt" align="center">
									<?php echo '<a href="15ver_cliente.php?id=' . $idcli . '" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'; ?>
									    <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete<?php echo $idcli ?>"><em class="glyphicon glyphicon-trash"></em></a>
		                            </td>
		                        </tr>
<!-- _______________________________________FILTRAR POR TODO_____________________________________________________ -->
							<?php
		                  	}}}}
		                  	elseif (!empty($_GET['submit'])) {
		                  		$query_cli = mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1'");
		                  		while ($data_cli=mysqli_fetch_assoc($query_cli)) 
								{
								$idcli = $data_cli["ID_CLI"];
								$doccli = $data_cli["ID_DOC"];
								$apcli = $data_cli["APELLIDO_CLI"];
								$nomcli = $data_cli["NOMBRE_CLI"];
								$query_dir = mysqli_query($mysqli, "SELECT * FROM direccion WHERE ID_CLI = $idcli AND ID_TIPO_DIR = '2'");
								while($data_dir=mysqli_fetch_assoc($query_dir))
								{
									$nomdir = $data_dir["NOMBRE_DIR"];
									$altdir = $data_dir["ALTURA_DIR"];
									$query_tel = mysqli_query($mysqli, "SELECT * FROM telefono WHERE ID_CLI = $idcli AND ID_TIPO_TEL = '1'");
									while($data_tel=mysqli_fetch_assoc($query_tel))
									{
										$numtel = $data_tel["NRO_TEL"];
									?>
							<tr id='addr1' data-id="1" class="">
		                            <td data-name="ID"><p name="id1"><?php echo $idcli ;?></p></td>
		                            <td data-name="nom"><p name="nom1"><?php echo $nomcli ;?></p></td>
		                            <td data-name="ape"><p name="ape1"><?php echo $apcli ;?></p></td>
		                            <td data-name="dir"><p name="dir1"><?php echo $nomdir . " - " . $altdir;?></p></td>
		                            <td data-name="tel"><p name="tel1"><?php echo $numtel;?></p></td>
		                            <td data-name="opt" align="center">
									<?php echo '<a href="15ver_cliente.php?id=' . $idcli . '" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'; ?>
									    <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete<?php echo $idcli ?>"><em class="glyphicon glyphicon-trash"></em></a>
		                            </td>
		                        </tr>
<!-- _______________________________________NO FILTRAR UN NADA__________________________________________________ -->
							<?php
		                  	}}}}
		                  	else {
		                  		$pregunta =  mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1'");
		                  		$numrows = mysqli_num_rows($pregunta);
		                  		$cantpag = ceil($numpag = $numrows / $regporpag);
		                  		if (!isset($_GET['pagi'])) {
		                  			$pagi = 1;
		                  		}
		                  		else {
		                  			$pagi = $_GET['pagi'];
		                  		}
		                  		$sesult = ($pagi - 1)* $regporpag;
		                  		$query_cli = mysqli_query($mysqli, "SELECT * FROM cliente WHERE ID_EST_CLI = '1' LIMIT " . $sesult . ',' . $regporpag);
		                  		while ($data_cli=mysqli_fetch_assoc($query_cli)) 
							{
								$idcli = $data_cli["ID_CLI"];
								$doccli = $data_cli["ID_DOC"];
								$apcli = $data_cli["APELLIDO_CLI"];
								$nomcli = $data_cli["NOMBRE_CLI"];
								$query_dir = mysqli_query($mysqli, "SELECT * FROM direccion WHERE ID_CLI = $idcli AND ID_TIPO_DIR = '2'");
								while($data_dir=mysqli_fetch_assoc($query_dir))
								{
									$nomdir = $data_dir["NOMBRE_DIR"];
									$altdir = $data_dir["ALTURA_DIR"];
									$query_tel = mysqli_query($mysqli, "SELECT * FROM telefono WHERE ID_CLI = $idcli AND ID_TIPO_TEL = '1'");
									while($data_tel=mysqli_fetch_assoc($query_tel))
									{
										$numtel = $data_tel["NRO_TEL"];
									?>
		                        <tr id='addr1' data-id="1" class="">
		                            <td data-name="ID"><p name="id1"><?php echo $idcli ;?></p></td>
		                            <td data-name="nom"><p name="nom1"><?php echo $nomcli ;?></p></td>
		                            <td data-name="ape"><p name="ape1"><?php echo $apcli ;?></p></td>
		                            <td data-name="dir"><p name="dir1"><?php echo $nomdir . " - " . $altdir;?></p></td>
		                            <td data-name="tel"><p name="tel1"><?php echo $numtel;?></p></td>
		                            <td data-name="opt" align="center">
									<?php echo '<a href="15ver_cliente.php?id=' . $idcli . '" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'; ?>
									    <a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete<?php echo $idcli ?>"><em class="glyphicon glyphicon-trash"></em></a>
		                            </td>
		                        </tr>
					<!-- ________________________________________________________ -->	
						<?php  }}}} ?>
		                   </tbody>
		                </table>
		              </div>
		              <div class="panel-footer">
		            <section class="hidden-xs">
		                <div class="row">
		                  <div class="col col-xs-4">
		                  </div>
		                  <div class="col col-xs-8">
		                    <ul class="pagination pull-right">
							<?php  		
							for ($pagi=1; $pagi <= $cantpag; $pagi++) { 
		                  			echo '<li class=""><a href="4lista_de_clientes.php?pagi=' . $pagi . '">' . $pagi . '</a></li>';
		                  		}?>  
							</ul>
		                  </div>
		                </div>
		            </section>
		                <section class="visible-xs">
		                <div class="row">
		                  <div class="col col-xs-4">
		                  </div>
		                  <div class="col col-xs-8">
		                    <ul class="pagination pull-right">
							  <?php  		
							for ($pagi=1; $pagi <= $cantpag; $pagi++) { 
		                  			echo '<li class=""><a href="4lista_de_clientes.php?pagi=' . $pagi . '">' . $pagi . '</a></li>';
		                  		}?> 
							</ul>
		                  </div>
		                </div>
		                </section>
		              </div>
		            </div>
				</div>
			</div>
			<?php break;}}; ?>
		</div>
	</header>
	<script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="js/usuarios.js"></script>
</body>
</html>