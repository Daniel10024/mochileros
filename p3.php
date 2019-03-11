<?php
  session_start();
  include("sesion.php");
  $use = $_SESSION["‘ID_user’"];
  $nom = $_SESSION["‘Nombre’"];
  $ape = $_SESSION["‘Apellido’"];
?>


<?php
if(!isset($_SESSION["‘ID_user’"])) {
 header("location: index.html");
} else {
?>

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

 <script type="text/javascript">
    var myvar='<?php echo $use;?>';
</script>

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
    <script src="js/mapa.js"></script>

</head>

<body class="f_PC" onload="startApp()">
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
                              <div id="customBtn" class="2customGPlusSignIn">
                                <button class="btn btn-info btn-block botoncitoBorrable">Iniciar Sesion</button>
                              </div>
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
                                        <?php if ($use ==1): ?>
                                          <a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Salir</a>
                                        <?php endif ?>
                                        <?php if ($use != 1): ?>
                                          <a href="#" onclick="signOut();" class="btn btn-danger btn-block botoncitoBorrable">Cerrar Sesion</a>
                                        <?php endif ?>
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


        <!-- ########################### MAPA ########################### -->
        
        <div class="contenedorMapa">
          <div id="mapaGoogle" width="100%"></div>
            
          
          <!-- <iframe src="https://www.google.com/maps/embed" width="100%" height="515" frameborder="0" style="border:0;" allowfullscreen></iframe> -->
          <div class="row">
            <div class="col-xs-6">
              <button type="button" onclick="puntoAnterior()" class="btn btn-primary botonAntSig">Anterior</button>
            </div>
            <div class="col-xs-6">
              <button type="button" onclick="puntoSiguiente()" class="btn btn-primary botonAntSig boton-siguiente">Siguiente</button>
            </div>
          </div>
        </div>
        

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 id="t_modal" class="modal-title mensajeErrorCoincidencias">Sin coincidencias</h4>
        </div>
        <div class="modal-body">
          <p id="m_modal" class="mensajeErrorCoincidencias">:(</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok!</button>
        </div>
      </div>

    </div>
  </div>


        <div class="marco_escala">
          <div class="row contenedorEscala">
            <div class="col-xs-12 center">
              <!-- <span class="mensajeErrorCoincidencias">Sin coincidencias!</span> -->
              <span class="negrita">
                Escala: 
              </span>
            </div>             
            <div class="col-xs-12 center divDeEscalaInput">
              <input class="form-control center" list="escala" placeholder="Seleccione Pais" id="escalaInput">

                <!--################## ESCALA ###############-->
                <datalist id="escala">
                  <!-- <option data-value="0" value="Global">
                  <option data-value="1" value="America">
                  <option data-value="2" value="Europa">
                  <option data-value="3" value="Africa">
                  <option data-value="4" value="Asia">
                  <option data-value="5" value="Oceania"> -->
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
                  <option data-value="239" value="Zimbabue">
                </datalist> 
              <!-- <input type="text" class="form-control input-sm inputEscala"> -->
            </div> 
          </div>
        </div>
            <div class="row">
            <div class="col-xs-6">
                <strong>Desde:</strong>
                <input class="form-control " required="required" type="date" id="fechaDesde">
            </div>
            <div class="col-xs-6">
                <strong>Hasta:</strong>
                <input class="form-control " required="required" type="date" id="fechaHasta">
            </div>
          </div>
          <br>


          <div class="row">
            <div class="col-xs-6">
                <strong>Idiomas:</strong>
                <input class="form-control " required="required" type="text" list="idioma" id="idiomasInput">

                <!--################## IDIOMAS ###############-->
                <datalist id="idioma">
                  <option data-value="0" value="Afrikáans">
                  <option data-value="1" value="Akan">
                  <option data-value="2" value="Albanés">
                  <option data-value="3" value="Alemán">
                  <option data-value="4" value="Amhárico">
                  <option data-value="5" value="Árabe">
                  <option data-value="6" value="Armenio">
                  <option data-value="7" value="Asamés">
                  <option data-value="8" value="Asirio">
                  <option data-value="9" value="Azerbaiyano">
                  <option data-value="10" value="Badini">
                  <option data-value="11" value="Bambara">
                  <option data-value="12" value="Baskir">
                  <option data-value="13" value="Bengalí">
                  <option data-value="14" value="Bielorruso">
                  <option data-value="15" value="Birmano">
                  <option data-value="16" value="Bisaya">
                  <option data-value="17" value="Bosnio">
                  <option data-value="18" value="Bravanese">
                  <option data-value="19" value="Búlgaro">
                  <option data-value="20" value="Cachemir">
                  <option data-value="21" value="Caldeo">
                  <option data-value="22" value="Camboyano">
                  <option data-value="23" value="Canarés">
                  <option data-value="24" value="Cantonés">
                  <option data-value="25" value="Catalán">
                  <option data-value="26" value="Cebuano">
                  <option data-value="27" value="Chamorro">
                  <option data-value="28" value="Chaozhou">
                  <option data-value="29" value="Chavacano">
                  <option data-value="30" value="Checo">
                  <option data-value="31" value="Chichewa">
                  <option data-value="32" value="Chiluba">
                  <option data-value="33" value="Chin">
                  <option data-value="34" value="Chuukés">
                  <option data-value="35" value="Cingalés">
                  <option data-value="36" value="Cingalés">
                  <option data-value="37" value="Coreano">
                  <option data-value="38" value="Cree">
                  <option data-value="39" value="Criollo haitiano">
                  <option data-value="40" value="Croata">
                  <option data-value="41" value="Dakota">
                  <option data-value="42" value="Danés">
                  <option data-value="43" value="Darí">
                  <option data-value="44" value="Dinka">
                  <option data-value="45" value="Diula">
                  <option data-value="46" value="Dzongkha">
                  <option data-value="47" value="Eslovaco">
                  <option data-value="48" value="Esloveno">
                  <option data-value="49" value="Esloveno">
                  <option data-value="50" value="Español">
                  <option data-value="51" value="Estonio">
                  <option data-value="52" value="Ewé">
                  <option data-value="53" value="Fante">
                  <option data-value="54" value="Farsi">
                  <option data-value="55" value="Feroés">
                  <option data-value="56" value="Finés">
                  <option data-value="57" value="Flamenco">
                  <option data-value="58" value="Francés">
                  <option data-value="59" value="Francés canadiense">
                  <option data-value="60" value="Frisón">
                  <option data-value="61" value="Fujianés">
                  <option data-value="62" value="Fujiano">
                  <option data-value="63" value="Fula">
                  <option data-value="64" value="Fula">
                  <option data-value="65" value="Fulani">
                  <option data-value="66" value="Fuzhou">
                  <option data-value="67" value="Ga">
                  <option data-value="68" value="Gaélico">
                  <option data-value="69" value="Galés">
                  <option data-value="70" value="Gallego">
                  <option data-value="71" value="Ganda">
                  <option data-value="72" value="Georgiano">
                  <option data-value="73" value="Gorani">
                  <option data-value="74" value="Griego">
                  <option data-value="75" value="Guanxi">
                  <option data-value="76" value="Gujarati">
                  <option data-value="77" value="Hakka">
                  <option data-value="78" value="Hassanía">
                  <option data-value="79" value="Hausa">
                  <option data-value="80" value="Hebreo">
                  <option data-value="81" value="Hiligainón">
                  <option data-value="82" value="Hindi">
                  <option data-value="83" value="Hindi de Fiyi">
                  <option data-value="84" value="Hindú">
                  <option data-value="85" value="Hmong">
                  <option data-value="86" value="Holandés">
                  <option data-value="87" value="Húngaro">
                  <option data-value="88" value="Ibanag">
                  <option data-value="89" value="Igbo">
                  <option data-value="90" value="Ilocano">
                  <option data-value="91" value="Ilongo">
                  <option data-value="92" value="Indonesio">
                  <option data-value="93" value="Inglés">
                  <option data-value="94" value="Inuit">
                  <option data-value="95" value="Irlandés">
                  <option data-value="96" value="Islandés">
                  <option data-value="97" value="Italiano">
                  <option data-value="98" value="Jalja">
                  <option data-value="99" value="Japonés">
                  <option data-value="100" value="Javanés">
                  <option data-value="101" value="Jemer">
                  <option data-value="102" value="Kanjobal">
                  <option data-value="103" value="Karen">
                  <option data-value="104" value="Kazajo">
                  <option data-value="105" value="Kikuyu">
                  <option data-value="106" value="Kiñaruanda">
                  <option data-value="107" value="Kirguís">
                  <option data-value="108" value="Kirundi">
                  <option data-value="109" value="Kosovar">
                  <option data-value="110" value="Kotokoli">
                  <option data-value="111" value="Krio">
                  <option data-value="112" value="Kurdo">
                  <option data-value="113" value="Kurmanji">
                  <option data-value="114" value="Lakota">
                  <option data-value="115" value="Laosiano">
                  <option data-value="116" value="Latín">
                  <option data-value="117" value="Letón">
                  <option data-value="118" value="Lingala">
                  <option data-value="119" value="Lituano">
                  <option data-value="120" value="Luganda">
                  <option data-value="121" value="Luo">
                  <option data-value="122" value="Lusoga">
                  <option data-value="123" value="Luxemburgués">
                  <option data-value="124" value="Maay">
                  <option data-value="125" value="Macedonio">
                  <option data-value="126" value="Malayalam">
                  <option data-value="127" value="Malayo">
                  <option data-value="128" value="Maldiviano">
                  <option data-value="129" value="Malgache">
                  <option data-value="130" value="Maltés">
                  <option data-value="131" value="Mandarín">
                  <option data-value="132" value="Mandinga">
                  <option data-value="133" value="Mandingo">
                  <option data-value="134" value="Maorí">
                  <option data-value="135" value="Maratí">
                  <option data-value="136" value="Marshalés">
                  <option data-value="137" value="Mien">
                  <option data-value="138" value="Mirpuri">
                  <option data-value="139" value="Mixteco">
                  <option data-value="140" value="Moldavo">
                  <option data-value="141" value="Mongol">
                  <option data-value="142" value="Napolitano">
                  <option data-value="143" value="Navajo">
                  <option data-value="144" value="Nepalí">
                  <option data-value="145" value="Noruego">
                  <option data-value="146" value="Nuer">
                  <option data-value="147" value="Ojibwa">
                  <option data-value="148" value="Oriya">
                  <option data-value="149" value="Oromo">
                  <option data-value="150" value="Osetio">
                  <option data-value="151" value="Pahari">
                  <option data-value="152" value="Pampango">
                  <option data-value="153" value="Panyabí">
                  <option data-value="154" value="Pashto">
                  <option data-value="155" value="Patois">
                  <option data-value="156" value="Pidgin inglés">
                  <option data-value="157" value="Polaco">
                  <option data-value="158" value="Portugués">
                  <option data-value="159" value="Pothwari">
                  <option data-value="160" value="Putián">
                  <option data-value="161" value="Quechua">
                  <option data-value="162" value="Romanche">
                  <option data-value="163" value="Romaní">
                  <option data-value="164" value="Rumano">
                  <option data-value="165" value="Rundi">
                  <option data-value="166" value="Ruso">
                  <option data-value="167" value="Samoano">
                  <option data-value="168" value="Sango">
                  <option data-value="169" value="Sánscrito">
                  <option data-value="170" value="Serbio">
                  <option data-value="171" value="Sesotho">
                  <option data-value="172" value="Setsuana">
                  <option data-value="173" value="Shangainés">
                  <option data-value="174" value="Shona">
                  <option data-value="175" value="Sichuan">
                  <option data-value="176" value="Siciliano">
                  <option data-value="177" value="Sindhi">
                  <option data-value="178" value="Siswati/suazi">
                  <option data-value="179" value="Somalí">
                  <option data-value="180" value="Sondanés">
                  <option data-value="181" value="Soninké">
                  <option data-value="182" value="Sorani">
                  <option data-value="183" value="Suajili">
                  <option data-value="184" value="Sueco">
                  <option data-value="185" value="Susu">
                  <option data-value="186" value="Sylheti">
                  <option data-value="187" value="Tagalo">
                  <option data-value="188" value="Tailandés">
                  <option data-value="189" value="Taiwanés">
                  <option data-value="190" value="Tamil">
                  <option data-value="191" value="Tayiko">
                  <option data-value="192" value="Telugú">
                  <option data-value="193" value="Tibetano">
                  <option data-value="194" value="Tigriña">
                  <option data-value="195" value="Tongano">
                  <option data-value="196" value="Tsonga">
                  <option data-value="197" value="Turco">
                  <option data-value="198" value="Turcomano">
                  <option data-value="199" value="Ucraniano">
                  <option data-value="200" value="Uigur">
                  <option data-value="201" value="Urdú">
                  <option data-value="202" value="Uzbeco">
                  <option data-value="203" value="Vasco (euskera)">
                  <option data-value="204" value="Venda">
                  <option data-value="205" value="Vietnamita">
                  <option data-value="206" value="Wólof">
                  <option data-value="207" value="Xhosa">
                  <option data-value="208" value="Yakartanés">
                  <option data-value="209" value="Yao">
                  <option data-value="210" value="Yidis">
                  <option data-value="211" value="Yoruba">
                  <option data-value="212" value="Yupik">
                  <option data-value="213" value="Zulú">
                </datalist>
            </div>



            <div class="col-xs-6">
                <strong>Origen:</strong>
                <input class="form-control center" list="paises" placeholder="Seleccione origen" id="paisesInput">
                <!-- <input class="form-control " required="required" type="text" list="paises" id="paisesInput"> -->
                <!--################## ORIGEN ###############-->
                <datalist id="paises">
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
                  <option data-value="239" value="Zimbabue">
                </datalist> 
            </div>
          </div>
          <br> 

      

        <section class="">
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="citas" id="citas" value="1"> 
                <label for="citas">
                  Citas
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="fotos" id="fotos" value="2"> 
                <label for="fotos">
                  Fotos
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="comer" id="comer" value="3"> 
                <label for="comer">
                  Comer
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="bailar" id="bailar" value="4"> 
                <label for="bailar">
                  Bailar
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="deportes" id="deportes" value="5">
                <label for="deportes">
                  Deportes
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="musica" id="musica" value="6">
                <label for="musica">
                  Musica
                </label> 
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="cultura" id="cultura" value="7">
                <label for="cultura">
                  Cultura
                </label> 
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="amigos" id="amigos" value="8">
                <label for="amigos">
                  Amigos
                </label> 
            </div>
          </div>
          <div class="row hidden">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="todos" id="todos" value="9">
                <label for="todos">
                  Todo
                </label> 
            </div>
            <div class="col-xs-6">
              
            </div>
          </div>
        </section>
          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
              <a href="#"><button id="buscar" onclick="buscarViaje()" type="button" class="botonBuscarFondoPantalla btn btn-lg  btn-block btn-success">Realizar Busqueda</button></a>
            </div>
          </div>

        </div>


            <!-- _________________________ventana modal de borrar__________________________ -->
             

                <div class="modal fade" id="delete_punto" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                      <h4 class="modal-title custom_align" id="Heading">Eliminar Viaje</h4>
                  </div>
                     <div class="modal-body">
                   
                      <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>
                   
                    </div>
                    <div class="modal-footer ">
                      <button id="botonsi" type="button" class="btn btn-success botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign row-remove"></span> Si</button>
                      <button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
              
              </div>
               
          </div>
          
            <!-- ________________________________________________________ -->
        


    </header>
    <script
              src="https://code.jquery.com/jquery-3.2.1.min.js"
              integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
              crossorigin="anonymous"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0oZCB95kI3LlHGjXLxhoPYjNvmFYtY1g&callback=initMap"
          async defer></script>

    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

    
    <script src="js/scrips.js"></script>
    <script src="js/buscarViaje.js"></script>
    <script src="js/fancywebsocket.js"></script>
</body>
</html>


<?php } ?>