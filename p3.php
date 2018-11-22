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



        <div class="contenedorMapa">
          <iframe src="https://www.google.com/maps/embed" width="100%" height="315" frameborder="0" style="border:0;" allowfullscreen></iframe>
          <div class="row">
            <div class="col-xs-6">
              <button type="button" class="btn btn-primary botonAntSig">Anterior</button>
            </div>
            <div class="col-xs-6">
              <button type="button" class="btn btn-primary botonAntSig boton-siguiente">Siguiente</button>
            </div>
          </div>
        </div>
        
        <div class="marco_escala">
          <div class="row contenedorEscala">
            <div class="col-xs-12 center">
              <span class="negrita">
                Escala: 
              </span>
            </div> 


            
            <div class="col-xs-12 center divDeEscalaInput">
              <input class="form-control center" list="escala" placeholder="Global/Continente/Pais" id="escalaInput">
                <datalist id="escala">
                  <option data-value="1" value="Global">
                  <option data-value="2" value="America">
                  <option data-value="3" value="Europa">
                  <option data-value="4" value="Africa">
                  <option data-value="5" value="Asia">
                  <option data-value="6" value="Oceania">
                  <option data-value="7" value="Afganistán">
                  <option data-value="8" value="Albania">
                  <option data-value="9" value="Alemania">
                  <option data-value="10" value="Andorra">
                  <option data-value="11" value="Angola">
                  <option data-value="12" value="Anguilla">
                  <option data-value="13" value="Antártida">
                  <option data-value="14" value="Antigua y Barbuda">
                  <option data-value="15" value="Antillas Holandesas">
                  <option data-value="16" value="Arabia Saudí">
                  <option data-value="17" value="Argelia">
                  <option data-value="18" value="Argentina">
                  <option data-value="19" value="Armenia">
                  <option data-value="20" value="Aruba">
                  <option data-value="21" value="Australia">
                  <option data-value="22" value="Austria">
                  <option data-value="23" value="Azerbaiyán">
                  <option data-value="24" value="Bahamas">
                  <option data-value="25" value="Bahrein">
                  <option data-value="26" value="Bangladesh">
                  <option data-value="27" value="Barbados">
                  <option data-value="28" value="Bélgica">
                  <option data-value="29" value="Belice">
                  <option data-value="30" value="Benin">
                  <option data-value="31" value="Bermudas">
                  <option data-value="32" value="Bielorrusia">
                  <option data-value="33" value="Birmania">
                  <option data-value="34" value="Bolivia">
                  <option data-value="35" value="Bosnia y Herzegovina">
                  <option data-value="36" value="Botswana">
                  <option data-value="37" value="Brasil">
                  <option data-value="38" value="Brunei">
                  <option data-value="39" value="Bulgaria">
                  <option data-value="40" value="Burkina Faso">
                  <option data-value="41" value="Burundi">
                  <option data-value="42" value="Bután">
                  <option data-value="43" value="Cabo Verde">
                  <option data-value="44" value="Camboya">
                  <option data-value="45" value="Camerún">
                  <option data-value="46" value="Canadá">
                  <option data-value="47" value="Chad">
                  <option data-value="48" value="Chile">
                  <option data-value="49" value="China">
                  <option data-value="50" value="Chipre">
                  <option data-value="51" value="Ciudad del Vaticano (Santa Sede)">
                  <option data-value="52" value="Colombia">
                  <option data-value="53" value="Comores">
                  <option data-value="54" value="Congo">
                  <option data-value="55" value="Congo, República Democrática del">
                  <option data-value="56" value="Corea">
                  <option data-value="57" value="Corea del Norte">
                  <option data-value="58" value="Costa de Marfíl">
                  <option data-value="59" value="Costa Rica">
                  <option data-value="60" value="Croacia (Hrvatska)">
                  <option data-value="61" value="Cuba">
                  <option data-value="62" value="Dinamarca">
                  <option data-value="63" value="Djibouti">
                  <option data-value="64" value="Dominica">
                  <option data-value="65" value="Ecuador">
                  <option data-value="66" value="Egipto">
                  <option data-value="67" value="El Salvador">
                  <option data-value="68" value="Emiratos Árabes Unidos">
                  <option data-value="69" value="Eritrea">
                  <option data-value="70" value="Eslovenia">
                  <option data-value="71" value="España">
                  <option data-value="72" value="Estados Unidos">
                  <option data-value="73" value="Estonia">
                  <option data-value="74" value="Etiopía">
                  <option data-value="75" value="Fiji">
                  <option data-value="76" value="Filipinas">
                  <option data-value="77" value="Finlandia">
                  <option data-value="78" value="Francia">
                  <option data-value="79" value="Gabón">
                  <option data-value="80" value="Gambia">
                  <option data-value="81" value="Georgia">
                  <option data-value="82" value="Ghana">
                  <option data-value="83" value="Gibraltar">
                  <option data-value="84" value="Granada">
                  <option data-value="85" value="Grecia">
                  <option data-value="86" value="Groenlandia">
                  <option data-value="87" value="Guadalupe">
                  <option data-value="88" value="Guam">
                  <option data-value="89" value="Guatemala">
                  <option data-value="90" value="Guayana">
                  <option data-value="91" value="Guayana Francesa">
                  <option data-value="92" value="Guinea">
                  <option data-value="93" value="Guinea Ecuatorial">
                  <option data-value="94" value="Guinea-Bissau">
                  <option data-value="95" value="Haití">
                  <option data-value="96" value="Honduras">
                  <option data-value="97" value="Hungría">
                  <option data-value="98" value="India">
                  <option data-value="99" value="Indonesia">
                  <option data-value="100" value="Irak">
                  <option data-value="101" value="Irán">
                  <option data-value="102" value="Irlanda">
                  <option data-value="103" value="Isla Bouvet">
                  <option data-value="104" value="Isla de Christmas">
                  <option data-value="105" value="Islandia">
                  <option data-value="106" value="Islas Caimán">
                  <option data-value="107" value="Islas Cook">
                  <option data-value="108" value="Islas de Cocos o Keeling">
                  <option data-value="109" value="Islas Faroe">
                  <option data-value="110" value="Islas Heard y McDonald">
                  <option data-value="111" value="Islas Malvinas">
                  <option data-value="112" value="Islas Marianas del Norte">
                  <option data-value="113" value="Islas Marshall">
                  <option data-value="114" value="Islas menores de Estados Unidos">
                  <option data-value="115" value="Islas Palau">
                  <option data-value="116" value="Islas Salomón">
                  <option data-value="117" value="Islas Svalbard y Jan Mayen">
                  <option data-value="118" value="Islas Tokelau">
                  <option data-value="119" value="Islas Turks y Caicos">
                  <option data-value="120" value="Islas Vírgenes (EEUU)">
                  <option data-value="121" value="Islas Vírgenes (Reino Unido)">
                  <option data-value="122" value="Islas Wallis y Futuna">
                  <option data-value="123" value="Israel">
                  <option data-value="124" value="Italia">
                  <option data-value="125" value="Jamaica">
                  <option data-value="126" value="Japón">
                  <option data-value="127" value="Jordania">
                  <option data-value="128" value="Kazajistán">
                  <option data-value="129" value="Kenia">
                  <option data-value="130" value="Kirguizistán">
                  <option data-value="131" value="Kiribati">
                  <option data-value="132" value="Kuwait">
                  <option data-value="133" value="Laos">
                  <option data-value="134" value="Lesotho">
                  <option data-value="135" value="Letonia">
                  <option data-value="136" value="Líbano">
                  <option data-value="137" value="Liberia">
                  <option data-value="138" value="Libia">
                  <option data-value="139" value="Liechtenstein">
                  <option data-value="140" value="Lituania">
                  <option data-value="141" value="Luxemburgo">
                  <option data-value="142" value="Macedonia, Ex-República Yugoslava de">
                  <option data-value="143" value="Madagascar">
                  <option data-value="144" value="Malasia">
                  <option data-value="145" value="Malawi">
                  <option data-value="146" value="Maldivas">
                  <option data-value="147" value="Malí">
                  <option data-value="148" value="Malta">
                  <option data-value="149" value="Marruecos">
                  <option data-value="150" value="Martinica">
                  <option data-value="151" value="Mauricio">
                  <option data-value="152" value="Mauritania">
                  <option data-value="153" value="Mayotte">
                  <option data-value="154" value="México">
                  <option data-value="155" value="Micronesia">
                  <option data-value="156" value="Moldavia">
                  <option data-value="157" value="Mónaco">
                  <option data-value="158" value="Mongolia">
                  <option data-value="159" value="Montserrat">
                  <option data-value="160" value="Mozambique">
                  <option data-value="161" value="Namibia">
                  <option data-value="162" value="Nauru">
                  <option data-value="163" value="Nepal">
                  <option data-value="164" value="Nicaragua">
                  <option data-value="165" value="Níger">
                  <option data-value="166" value="Nigeria">
                  <option data-value="167" value="Niue">
                  <option data-value="168" value="Norfolk">
                  <option data-value="169" value="Noruega">
                  <option data-value="170" value="Nueva Caledonia">
                  <option data-value="171" value="Nueva Zelanda">
                  <option data-value="172" value="Omán">
                  <option data-value="173" value="Países Bajos">
                  <option data-value="174" value="Panamá">
                  <option data-value="175" value="Papúa Nueva Guinea">
                  <option data-value="176" value="Paquistán">
                  <option data-value="177" value="Paraguay">
                  <option data-value="178" value="Perú">
                  <option data-value="179" value="Pitcairn">
                  <option data-value="180" value="Polinesia Francesa">
                  <option data-value="181" value="Polonia">
                  <option data-value="182" value="Portugal">
                  <option data-value="183" value="Puerto Rico">
                  <option data-value="184" value="Qatar">
                  <option data-value="185" value="Reino Unido">
                  <option data-value="186" value="República Centroafricana">
                  <option data-value="187" value="República Checa">
                  <option data-value="188" value="República de Sudáfrica">
                  <option data-value="189" value="República Dominicana">
                  <option data-value="190" value="República Eslovaca">
                  <option data-value="191" value="Reunión">
                  <option data-value="192" value="Ruanda">
                  <option data-value="193" value="Rumania">
                  <option data-value="194" value="Rusia">
                  <option data-value="195" value="Sahara Occidental">
                  <option data-value="196" value="Saint Kitts y Nevis">
                  <option data-value="197" value="Samoa">
                  <option data-value="198" value="Samoa Americana">
                  <option data-value="199" value="San Marino">
                  <option data-value="200" value="San Vicente y Granadinas">
                  <option data-value="201" value="Santa Helena">
                  <option data-value="202" value="Santa Lucía">
                  <option data-value="203" value="Santo Tomé y Príncipe">
                  <option data-value="204" value="Senegal">
                  <option data-value="205" value="Seychelles">
                  <option data-value="206" value="Sierra Leona">
                  <option data-value="207" value="Singapur">
                  <option data-value="208" value="Siria">
                  <option data-value="209" value="Somalia">
                  <option data-value="210" value="Sri Lanka">
                  <option data-value="211" value="St Pierre y Miquelon">
                  <option data-value="212" value="Suazilandia">
                  <option data-value="213" value="Sudán">
                  <option data-value="214" value="Suecia">
                  <option data-value="215" value="Suiza">
                  <option data-value="216" value="Surinam">
                  <option data-value="217" value="Tailandia">
                  <option data-value="218" value="Taiwán">
                  <option data-value="219" value="Tanzania">
                  <option data-value="220" value="Tayikistán">
                  <option data-value="221" value="Territorios franceses del Sur">
                  <option data-value="222" value="Timor Oriental">
                  <option data-value="223" value="Togo">
                  <option data-value="224" value="Tonga">
                  <option data-value="225" value="Trinidad y Tobago">
                  <option data-value="226" value="Túnez">
                  <option data-value="227" value="Turkmenistán">
                  <option data-value="228" value="Turquía">
                  <option data-value="229" value="Tuvalu">
                  <option data-value="230" value="Ucrania">
                  <option data-value="231" value="Uganda">
                  <option data-value="232" value="Uruguay">
                  <option data-value="233" value="Uzbekistán">
                  <option data-value="234" value="Vanuatu">
                  <option data-value="235" value="Venezuela">
                  <option data-value="236" value="Vietnam">
                  <option data-value="237" value="Yemen">
                  <option data-value="238" value="Yugoslavia">
                  <option data-value="239" value="Zambia">
                  <option data-value="240" value="Zimbabue">
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
                <input class="form-control " required="required" type="text" list="lenguajes" id="idiomasInput">
                <datalist id="lenguajes">
                  <option value="Afrikáans">
                  <option value="Akan">
                  <option value="Albanés">
                  <option value="Alemán">
                  <option value="Amhárico">
                  <option value="Árabe">
                  <option value="Armenio">
                  <option value="Asamés">
                  <option value="Asirio">
                  <option value="Azerbaiyano">
                  <option value="Badini">
                  <option value="Bambara">
                  <option value="Baskir">
                  <option value="Bengalí">
                  <option value="Bielorruso">
                  <option value="Birmano">
                  <option value="Bisaya">
                  <option value="Bosnio">
                  <option value="Bravanese">
                  <option value="Búlgaro">
                  <option value="Cachemir">
                  <option value="Caldeo">
                  <option value="Camboyano">
                  <option value="Canarés">
                  <option value="Cantonés">
                  <option value="Catalán">
                  <option value="Cebuano">
                  <option value="Chamorro">
                  <option value="Chaozhou">
                  <option value="Chavacano">
                  <option value="Checo">
                  <option value="Chichewa">
                  <option value="Chiluba">
                  <option value="Chin">
                  <option value="Chuukés">
                  <option value="Cingalés">
                  <option value="Cingalés">
                  <option value="Coreano">
                  <option value="Cree">
                  <option value="Criollo"> haitiano
                  <option value="Croata">
                  <option value="Dakota">
                  <option value="Danés">
                  <option value="Darí">
                  <option value="Dinka">
                  <option value="Diula">
                  <option value="Dzongkha">
                  <option value="Eslovaco">
                  <option value="Esloveno">
                  <option value="Esloveno">
                  <option value="Español">
                  <option value="Estonio">
                  <option value="Ewé">
                  <option value="Fante">
                  <option value="Farsi">
                  <option value="Feroés">
                  <option value="Finés">
                  <option value="Flamenco">
                  <option value="Francés">
                  <option value="Francés"> canadiense
                  <option value="Frisón">
                  <option value="Fujianés">
                  <option value="Fujiano">
                  <option value="Fula">
                  <option value="Fula">
                  <option value="Fulani">
                  <option value="Fuzhou">
                  <option value="Ga">
                  <option value="Gaélico">
                  <option value="Galés">
                  <option value="Gallego">
                  <option value="Ganda">
                  <option value="Georgiano">
                  <option value="Gorani">
                  <option value="Griego">
                  <option value="Guanxi">
                  <option value="Gujarati">
                  <option value="Hakka">
                  <option value="Hassanía">
                  <option value="Hausa">
                  <option value="Hebreo">
                  <option value="Hiligainón">
                  <option value="Hindi">
                  <option value="Hindi"> de Fiyi
                  <option value="Hindú">
                  <option value="Hmong">
                  <option value="Holandés">
                  <option value="Húngaro">
                  <option value="Ibanag">
                  <option value="Igbo">
                  <option value="Ilocano">
                  <option value="Ilongo">
                  <option value="Indonesio">
                  <option value="Inglés">
                  <option value="Inuit">
                  <option value="Irlandés">
                  <option value="Islandés">
                  <option value="Italiano">
                  <option value="Jalja">
                  <option value="Japonés">
                  <option value="Javanés">
                  <option value="Jemer">
                  <option value="Kanjobal">
                  <option value="Karen">
                  <option value="Kazajo">
                  <option value="Kikuyu">
                  <option value="Kiñaruanda">
                  <option value="Kirguís">
                  <option value="Kirundi">
                  <option value="Kosovar">
                  <option value="Kotokoli">
                  <option value="Krio">
                  <option value="Kurdo">
                  <option value="Kurmanji">
                  <option value="Lakota">
                  <option value="Laosiano">
                  <option value="Latín">
                  <option value="Letón">
                  <option value="Lingala">
                  <option value="Lituano">
                  <option value="Luganda">
                  <option value="Luo">
                  <option value="Lusoga">
                  <option value="Luxemburgués">
                  <option value="Maay">
                  <option value="Macedonio">
                  <option value="Malayalam">
                  <option value="Malayo">
                  <option value="Maldiviano">
                  <option value="Malgache">
                  <option value="Maltés">
                  <option value="Mandarín">
                  <option value="Mandinga">
                  <option value="Mandingo">
                  <option value="Maorí">
                  <option value="Maratí">
                  <option value="Marshalés">
                  <option value="Mien">
                  <option value="Mirpuri">
                  <option value="Mixteco">
                  <option value="Moldavo">
                  <option value="Mongol">
                  <option value="Napolitano">
                  <option value="Navajo">
                  <option value="Nepalí">
                  <option value="Noruego">
                  <option value="Nuer">
                  <option value="Ojibwa">
                  <option value="Oriya">
                  <option value="Oromo">
                  <option value="Osetio">
                  <option value="Pahari">
                  <option value="Pampango">
                  <option value="Panyabí">
                  <option value="Pashto">
                  <option value="Patois">
                  <option value="Pidgin"> inglés
                  <option value="Polaco">
                  <option value="Portugués">
                  <option value="Pothwari">
                  <option value="Putián">
                  <option value="Quechua">
                  <option value="Romanche">
                  <option value="Romaní">
                  <option value="Rumano">
                  <option value="Rundi">
                  <option value="Ruso">
                  <option value="Samoano">
                  <option value="Sango">
                  <option value="Sánscrito">
                  <option value="Serbio">
                  <option value="Sesotho">
                  <option value="Setsuana">
                  <option value="Shangainés">
                  <option value="Shona">
                  <option value="Sichuan">
                  <option value="Siciliano">
                  <option value="Sindhi">
                  <option value="Siswati">/suazi
                  <option value="Somalí">
                  <option value="Sondanés">
                  <option value="Soninké">
                  <option value="Sorani">
                  <option value="Suajili">
                  <option value="Sueco">
                  <option value="Susu">
                  <option value="Sylheti">
                  <option value="Tagalo">
                  <option value="Tailandés">
                  <option value="Taiwanés">
                  <option value="Tamil">
                  <option value="Tayiko">
                  <option value="Telugú">
                  <option value="Tibetano">
                  <option value="Tigriña">
                  <option value="Tongano">
                  <option value="Tsonga">
                  <option value="Turco">
                  <option value="Turcomano">
                  <option value="Ucraniano">
                  <option value="Uigur">
                  <option value="Urdú">
                  <option value="Uzbeco">
                  <option value="Vasco"> (euskera)
                  <option value="Venda">
                  <option value="Vietnamita">
                  <option value="Wólof">
                  <option value="Xhosa">
                  <option value="Yakartanés">
                  <option value="Yao">
                  <option value="Yidis">
                  <option value="Yoruba">
                  <option value="Yupik">
                  <option value="Zulú">
                </datalist>
            </div>
            <div class="col-xs-6">
                <strong>Origen:</strong>
                <input class="form-control " required="required" type="text" list="paises" id="paisesInput">
                <datalist id="paises">
                  <option value="Todos">
                  <option value="Afganistán">
                  <option value="Albania">
                  <option value="Alemania">
                  <option value="Andorra">
                  <option value="Angola">
                  <option value="Anguilla">
                  <option value="Antártida">
                  <option value="Antigua y Barbuda">
                  <option value="Antillas Holandesas">
                  <option value="Arabia Saudí">
                  <option value="Argelia">
                  <option value="Argentina">
                  <option value="Armenia">
                  <option value="Aruba">
                  <option value="Australia">
                  <option value="Austria">
                  <option value="Azerbaiyán">
                  <option value="Bahamas">
                  <option value="Bahrein">
                  <option value="Bangladesh">
                  <option value="Barbados">
                  <option value="Bélgica">
                  <option value="Belice">
                  <option value="Benin">
                  <option value="Bermudas">
                  <option value="Bielorrusia">
                  <option value="Birmania">
                  <option value="Bolivia">
                  <option value="Bosnia y Herzegovina">
                  <option value="Botswana">
                  <option value="Brasil">
                  <option value="Brunei">
                  <option value="Bulgaria">
                  <option value="Burkina Faso">
                  <option value="Burundi">
                  <option value="Bután">
                  <option value="Cabo Verde">
                  <option value="Camboya">
                  <option value="Camerún">
                  <option value="Canadá">
                  <option value="Chad">
                  <option value="Chile">
                  <option value="China">
                  <option value="Chipre">
                  <option value="Ciudad del Vaticano (Santa Sede)">
                  <option value="Colombia">
                  <option value="Comores">
                  <option value="Congo">
                  <option value="Congo, República Democrática del">
                  <option value="Corea">
                  <option value="Corea del Norte">
                  <option value="Costa de Marfíl">
                  <option value="Costa Rica">
                  <option value="Croacia (Hrvatska)">
                  <option value="Cuba">
                  <option value="Dinamarca">
                  <option value="Djibouti">
                  <option value="Dominica">
                  <option value="Ecuador">
                  <option value="Egipto">
                  <option value="El Salvador">
                  <option value="Emiratos Árabes Unidos">
                  <option value="Eritrea">
                  <option value="Eslovenia">
                  <option value="España">
                  <option value="Estados Unidos">
                  <option value="Estonia">
                  <option value="Etiopía">
                  <option value="Fiji">
                  <option value="Filipinas">
                  <option value="Finlandia">
                  <option value="Francia">
                  <option value="Gabón">
                  <option value="Gambia">
                  <option value="Georgia">
                  <option value="Ghana">
                  <option value="Gibraltar">
                  <option value="Granada">
                  <option value="Grecia">
                  <option value="Groenlandia">
                  <option value="Guadalupe">
                  <option value="Guam">
                  <option value="Guatemala">
                  <option value="Guayana">
                  <option value="Guayana Francesa">
                  <option value="Guinea">
                  <option value="Guinea Ecuatorial">
                  <option value="Guinea-Bissau">
                  <option value="Haití">
                  <option value="Honduras">
                  <option value="Hungría">
                  <option value="India">
                  <option value="Indonesia">
                  <option value="Irak">
                  <option value="Irán">
                  <option value="Irlanda">
                  <option value="Isla Bouvet">
                  <option value="Isla de Christmas">
                  <option value="Islandia">
                  <option value="Islas Caimán">
                  <option value="Islas Cook">
                  <option value="Islas de Cocos o Keeling">
                  <option value="Islas Faroe">
                  <option value="Islas Heard y McDonald">
                  <option value="Islas Malvinas">
                  <option value="Islas Marianas del Norte">
                  <option value="Islas Marshall">
                  <option value="Islas menores de Estados Unidos">
                  <option value="Islas Palau">
                  <option value="Islas Salomón">
                  <option value="Islas Svalbard y Jan Mayen">
                  <option value="Islas Tokelau">
                  <option value="Islas Turks y Caicos">
                  <option value="Islas Vírgenes (EEUU)">
                  <option value="Islas Vírgenes (Reino Unido)">
                  <option value="Islas Wallis y Futuna">
                  <option value="Israel">
                  <option value="Italia">
                  <option value="Jamaica">
                  <option value="Japón">
                  <option value="Jordania">
                  <option value="Kazajistán">
                  <option value="Kenia">
                  <option value="Kirguizistán">
                  <option value="Kiribati">
                  <option value="Kuwait">
                  <option value="Laos">
                  <option value="Lesotho">
                  <option value="Letonia">
                  <option value="Líbano">
                  <option value="Liberia">
                  <option value="Libia">
                  <option value="Liechtenstein">
                  <option value="Lituania">
                  <option value="Luxemburgo">
                  <option value="Macedonia, Ex-República Yugoslava de">
                  <option value="Madagascar">
                  <option value="Malasia">
                  <option value="Malawi">
                  <option value="Maldivas">
                  <option value="Malí">
                  <option value="Malta">
                  <option value="Marruecos">
                  <option value="Martinica">
                  <option value="Mauricio">
                  <option value="Mauritania">
                  <option value="Mayotte">
                  <option value="México">
                  <option value="Micronesia">
                  <option value="Moldavia">
                  <option value="Mónaco">
                  <option value="Mongolia">
                  <option value="Montserrat">
                  <option value="Mozambique">
                  <option value="Namibia">
                  <option value="Nauru">
                  <option value="Nepal">
                  <option value="Nicaragua">
                  <option value="Níger">
                  <option value="Nigeria">
                  <option value="Niue">
                  <option value="Norfolk">
                  <option value="Noruega">
                  <option value="Nueva Caledonia">
                  <option value="Nueva Zelanda">
                  <option value="Omán">
                  <option value="Países Bajos">
                  <option value="Panamá">
                  <option value="Papúa Nueva Guinea">
                  <option value="Paquistán">
                  <option value="Paraguay">
                  <option value="Perú">
                  <option value="Pitcairn">
                  <option value="Polinesia Francesa">
                  <option value="Polonia">
                  <option value="Portugal">
                  <option value="Puerto Rico">
                  <option value="Qatar">
                  <option value="Reino Unido">
                  <option value="República Centroafricana">
                  <option value="República Checa">
                  <option value="República de Sudáfrica">
                  <option value="República Dominicana">
                  <option value="República Eslovaca">
                  <option value="Reunión">
                  <option value="Ruanda">
                  <option value="Rumania">
                  <option value="Rusia">
                  <option value="Sahara Occidental">
                  <option value="Saint Kitts y Nevis">
                  <option value="Samoa">
                  <option value="Samoa Americana">
                  <option value="San Marino">
                  <option value="San Vicente y Granadinas">
                  <option value="Santa Helena">
                  <option value="Santa Lucía">
                  <option value="Santo Tomé y Príncipe">
                  <option value="Senegal">
                  <option value="Seychelles">
                  <option value="Sierra Leona">
                  <option value="Singapur">
                  <option value="Siria">
                  <option value="Somalia">
                  <option value="Sri Lanka">
                  <option value="St Pierre y Miquelon">
                  <option value="Suazilandia">
                  <option value="Sudán">
                  <option value="Suecia">
                  <option value="Suiza">
                  <option value="Surinam">
                  <option value="Tailandia">
                  <option value="Taiwán">
                  <option value="Tanzania">
                  <option value="Tayikistán">
                  <option value="Territorios franceses del Sur">
                  <option value="Timor Oriental">
                  <option value="Togo">
                  <option value="Tonga">
                  <option value="Trinidad y Tobago">
                  <option value="Túnez">
                  <option value="Turkmenistán">
                  <option value="Turquía">
                  <option value="Tuvalu">
                  <option value="Ucrania">
                  <option value="Uganda">
                  <option value="Uruguay">
                  <option value="Uzbekistán">
                  <option value="Vanuatu">
                  <option value="Venezuela">
                  <option value="Vietnam">
                  <option value="Yemen">
                  <option value="Yugoslavia">
                  <option value="Zambia">
                  <option value="Zimbabue">
                </datalist> 
            </div>
          </div>
          <br> 

          

 <!--          
 <section class="hidden-xs">
 <div class="row">
   <div class="col-sm-4"><input type="checkbox" class="checkInteres" name="" id="citas" value="citas"> 
       <label for="citas">
         Citas
       </label>
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="fotos" value="Fotos"> 
       <label for="fotos">
         Fotos
       </label>
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="comer" value="comer"> 
       <label for="comer">
         Comer
       </label>
   </div>
 </div>
 <div class="row">
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="bailar" value="bailar"> 
       <label for="bailar">
         Bailar
       </label>
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="deportes" value="deportes">
       <label for="deportes">
         Deportes
       </label>
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="musica" value="musica">
       <label for="musica">
         Musica
       </label> 
   </div>
 </div>
 <div class="row">
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="cultura" value="cultura">
       <label for="cultura">
         Cultura
       </label> 
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="amigos" value="amigos">
       <label for="amigos">
         Amigos
       </label> 
   </div>
   <div class="col-sm-4">
     <input type="checkbox" class="checkInteres" name="" id="todos" value="todos">
       <label for="todos">
         Todo
       </label> 
   </div>
 </div>
         </section> -->

        <section class="visible-xs">
          <div class="row">
            <div class="col-xs-6"><input type="checkbox" class="checkInteres" name="citas" id="citas" value="citas"> 
                <label for="citas">
                  Citas
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="fotos" id="fotos" value="fotos"> 
                <label for="fotos">
                  Fotos
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="comer" id="comer" value="comer"> 
                <label for="comer">
                  Comer
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="bailar" id="bailar" value="bailar"> 
                <label for="bailar">
                  Bailar
                </label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="deportes" id="deportes" value="deportes">
                <label for="deportes">
                  Deportes
                </label>
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="musica" id="musica" value="musica">
                <label for="musica">
                  Musica
                </label> 
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="cultura" id="cultura" value="cultura">
                <label for="cultura">
                  Cultura
                </label> 
            </div>
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="amigos" id="amigos" value="amigos">
                <label for="amigos">
                  Amigos
                </label> 
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6">
              <input type="checkbox" class="checkInteres" name="todos" id="todos" value="todos">
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
              <a href="#"><button id="buscar" onclick="buscarViaje()" type="button" class="btn btn-lg  btn-block btn-success">Realizar Busqueda</button></a>
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
    <script src="js/buscarViaje.js"></script>
    <script src="js/fancywebsocket.js"></script>
</body>
</html>


<?php } ?>