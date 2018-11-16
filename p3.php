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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mochileros</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-login.css">
    <link rel="icon" type="image/png" href="img/backpack.png" />
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
        <li role="presentation"><a href="p1.php"> <span><img class="ovalo" src="img/m.jpg" alt="" /></span></a></li>
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
                                <button class="btn btn-info btn-block botoncitoBorrable">Iniciar sesion</button>
                              </div>
                           <?php  }; ?> 
                           <?php if ($use != 1) {?>
                              <div class="row">
                                  <div class="col-sm-12">
                                      <p>
                                          <a href="p2.php" class="btn btn-info btn-block botoncitoBorrable">Mi perfil</a>
                                      </p>
                                  </div>
                              </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>
                                        <a href="p4.php" class="btn btn-primary btn-block botoncitoBorrable">Mis viajes</a>
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
          
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="315" frameborder="0" style="border:0;" allowfullscreen></iframe>
          <button type="button" class="btn btn-primary botonAntSig">Anterior</button>
          <button type="button" class="btn btn-primary botonAntSig boton-siguiente">Siguiente</button>
        
        </div>

        <div class="parteBusqueda">
          
          <div class="row contenedorEscala">

            <div class="col-xs-6 col-xs-offset-3 divDeEscala">
              <span class="negrita">
                Escala: 
              </span>
            </div> 

            <div class="col-xs-6 col-xs-offset-3 divDeEscalaInput">
              <input list="escala" placeholder="Global/Continente/Pais" id="escalaInput">
                <datalist id="escala">
                  <option value="Global">
                  <option value="America">
                  <option value="Europa">
                  <option value="Africa">
                  <option value="Asia">
                  <option value="Oceania">
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
              <!-- <input type="text" class="form-control input-sm inputEscala"> -->
            </div> 


            <div class="divInputViaje">

              <div class="inputsDivsViaje">
                <span class="textoDivsViajes">Desde:</span>
                <input class="inputViaje " required="required" type="date" id="fechaDesde">
              </div>

              <div class="inputsDivsViaje">
                <span class="textoDivsViajes">Hasta:</span>
                <input class="inputViaje " required="required" type="date" id="fechaHasta">
              </div>

              <div class="inputsDivsViaje">
                <span class="textoDivsViajes">Idiomas:</span>
                <input class="inputViaje " required="required" type="text" list="lenguajes" id="idiomasInput">
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

              <div class="inputsDivsViaje">
                <span class="textoDivsViajes">Origen:</span>
                <input class="inputViaje " required="required" type="text" list="paises" id="paisesInput">
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

          </div>

          <div class="intereses">

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="citas" value="citas"> 
                <label for="citas">
                  Citas
                </label>
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="fotos" value="Fotos"> 
                <label for="fotos">
                  Fotos
                </label>
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="comer" value="comer"> 
                <label for="comer">
                  Comer
                </label>
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="bailar" value="bailar"> 
                <label for="bailar">
                  Bailar
                </label>
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="deportes" value="deportes">
                <label for="deportes">
                  Deportes
                </label>
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="musica" value="musica">
                <label for="musica">
                  Musica
                </label> 
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="cultura" value="cultura">
                <label for="cultura">
                  Cultura
                </label> 
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="amigos" value="amigos">
                <label for="amigos">
                  Amigos
                </label> 
              </div>
            </div>

            <div class="interes">
              <div class="interesInside">
                <input type="checkbox" class="checkInteres" name="" id="todos" value="todos">
                <label for="todos">
                  Todo
                </label> 
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
              <a href="#"><button id="buscar" onclick="buscarViaje()" type="button" class="btn btn-lg  btn-block btn-success">Realizar busqueda</button></a>
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
</body>
</html>


<?php } ?>