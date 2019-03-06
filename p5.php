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
$query_cli = mysqli_query($mysqli, "SELECT * FROM usuario WHERE ID_Usuario = $use");
while ($data_cli=mysqli_fetch_assoc($query_cli)) { 
    $nom = $data_cli['Nombre'];
    $ape = $data_cli['Apellido'];
    $eda = $data_cli['Edad'];
    $pai = $data_cli['Pais'];
    $con = $data_cli['Contacto'];
    $des = $data_cli['Descripcion_U'];
    }
 ?>

<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mochileros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
    <link rel="icon" type="image/png" href="img/logomini.png" />
  
    <meta name="google-signin-client_id" content="1081528677434-oc751ppavto9boc1ap67sae8tbheo2r2.apps.googleusercontent.com">
</head>
<body class="f_PC">
    <header>
        <div class="container" id="cabezalMenu">
<div class="row menuArriba">
  <div class="col-sm-12">
  <ul class="nav nav-tabs">
    <div class="row">
      <div class="col-xs-2">
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/logomini.png" alt="" /></span></a></li>
      </div>
      <div class="col-xs-8">
        
      </div>
      <div class="col-xs-2">
        <ul class="nav navbar-right">
              <li class="dropdown right">
                  <a href="#" class="dropdown-toggle btn btn-link" data-toggle="dropdown" id="botoncitoMenu">
                      <span class="glyphicon glyphicon-th-list glylg"></span> 
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right menucito">
                      <li>
                          <div class="navbar-login">
                              <div class="row">
                                  <div>
                                      <p class="text-center">
                                      <?php 
                                        echo '<span><img class="cardo" alt="chau" src="img/foto/'.$use.'.jpg"/></span>'; 
                                      ?>
                                      </p>
                                  </div>
                                <div>
                                    <p id="user" class="text-center"><strong><?php echo $nom;?> <?php echo $ape;?></strong></p>
                                </div>
                              </div>
                            <?php if ($use == 1) {?>
                              <div class="g-signin2 botonLoginInvitado" data-onsuccess="onSignIn"></div>
                           <?php  }; ?> 
                           <?php if ($use != 1) {?>
                              <div class="row">
                                  <div class="col-sm-12">
                                      <p>
                                          <a href="p2.php" class="btn btn-info btn-block botoncitoBorrable">Mi Perfil</a>
                                      </p>
                                  </div>
                              </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p4.php" class="btn btn-primary btn-block botoncitoBorrable">Mis Viajes</a>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p7.php" class="btn btn-success btn-block botoncitoBorrable">Contactos</a>
                                    </p>
                                </div>
                            </div>
                              <?php   } ?> 
                          </div>
                      </li>
                      <li class="divider"></li>
                      <li>
                          <div class="navbar-login navbar-login-session">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <p>
                                        <a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Cerrar Sesion</a>
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
    </div>
    </ul>
  </div>
</div>
<br>

<!-- </div> -->
          
            <!-- <p class="licki text-center">Marque el lugar del viaje</p> -->
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0;" allowfullscreen></iframe>
<!-- <div class="container"> -->

      <div class="escalaYTitulo">


          <br>
          
          <label>
              Titulo
          </label>
          <input class="form-control center inputTitulo" placeholder="" id="titulo" maxlength="36">

          <br>

          <label>
              Escala
          </label>
          <input class="form-control center inputEscala" list="escala" placeholder="" id="escalaInput">

          <!--################## ESCALA ###############-->
          <datalist id="escala">
            <!-- <option data-value="0" value="Global">
            <option data-value="1" value="America">
            <option data-value="2" value="Europa">
            <option data-value="3" value="Africa">
            <option data-value="4" value="Asia">
            <option data-value="5" value="Oceania"> 
            <option data-value="6" value="Afganistán">
            <option data-value="7" value="Albania">
            <option data-value="8" value="Alemania">
            <option data-value="9" value="Andorra">
            <option data-value="10" value="Angola">
            <option data-value="11" value="Anguilla">
            <option data-value="12" value="Antártida">
            <option data-value="13" value="Antigua y Barbuda">
            <option data-value="14" value="Antillas Holandesas">
            <option data-value="15" value="Arabia Saudí">
            <option data-value="16" value="Argelia">
            <option data-value="17" value="Argentina">
            <option data-value="18" value="Armenia">
            <option data-value="19" value="Aruba">
            <option data-value="20" value="Australia">
            <option data-value="21" value="Austria">
            <option data-value="22" value="Azerbaiyán">
            <option data-value="23" value="Bahamas">
            <option data-value="24" value="Bahrein">
            <option data-value="25" value="Bangladesh">
            <option data-value="26" value="Barbados">
            <option data-value="27" value="Bélgica">
            <option data-value="28" value="Belice">
            <option data-value="29" value="Benin">
            <option data-value="30" value="Bermudas">
            <option data-value="31" value="Bielorrusia">
            <option data-value="32" value="Birmania">
            <option data-value="33" value="Bolivia">
            <option data-value="34" value="Bosnia y Herzegovina">
            <option data-value="35" value="Botswana">
            <option data-value="36" value="Brasil">
            <option data-value="37" value="Brunei">
            <option data-value="38" value="Bulgaria">
            <option data-value="39" value="Burkina Faso">
            <option data-value="40" value="Burundi">
            <option data-value="41" value="Bután">
            <option data-value="42" value="Cabo Verde">
            <option data-value="43" value="Camboya">
            <option data-value="44" value="Camerún">
            <option data-value="45" value="Canadá">
            <option data-value="46" value="Chad">
            <option data-value="47" value="Chile">
            <option data-value="48" value="China">
            <option data-value="49" value="Chipre">
            <option data-value="50" value="Ciudad del Vaticano (Santa Sede)">
            <option data-value="51" value="Colombia">
            <option data-value="52" value="Comores">
            <option data-value="53" value="Congo">
            <option data-value="54" value="Congo, República Democrática del">
            <option data-value="55" value="Corea">
            <option data-value="56" value="Corea del Norte">
            <option data-value="57" value="Costa de Marfíl">
            <option data-value="58" value="Costa Rica">
            <option data-value="59" value="Croacia (Hrvatska)">
            <option data-value="60" value="Cuba">
            <option data-value="61" value="Dinamarca">
            <option data-value="62" value="Djibouti">
            <option data-value="63" value="Dominica">
            <option data-value="64" value="Ecuador">
            <option data-value="65" value="Egipto">
            <option data-value="66" value="El Salvador">
            <option data-value="67" value="Emiratos Árabes Unidos">
            <option data-value="68" value="Eritrea">
            <option data-value="69" value="Eslovenia">
            <option data-value="70" value="España">
            <option data-value="71" value="Estados Unidos">
            <option data-value="72" value="Estonia">
            <option data-value="73" value="Etiopía">
            <option data-value="74" value="Fiji">
            <option data-value="75" value="Filipinas">
            <option data-value="76" value="Finlandia">
            <option data-value="77" value="Francia">
            <option data-value="78" value="Gabón">
            <option data-value="79" value="Gambia">
            <option data-value="80" value="Georgia">
            <option data-value="81" value="Ghana">
            <option data-value="82" value="Gibraltar">
            <option data-value="83" value="Granada">
            <option data-value="84" value="Grecia">
            <option data-value="85" value="Groenlandia">
            <option data-value="86" value="Guadalupe">
            <option data-value="87" value="Guam">
            <option data-value="88" value="Guatemala">
            <option data-value="89" value="Guayana">
            <option data-value="90" value="Guayana Francesa">
            <option data-value="91" value="Guinea">
            <option data-value="92" value="Guinea Ecuatorial">
            <option data-value="93" value="Guinea-Bissau">
            <option data-value="94" value="Haití">
            <option data-value="95" value="Honduras">
            <option data-value="96" value="Hungría">
            <option data-value="97" value="India">
            <option data-value="98" value="Indonesia">
            <option data-value="99" value="Irak">
            <option data-value="100" value="Irán">
            <option data-value="101" value="Irlanda">
            <option data-value="102" value="Isla Bouvet">
            <option data-value="103" value="Isla de Christmas">
            <option data-value="104" value="Islandia">
            <option data-value="105" value="Islas Caimán">
            <option data-value="106" value="Islas Cook">
            <option data-value="107" value="Islas de Cocos o Keeling">
            <option data-value="108" value="Islas Faroe">
            <option data-value="109" value="Islas Heard y McDonald">
            <option data-value="110" value="Islas Malvinas">
            <option data-value="111" value="Islas Marianas del Norte">
            <option data-value="112" value="Islas Marshall">
            <option data-value="113" value="Islas menores de Estados Unidos">
            <option data-value="114" value="Islas Palau">
            <option data-value="115" value="Islas Salomón">
            <option data-value="116" value="Islas Svalbard y Jan Mayen">
            <option data-value="117" value="Islas Tokelau">
            <option data-value="118" value="Islas Turks y Caicos">
            <option data-value="119" value="Islas Vírgenes (EEUU)">
            <option data-value="120" value="Islas Vírgenes (Reino Unido)">
            <option data-value="121" value="Islas Wallis y Futuna">
            <option data-value="122" value="Israel">
            <option data-value="123" value="Italia">
            <option data-value="124" value="Jamaica">
            <option data-value="125" value="Japón">
            <option data-value="126" value="Jordania">
            <option data-value="127" value="Kazajistán">
            <option data-value="128" value="Kenia">
            <option data-value="129" value="Kirguizistán">
            <option data-value="130" value="Kiribati">
            <option data-value="131" value="Kuwait">
            <option data-value="132" value="Laos">
            <option data-value="133" value="Lesotho">
            <option data-value="134" value="Letonia">
            <option data-value="135" value="Líbano">
            <option data-value="136" value="Liberia">
            <option data-value="137" value="Libia">
            <option data-value="138" value="Liechtenstein">
            <option data-value="139" value="Lituania">
            <option data-value="140" value="Luxemburgo">
            <option data-value="141" value="Macedonia, Ex-República Yugoslava de">
            <option data-value="142" value="Madagascar">
            <option data-value="143" value="Malasia">
            <option data-value="144" value="Malawi">
            <option data-value="145" value="Maldivas">
            <option data-value="146" value="Malí">
            <option data-value="147" value="Malta">
            <option data-value="148" value="Marruecos">
            <option data-value="149" value="Martinica">
            <option data-value="150" value="Mauricio">
            <option data-value="151" value="Mauritania">
            <option data-value="152" value="Mayotte">
            <option data-value="153" value="México">
            <option data-value="154" value="Micronesia">
            <option data-value="155" value="Moldavia">
            <option data-value="156" value="Mónaco">
            <option data-value="157" value="Mongolia">
            <option data-value="158" value="Montserrat">
            <option data-value="159" value="Mozambique">
            <option data-value="160" value="Namibia">
            <option data-value="161" value="Nauru">
            <option data-value="162" value="Nepal">
            <option data-value="163" value="Nicaragua">
            <option data-value="164" value="Níger">
            <option data-value="165" value="Nigeria">
            <option data-value="166" value="Niue">
            <option data-value="167" value="Norfolk">
            <option data-value="168" value="Noruega">
            <option data-value="169" value="Nueva Caledonia">
            <option data-value="170" value="Nueva Zelanda">
            <option data-value="171" value="Omán">
            <option data-value="172" value="Países Bajos">
            <option data-value="173" value="Panamá">
            <option data-value="174" value="Papúa Nueva Guinea">
            <option data-value="175" value="Paquistán">
            <option data-value="176" value="Paraguay">
            <option data-value="177" value="Perú">
            <option data-value="178" value="Pitcairn">
            <option data-value="179" value="Polinesia Francesa">
            <option data-value="180" value="Polonia">
            <option data-value="181" value="Portugal">
            <option data-value="182" value="Puerto Rico">
            <option data-value="183" value="Qatar">
            <option data-value="184" value="Reino Unido">
            <option data-value="185" value="República Centroafricana">
            <option data-value="186" value="República Checa">
            <option data-value="187" value="República de Sudáfrica">
            <option data-value="188" value="República Dominicana">
            <option data-value="189" value="República Eslovaca">
            <option data-value="190" value="Reunión">
            <option data-value="191" value="Ruanda">
            <option data-value="192" value="Rumania">
            <option data-value="193" value="Rusia">
            <option data-value="194" value="Sahara Occidental">
            <option data-value="195" value="Saint Kitts y Nevis">
            <option data-value="196" value="Samoa">
            <option data-value="197" value="Samoa Americana">
            <option data-value="198" value="San Marino">
            <option data-value="199" value="San Vicente y Granadinas">
            <option data-value="200" value="Santa Helena">
            <option data-value="201" value="Santa Lucía">
            <option data-value="202" value="Santo Tomé y Príncipe">
            <option data-value="203" value="Senegal">
            <option data-value="204" value="Seychelles">
            <option data-value="205" value="Sierra Leona">
            <option data-value="206" value="Singapur">
            <option data-value="207" value="Siria">
            <option data-value="208" value="Somalia">
            <option data-value="209" value="Sri Lanka">
            <option data-value="210" value="St Pierre y Miquelon">
            <option data-value="211" value="Suazilandia">
            <option data-value="212" value="Sudán">
            <option data-value="213" value="Suecia">
            <option data-value="214" value="Suiza">
            <option data-value="215" value="Surinam">
            <option data-value="216" value="Tailandia">
            <option data-value="217" value="Taiwán">
            <option data-value="218" value="Tanzania">
            <option data-value="219" value="Tayikistán">
            <option data-value="220" value="Territorios franceses del Sur">
            <option data-value="221" value="Timor Oriental">
            <option data-value="222" value="Togo">
            <option data-value="223" value="Tonga">
            <option data-value="224" value="Trinidad y Tobago">
            <option data-value="225" value="Túnez">
            <option data-value="226" value="Turkmenistán">
            <option data-value="227" value="Turquía">
            <option data-value="228" value="Tuvalu">
            <option data-value="229" value="Ucrania">
            <option data-value="230" value="Uganda">
            <option data-value="231" value="Uruguay">
            <option data-value="232" value="Uzbekistán">
            <option data-value="233" value="Vanuatu">
            <option data-value="234" value="Venezuela">
            <option data-value="235" value="Vietnam">
            <option data-value="236" value="Yemen">
            <option data-value="237" value="Yugoslavia">
            <option data-value="238" value="Zambia">
            <option data-value="239" value="Zimbabue">-->
          </datalist> 

      </div>

      <div class="row">
        <div class="col-xs-6">
          <label class="licki" for="desde">Fecha de LLegada</label>
          <input id="desde" ="" class="form-control" type="date">
        </div>
        <div class="col-xs-6">
          <label class="licki" for="hasta">Fecha de Partida</label>
          <input id="hasta" ="" class="form-control" type="date">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-6">
          <label class="licki" for="desde">Intereses</label>


      <div class="dropdown dropdown-large">
        <button class="btn dropdown-toggle form-control" id="dropdownMenu1" data-toggle="dropdown">Intereses <span class="caret"></span></button>
        <ul class="dropdown-menu dropdown-menu-large row">
          <li class="col-xs-12">
            <ul>
              <li class="dropdown-header">Intereses</li>
              <li><div class="row">
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                    <label for="op1" class=""><input type="checkbox" id="op1" class="big-checkbox" value="">Esquiar</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                     <label for="op2" class=""><input type="checkbox" id="op2" class="big-checkbox"  value="">Volar</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                  <div class="checkbox">
                     <label for="op5" class=""><input type="checkbox" id="op5" class="big-checkbox"  value="">Fiesta Nocturna</label>
                  </div>
                </div>
              </div></li>
              <li role="separator" class="divider hidden-xs"></li>
              <li><div class="row">
                <div class="col-xs-12 col-sm-6">
                  <div class="checkbox">
                    <label for="op3" class=""><input type="checkbox" id="op3" class="big-checkbox" value="">Capturar Pokemons</label>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                  <div class="checkbox">
                     <label for="op4" class=""><input type="checkbox" id="op4" class="big-checkbox"  value="">Otros</label>
                  </div>
                </div>
              </div></li>
            </ul>
          </li>
        </ul>
      </div>

        </div>
        <div class="col-xs-6">
          <label class="licki" for="desde"></label>
          <button id="atras" type="submit" class="btn btn-lg  btn-block btn-primary">
            <section class="hidden-xs">Agregar Punto</section>
            <section class="visible-xs">Mas</section> 
          </button>
        </div>
      </div> 
<br>

        <div class="row">
          <div class="col-xs-12">
            <button id="atras" type="submit" class="btn btn-lg  btn-block btn-success">Agregar Viaje</button>
          </div>
        </div>
         <div class="row">
          <div class="col col-xs-12 ">
            <a href="p4.php"><button id="atras" type="button" class="btn btn-lg  btn-block cancel-btn">Atras</button></a> 
          </div>
        </div>

      </div>
    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>

    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    <script src="js/scrips.js"></script>
    <script src="js/fancywebsocket.js"></script>
</body>
</html>