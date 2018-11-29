function insertDatos()
{
	datos = ["Afrikáans",
                  "Akan",
                  "Albanés",
                  "Alemán",
                  "Amhárico",
                  "Árabe",
                  "Armenio",
                  "Asamés",
                  "Asirio",
                  "Azerbaiyano",
                  "Badini",
                  "Bambara",
                  "Baskir",
                  "Bengalí",
                  "Bielorruso",
                  "Birmano",
                  "Bisaya",
                  "Bosnio",
                  "Bravanese",
                  "Búlgaro",
                  "Cachemir",
                  "Caldeo",
                  "Camboyano",
                  "Canarés",
                  "Cantonés",
                  "Catalán",
                  "Cebuano",
                  "Chamorro",
                  "Chaozhou",
                  "Chavacano",
                  "Checo",
                  "Chichewa",
                  "Chiluba",
                  "Chin",
                  "Chuukés",
                  "Cingalés",
                  "Cingalés",
                  "Coreano",
                  "Cree",
                  "Criollo haitiano",
                  "Croata",
                  "Dakota",
                  "Danés",
                  "Darí",
                  "Dinka",
                  "Diula",
                  "Dzongkha",
                  "Eslovaco",
                  "Esloveno",
                  "Esloveno",
                  "Español",
                  "Estonio",
                  "Ewé",
                  "Fante",
                  "Farsi",
                  "Feroés",
                  "Finés",
                  "Flamenco",
                  "Francés",
                  "Francés canadiense",
                  "Frisón",
                  "Fujianés",
                  "Fujiano",
                  "Fula",
                  "Fula",
                  "Fulani",
                  "Fuzhou",
                  "Ga",
                  "Gaélico",
                  "Galés",
                  "Gallego",
                  "Ganda",
                  "Georgiano",
                  "Gorani",
                  "Griego",
                  "Guanxi",
                  "Gujarati",
                  "Hakka",
                  "Hassanía",
                  "Hausa",
                  "Hebreo",
                  "Hiligainón",
                  "Hindi",
                  "Hindi de Fiyi",
                  "Hindú",
                  "Hmong",
                  "Holandés",
                  "Húngaro",
                  "Ibanag",
                  "Igbo",
                  "Ilocano",
                  "Ilongo",
                  "Indonesio",
                  "Inglés",
                  "Inuit",
                  "Irlandés",
                  "Islandés",
                  "Italiano",
                  "Jalja",
                  "Japonés",
                  "Javanés",
                  "Jemer",
                  "Kanjobal",
                  "Karen",
                  "Kazajo",
                  "Kikuyu",
                  "Kiñaruanda",
                  "Kirguís",
                  "Kirundi",
                  "Kosovar",
                  "Kotokoli",
                  "Krio",
                  "Kurdo",
                  "Kurmanji",
                  "Lakota",
                  "Laosiano",
                  "Latín",
                  "Letón",
                  "Lingala",
                  "Lituano",
                  "Luganda",
                  "Luo",
                  "Lusoga",
                  "Luxemburgués",
                  "Maay",
                  "Macedonio",
                  "Malayalam",
                  "Malayo",
                  "Maldiviano",
                  "Malgache",
                  "Maltés",
                  "Mandarín",
                  "Mandinga",
                  "Mandingo",
                  "Maorí",
                  "Maratí",
                  "Marshalés",
                  "Mien",
                  "Mirpuri",
                  "Mixteco",
                  "Moldavo",
                  "Mongol",
                  "Napolitano",
                  "Navajo",
                  "Nepalí",
                  "Noruego",
                  "Nuer",
                  "Ojibwa",
                  "Oriya",
                  "Oromo",
                  "Osetio",
                  "Pahari",
                  "Pampango",
                  "Panyabí",
                  "Pashto",
                  "Patois",
                  "Pidgin inglés",
                  "Polaco",
                  "Portugués",
                  "Pothwari",
                  "Putián",
                  "Quechua",
                  "Romanche",
                  "Romaní",
                  "Rumano",
                  "Rundi",
                  "Ruso",
                  "Samoano",
                  "Sango",
                  "Sánscrito",
                  "Serbio",
                  "Sesotho",
                  "Setsuana",
                  "Shangainés",
                  "Shona",
                  "Sichuan",
                  "Siciliano",
                  "Sindhi",
                  "Siswati/suazi",
                  "Somalí",
                  "Sondanés",
                  "Soninké",
                  "Sorani",
                  "Suajili",
                  "Sueco",
                  "Susu",
                  "Sylheti",
                  "Tagalo",
                  "Tailandés",
                  "Taiwanés",
                  "Tamil",
                  "Tayiko",
                  "Telugú",
                  "Tibetano",
                  "Tigriña",
                  "Tongano",
                  "Tsonga",
                  "Turco",
                  "Turcomano",
                  "Ucraniano",
                  "Uigur",
                  "Urdú",
                  "Uzbeco",
                  "Vasco (euskera)",
                  "Venda",
                  "Vietnamita",
                  "Wólof",
                  "Xhosa",
                  "Yakartanés",
                  "Yao",
                  "Yidis",
                  "Yoruba",
                  "Yupik",
                  "Zulú"]

                  for (var i = 1; i <= datos.length; i++) {
                  	datos[i]
                  	$.ajax({
				    type: "POST",
					url: "php/insertarDatos.php",
					dataType: "json",
					data: {'id_idioma' : i, "idioma": datos[i]},
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

//insertDatos();

function buscarViaje(){


	/*AGARRE DE LA ESCALA*/

	//var escala = 3;
	var escalaInput = document.getElementById("escalaInput").value;
	/*Funcion de abajo robada de stack overflow para conseguir el data-value de los options del datalist*/
	var escala = document.querySelector("#escala option[value='"+escalaInput+"']").dataset.value;

	console.log(escalaInput);
	console.log(escala);


	/*AGARRE DE LA FECHA*/

	// var fecha_in = new Date(2018,10,4);
	// var fecha_fi = new Date(2018,12,20);
	var fecha_inF = document.getElementById("fechaDesde").value;
	var fecha_fiF = document.getElementById("fechaHasta").value;
	
	var fecha_in = new Date(fecha_inF);
	var fecha_fi = new Date(fecha_fiF);
	
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();

	console.log(fecha_ini)
	console.log(fecha_fin)


	/*AGARRA EL ORIGEN*/

	// IMPORTANTE: CUANDO EL USUARIO CREA SU CUENTA TIENE QUE ELEGIR SU PAIS DE LA MISMA LISTA QUE LOS ELIJE ACA PARA QUE
	// DESPUES MATCHEE BIEN.
	//var origen = "argentina";
	var origen = document.getElementById("paisesInput").value;


	/*AGARRA EL IDIOMA*/
	//var idioma = 50;
	var idiomaInput = document.getElementById("idiomasInput").value;
	var idioma = document.querySelector("#idioma option[value='"+idiomaInput+"']").dataset.value;
	console.log(idiomaInput);
	console.log(idioma);


	/*AGARRA LOS INTERESES*/
	var intereses = [1];







	/*
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
