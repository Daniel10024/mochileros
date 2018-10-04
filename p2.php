

<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];


?>

<?php if ($use == 1) {
  header("location: p1.php");
} ?>

<?php 
$usuario_id = 1;
$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $use");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $idi = $data_cli['Idioma'];
    $pai = $data_cli['Pais'];
    $int = $data_cli['Intereses'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion'];
    }

 ?>

 <?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
</head>
<body class="h">
    <header>
        <div class="container">
          <div class="row">
  <div class="col-sm-12">
<ul class="nav nav-tabs">
  <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>

    <ul class="nav navbar-right">
      <li class="dropdown right">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown">
              <span class="glyphicon glyphicon-th-list glylg"></span> 
          </a>
          
          <ul class="dropdown-menu dropdown-menu-right">
              <li>
                  <div class="navbar-login">
                      <div class="row">
                          <div>
                              <p class="text-center">
                                  <span><img class="cardo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAg5kaJfBJTNlwuPx8r3b6aJ7hEJb5jW9mMXEvbnDdu9aIuiaz" alt="" /></span>
                              </p>
                          </div>
                          <div>
                              <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p2.php" class="btn btn-info btn-block">Mi perfil</a>
                              </p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p4.html" class="btn btn-primary btn-block">Mis viajes</a>
                              </p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <p>
                                  <a href="p7.html" class="btn btn-success btn-block">Contactos</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
              <li class="divider"></li>
              <li>
                  <div class="navbar-login navbar-login-session">
                      <div class="row">
                          <div class="col-lg-12">
                              <p>
                                  <a href="index.html" class="btn btn-danger btn-block">Cerrar Sesion</a>
                              </p>
                          </div>
                      </div>
                  </div>
              </li>
          </ul>
      </li>
  </ul>
  </ul>
  </div>
</div>
<br>
<form action="editar_perfil.php" method="POST" accept-charset="utf-8" class="form" role="form">
        <div class="card">
                <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                <div class="avatar">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAg5kaJfBJTNlwuPx8r3b6aJ7hEJb5jW9mMXEvbnDdu9aIuiaz" alt="" />
                        </div>
                        <div class="col-xs-8">
                            <input type="text" id="nom-form" disabled="" name="nombre" value="<?php echo $nom;?>" class="form-control " placeholder="Nombre"  />
                            <p id="p-nom" class="error"></p>
                        
                            <input type="text" id="ape-form" disabled="" name="apellido" value="<?php echo $ape;?>" class="form-control " placeholder="Apellido"  />
                            <p id="p-nom" class="error"></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Pais</label>
                <input type="text" id="pai-form" disabled="" name="pais" value="<?php echo $pai;?>" class="form-control" placeholder="Pais"  />
                <p id="p-pai" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Edad</label>
                <input type="number" id="eda-form" disabled="" name="edad" value="<?php echo $eda;?>" class="form-control" placeholder="Edad"  />
                <p id="p-eda" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Intereses</label>
                <input type="text" id="int-form" disabled="" name="intereses" value="<?php echo $int;?>" class="form-control" placeholder="Intereses"  />
                <p id="p-int" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Idioma</label>
                <input type="text" id="idi-form" disabled="" name="idioma" value="<?php echo $idi;?>" class="form-control" placeholder="Idioma"  />
                <p id="p-idi" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Contacto</label>
                <input type="text" id="con-form" disabled="" name="contacto" value="<?php echo $con;?>" class="form-control" placeholder="Contacto"  />
                <p id="p-con" class="error"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <label class="licki">Descripcion</label>
                <textarea name="des_form" id="des-form" rows="2" placeholder="Descripcion" disabled class="form-control"><?php echo $des;?></textarea>
                <p id="p-des" class="error"></p>
            </div>
        </div>

        <div class="row">
            <div class="col col-xs-9 ">
                <a href="p1.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
            </div>
            <div class="col col-xs-3">
                  <button id="edit2" type="button" title="Editar" class="btn btn-lg btn-primary btn-create glyphicon glyphicon-pencil "></button>
            </div>
        </div>

        <div class="row hidden" id="btnedit">
            <div class="col-xs-5 col-xs-offset-1">
                  <button id="btn_guardar" class="btn btn-lg btn-primary btn-block signup-btn" type="submit" >
                  <section class="visible-xs">Editar</section>
                  </button>
            </div>
            <div class="col-xs-5 col-md-6">
                  <a href="p2.php"><button type="button" id="atr" class="btn btn-lg  btn-block cancel-btn">Atras</button></a>                       
            </div>
        </div> 
    </form>


    </div>
    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
</body>
</html>

<?php } ?>