function formarBaseDeDatos()
{
	arrayPais=["Global",
                  "America",
                  "Europa",
                  "Africa",
                  "Asia",
                  "Oceania",
                  "Afganistán",
                  "Albania",
                  "Alemania",
                  "Andorra",
                  "Angola",
                  "Anguilla",
                  "Antártida",
                  "Antigua y Barbuda",
                  "Antillas Holandesas",
                  "Arabia Saudí",
                  "Argelia",
                  "Argentina",
                  "Armenia",
                  "Aruba",
                  "Australia",
                  "Austria",
                  "Azerbaiyán",
                  "Bahamas",
                  "Bahrein",
                  "Bangladesh",
                  "Barbados",
                  "Bélgica",
                  "Belice",
                  "Benin",
                  "Bermudas",
                  "Bielorrusia",
                  "Birmania",
                  "Bolivia",
                  "Bosnia y Herzegovina",
                  "Botswana",
                  "Brasil",
                  "Brunei",
                  "Bulgaria",
                  "Burkina Faso",
                  "Burundi",
                  "Bután",
                  "Cabo Verde",
                  "Camboya",
                  "Camerún",
                  "Canadá",
                  "Chad",
                  "Chile",
                  "China",
                  "Chipre",
                  "Ciudad del Vaticano (Santa Sede)",
                  "Colombia",
                  "Comores",
                  "Congo",
                  "Congo, República Democrática del",
                  "Corea",
                  "Corea del Norte",
                  "Costa de Marfíl",
                  "Costa Rica",
                  "Croacia (Hrvatska)",
                  "Cuba",
                  "Dinamarca",
                  "Djibouti",
                  "Dominica",
                  "Ecuador",
                  "Egipto",
                  "El Salvador",
                  "Emiratos Árabes Unidos",
                  "Eritrea",
                  "Eslovenia",
                  "España",
                  "Estados Unidos",
                  "Estonia",
                  "Etiopía",
                  "Fiji",
                  "Filipinas",
                  "Finlandia",
                  "Francia",
                  "Gabón",
                  "Gambia",
                  "Georgia",
                  "Ghana",
                  "Gibraltar",
                  "Granada",
                  "Grecia",
                  "Groenlandia",
                  "Guadalupe",
                  "Guam",
                  "Guatemala",
                  "Guayana",
                  "Guayana Francesa",
                  "Guinea",
                  "Guinea Ecuatorial",
                  "Guinea-Bissau",
                  "Haití",
                  "Honduras",
                  "Hungría",
                  "India",
                  "Indonesia",
                  "Irak",
                  "Irán",
                  "Irlanda",
                  "Isla Bouvet",
                  "Isla de Christmas",
                  "Islandia",
                  "Islas Caimán",
                  "Islas Cook",
                  "Islas de Cocos o Keeling",
                  "Islas Faroe",
                  "Islas Heard y McDonald",
                  "Islas Malvinas",
                  "Islas Marianas del Norte",
                  "Islas Marshall",
                  "Islas menores de Estados Unidos",
                  "Islas Palau",
                  "Islas Salomón",
                  "Islas Svalbard y Jan Mayen",
                  "Islas Tokelau",
                  "Islas Turks y Caicos",
                  "Islas Vírgenes (EEUU)",
                  "Islas Vírgenes (Reino Unido)",
                  "Islas Wallis y Futuna",
                  "Israel",
                  "Italia",
                  "Jamaica",
                  "Japón",
                  "Jordania",
                  "Kazajistán",
                  "Kenia",
                  "Kirguizistán",
                  "Kiribati",
                  "Kuwait",
                  "Laos",
                  "Lesotho",
                  "Letonia",
                  "Líbano",
                  "Liberia",
                  "Libia",
                  "Liechtenstein",
                  "Lituania",
                  "Luxemburgo",
                  "Macedonia, Ex-República Yugoslava de",
                  "Madagascar",
                  "Malasia",
                  "Malawi",
                  "Maldivas",
                  "Malí",
                  "Malta",
                  "Marruecos",
                  "Martinica",
                  "Mauricio",
                  "Mauritania",
                  "Mayotte",
                  "México",
                  "Micronesia",
                  "Moldavia",
                  "Mónaco",
                  "Mongolia",
                  "Montserrat",
                  "Mozambique",
                  "Namibia",
                  "Nauru",
                  "Nepal",
                  "Nicaragua",
                  "Níger",
                  "Nigeria",
                  "Niue",
                  "Norfolk",
                  "Noruega",
                  "Nueva Caledonia",
                  "Nueva Zelanda",
                  "Omán",
                  "Países Bajos",
                  "Panamá",
                  "Papúa Nueva Guinea",
                  "Paquistán",
                  "Paraguay",
                  "Perú",
                  "Pitcairn",
                  "Polinesia Francesa",
                  "Polonia",
                  "Portugal",
                  "Puerto Rico",
                  "Qatar",
                  "Reino Unido",
                  "República Centroafricana",
                  "República Checa",
                  "República de Sudáfrica",
                  "República Dominicana",
                  "República Eslovaca",
                  "Reunión",
                  "Ruanda",
                  "Rumania",
                  "Rusia",
                  "Sahara Occidental",
                  "Saint Kitts y Nevis",
                  "Samoa",
                  "Samoa Americana",
                  "San Marino",
                  "San Vicente y Granadinas",
                  "Santa Helena",
                  "Santa Lucía",
                  "Santo Tomé y Príncipe",
                  "Senegal",
                  "Seychelles",
                  "Sierra Leona",
                  "Singapur",
                  "Siria",
                  "Somalia",
                  "Sri Lanka",
                  "St Pierre y Miquelon",
                  "Suazilandia",
                  "Sudán",
                  "Suecia",
                  "Suiza",
                  "Surinam",
                  "Tailandia",
                  "Taiwán",
                  "Tanzania",
                  "Tayikistán",
                  "Territorios franceses del Sur",
                  "Timor Oriental",
                  "Togo",
                  "Tonga",
                  "Trinidad y Tobago",
                  "Túnez",
                  "Turkmenistán",
                  "Turquía",
                  "Tuvalu",
                  "Ucrania",
                  "Uganda",
                  "Uruguay",
                  "Uzbekistán",
                  "Vanuatu",
                  "Venezuela",
                  "Vietnam",
                  "Yemen",
                  "Yugoslavia",
                  "Zambia",
                  "Zimbabue"]

                  for (var i = 0; i < arrayPais.length; i++) {
                  	console.log(arrayPais[i]);
                  	$.ajax({
					    type: "POST",
						url: "php/insertarDatos.php",
						dataType: "json",
						data: {'escala' : arrayPais[i]},
						success: function (result) 
							{
								console.log(result);
							},
					    error: function (xhr, status, error)
					    {
					    	console.log(xhr);
					    	console.log(status);
					    	console.log(error);
							console.log("no entro la consulta bien xDDDD");
					    }
				    })
                  }
}


formarBaseDeDatos();



function buscarViaje(){


	//var escala = 3;
	var escalaInput = document.getElementById("escalaInput").value;
	/*Funcion de abajo robada de stack overflow para conseguir el data-value de los options del datalist*/
	var escala = document.querySelector("#escala option[value='"+escalaInput+"']").dataset.value;

	console.log(escala);


	var origen = "argentina";
	var idioma = 1;
	var fecha_in = new Date(2018,10,4);
	var fecha_fi = new Date(2018,12,20);
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();
	var intereses = [1];

	/*


	var origen = document.getElementById("paisesInput").value;

	var idioma = document.getElementById("idiomasInput").value;

	var fecha_ini = document.getElementById("fechaDesde").value;

	var fecha_fin = document.getElementById("fechaHasta").value;

	var intereses = document.getElementsByClassName("checkInteres");
	var interesesChecked = [];

	for (var i = intereses.length - 1; i >= 0; i--) {
		if(intereses[i].checked)
		{
			interesesChecked.push(intereses[i].value);
		}
	}
	console.log(interesesChecked)

	
	console.log(escala)
	console.log(origen)
	console.log(idioma)
	console.log(intereses)
	console.log(fecha_ini)
	console.log(fecha_fin)

	*/

	$.ajax({
    type: "POST",
	url: "php/buscarViaje.php",
	dataType: "json",
	data: {'escala' : escala, 'fecha_ini' : fecha_ini, 'fecha_fin' : fecha_fin, 'idioma' : idioma, 'origen' :origen, 'intereses' : intereses},
	success: function (result) 
		{
			console.log(result);
		},
    error: function (xhr, status, error)
    {
    	console.log(xhr);
    	console.log(status);
    	console.log(error);
		console.log("no entro la consulta bien xDDDD");
    }
    })

}
