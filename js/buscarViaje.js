function buscarViaje(){


	// DEBUG

	/*
	
	var escala = 17;
	// Argentina
	var fecha_in = new Date(2018,10,4);
	var fecha_fi = new Date(2018,12,20);
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();
	var origen = "argentina";
	var idioma = 50;
	// Español
	var interesesChecked = [1,2,3,4,5,6,7,8];	

	*/

	/*
	*/

	// ORIGINALES

	//AGARRE DE LA ESCALA
	var escalaInput = document.getElementById("escalaInput").value;
	if (escalaInput == null || escalaInput == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "escala"')
		$("#myModal").modal();
	}
	//Funcion de abajo robada de stack overflow para conseguir el data-value de los options del datalist
	var escala = document.querySelector("#escala option[value='"+escalaInput+"']").dataset.value;


	//AGARRE DE LA FECHA
	var fecha_inF = document.getElementById("fechaDesde").value;
	/*if (fecha_inF == null || fecha_inF == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "fecha desde"')
		$("#myModal").modal();
	}*/
	var fecha_fiF = document.getElementById("fechaHasta").value;
	if (fecha_fiF == null || fecha_fiF == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "fecha hasta"')
		$("#myModal").modal();
	}
	
	var fecha_in = new Date(fecha_inF);
	var fecha_fi = new Date(fecha_fiF);
	
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();

	//AGARRA EL ORIGEN
	// IMPORTANTE: CUANDO EL USUARIO CREA SU CUENTA TIENE QUE ELEGIR SU PAIS DE LA MISMA LISTA QUE LOS ELIJE ACA PARA QUE
	// DESPUES MATCHEE BIEN.
	var origen = document.getElementById("paisesInput").value;
	if (origen == null || origen == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "origen"')
		$("#myModal").modal();
	}


	//AGARRA EL IDIOMA
	var idiomaInput = document.getElementById("idiomasInput").value;
	if (idiomaInput == null || idiomaInput == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "idioma"')
		$("#myModal").modal();
	}
	var idioma = document.querySelector("#idioma option[value='"+idiomaInput+"']").dataset.value;


	//AGARRA LOS INTERESES
	var intereses = document.getElementsByClassName("checkInteres");
	var interesesChecked = [];
	

	for (var i = intereses.length - 1; i >= 0; i--) {
		if(intereses[i].checked)
		{
			num = intereses[i].value;
			numConverted = parseInt(num);
			interesesChecked.push(numConverted);
		}
	}

if (interesesChecked == null || interesesChecked == "") {
		$('#t_modal').text('Complete los campos');
		$('#m_modal').text('porfavor complete el campo de "intereses"')
		$("#myModal").modal();
	}
if (escalaInput && fecha_fiF && origen && idiomaInput && interesesChecked) {
	$('#t_modal').text('Sin coincidencias');
	$('#m_modal').text(':(')
}


	



	/*
	
	// DEBUG

	console.log(escala);
	console.log(fecha_ini);
	console.log(fecha_fin);
	console.log(idioma);
	console.log(interesesChecked);
*/

	if(fecha_in == "Invalid Date"){
	$('#t_modal').text('Complete los campos');
	$('#m_modal').text('porfavor complete el campo "fecha_desde"')
	$("#myModal").modal();
	}
	else
	{

		$.ajax({
		    type: "POST",
			url: "php/buscarViaje.php",
			dataType: "json",
			data: {'escala' : escala, 'fecha_ini' : fecha_ini, 'fecha_fin' : fecha_fin, 'idioma' : idioma, 'origen' :origen, 'intereses' : interesesChecked},
			success: function (result) 
				{
					if (result.length != 0)
					{
					manejarResultado(result);
					}
					else
					{
						$("#myModal").modal();
					}
				},
		    error: function (xhr, status, error)
		    {
		    	console.log(xhr);
		    	console.log(status);
		    	console.log(error);
				console.log("error de consulta");
		    }
	    })
	}
}

/*
A ver... Como explicarlo... El programa revisa TODOS los puntos que haya dentro de un pais, continente o del globo entero para matchear
con los valores de busqueda del usuario, si encuentra una coincidencia se fija a que viaje corresponde y guarda su ID en la lista 
resultados_id, si encuentra otro punto del mismo viaje NO lo vuelve a poner sino que lo saltea y se sigue fijando con el resto de los 
puntos. La variable id_actual busca un valor random entre 0 y el lenght de resultados_id, con esto tenes a id_actual "apuntando" a uno 
de los ID en el array. Porque lo hice asi? No me acuerdo. Jeje. En fin. La funcion "traerPuntos" trae TODOS los puntos del viaje 
en el index de resultados[id_actual] y los pone en el mapa. Con los botones "siguiente" y "anterior" solamente se sube el valor 
o se baja de id_actual en 1 (teniendo en cuenta que pudo haber llegado a uno de sus limites) y vuelve a llamar a traerPuntos
*/
resultados_id = [];
id_actual = 0;


function manejarResultado(result)
{
	for (var i = 0; i < result.length; i++)
	{
		if (resultados_id.includes(result[i].ID_VIAJE)) 
		{
			null;
		}
		else
		{
			resultados_id.push(result[i].ID_VIAJE);
		}
	}
	id_actual = Math.floor(Math.random() * resultados_id.length);
	traerPuntos();
}

/*Trae los puntos. De que viaje? Del que este en el INDEX de id_actual*/
function traerPuntos()
{
	$.ajax({
	    type: "POST",
		url: "php/traerViaje.php",
		dataType: "json",
		data: {'id_viaje' : resultados_id[id_actual]},
		success: function (result) 
			{
				ponerPuntos(result);
			},
	    error: function (xhr, status, error)
	    {
	    	console.log(xhr);
	    	console.log(status);
	    	console.log(error);
			console.log("error de consulta");
	    }
    })
}

/*Necesito que estas dos cosas sean globales para poder agarrarlas y eliminarlar despues*/
var markersMapa = [];
var flightPath;


function ponerPuntos(puntos)
{
	var puntosMapa = [];

	/*Primero hay que sacar los puntos que ya haya*/
	for (var i = markersMapa.length - 1; i >= 0; i--) {
		markersMapa[i]
		markersMapa[i].setMap(null);
		markersMapa.splice(i,1);
	}

	/*Tambien sacamos las lineas*/
	if (flightPath != null) 
	{
		flightPath.setMap(null);
	}

	for(var i = 0;  i < puntos.length; i++)
	{

		//Busca posicion X e Y y las junta en la variable myLatlng
		var ID_usuario = puntos[i][0];
		var positionX = puntos[i][1];
		var positionY = puntos[i][2];
		var myLatlng = new google.maps.LatLng(positionX, positionY);

		//Las fechas inicio y fin
		var fecha_inicio = puntos[i][3];
		var fecha_fin = puntos[i][4];


		var fecha_inicioF = new Date(fecha_inicio);
		var fecha_finF = new Date(fecha_fin);


		var fecha_inicioF = fecha_inicioF.getDate() + "/" + (fecha_inicioF.getMonth()+1) + "/" + fecha_inicioF.getFullYear();
		var fecha_finF = fecha_finF.getDate() + "/" + (fecha_finF.getMonth()+1) + "/" + fecha_finF.getFullYear();


		//Cuanto se va a alejar el usuario
		var cuadras_extras = puntos[i][5];

		//Los voy poniendo en este array para despues manejarlos (crear la linea que los une o eliminarlos) 
		puntosMapa.push(myLatlng);

		//Se crea un nuevo objeto marker
		var marker = new google.maps.Marker({
			fecha_inicio: fecha_inicioF,
			fecha_fin: fecha_finF,
			cuadras_extras: cuadras_extras,
			position: myLatlng,
			title:"Hello World!"
		});
		if (i == 0) 
		{
			marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
		}
		else
		{
			marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png')

		}

		marker.addListener('click', function() {
			/*
			infowindow.setContent(
				'<div class="divInfoWindow">'+
				'Desde: '+this.fecha_inicio+'<br>'+
				'Hasta: '+this.fecha_fin+'<br>'+
				'Dispuesto a alejarme '+this.cuadras_extras+' cuadras <br><br>'+
				'<button type="button" class="btn btn-primary">Ver Usuario!</button>'+
				'</div>'
				);
	    	infowindow.open(map, this);
			*/
			var id_yo = myvar;
			if (id_yo == 1) {
				infowindow.setContent(
				'<div id="content" class="divInfoWindow">' +
	    		'<div id="siteNotice">' +
				'Desde: '+this.fecha_inicio+'<br>'+
				'Hasta: '+this.fecha_fin+'<br>'+
				'Puedo alejarme hasta '+this.cuadras_extras+' cuadras de aqui!<br><br>'+
				'<p class= "error">Inicia sesion para ver el usuario</p>'+
				'</div>'+
				'</div>'
				);
			}
			else{
				infowindow.setContent(
				'<div id="content" class="divInfoWindow">' +
	    		'<div id="siteNotice">' +
				'Desde: '+this.fecha_inicio+'<br>'+
				'Hasta: '+this.fecha_fin+'<br>'+
				'Puedo alejarme hasta '+this.cuadras_extras+' cuadras de aqui!<br><br>'+
				'<a href="p8.php?id='+ID_usuario+'"><button type="button" class="btn btn-primary">Ver Usuario!</button></a>'+
				'</div>'+
				'</div>'
				);
			}
			
	    	infowindow.open(map, this);
		});

		/*Pongo los puntos en el array para manejarlos despues*/
		markersMapa.push(marker);

		/*Se lo setea los puntos en el mapa*/
		marker.setMap(map);
	}

	/*Con esto se crea la linea que los une*/
	flightPath = new google.maps.Polyline({
	    path: puntosMapa,
	    strokeColor: "#0000FF",
	    strokeOpacity: 1.0,
	    strokeWeight: 2
  	});

  	/*Con esto se setea la linea en el mapa*/
	flightPath.setMap(map);
}


function puntoSiguiente()
{
	if (id_actual == resultados_id.length-1) 
	{
		id_actual = 0;
	}
	else
	{
		id_actual += 1;
	}
	traerPuntos();
}

function puntoAnterior()
{
	if (id_actual == 0) 
	{
		id_actual = resultados_id.length-1;
	}
	else
	{
		id_actual -= 1;
	}
	traerPuntos();
}

/*Con esto se inicia el mapa y de paso se le pide ubicacion al usuario*/
var map;
function initMap()
{
	map = new google.maps.Map(document.getElementById('mapaGoogle'), {
		center: {lat: -12.789924, lng: -68.52355},
		zoom: 4
	});
  	if (navigator.geolocation) 
  	{
    	navigator.geolocation.getCurrentPosition(function (position) 
    	{
     	//console.log(position.coords.latitude);
     	//console.log(position.coords.longitude);
        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        map.setCenter(initialLocation);
 		});
 	}

 	var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

    // La ventanita que le aparece arriba a los marks con los datos
	infowindow = new google.maps.InfoWindow({});
}


  /**
   * The CenterControl adds a control to the map that recenters the map on
   * Chicago.
   * This constructor takes the control DIV as an argument.
   * @constructor
   */

function CenterControl(controlDiv, map) {
    // Set CSS for the control border.
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click to recenter the map';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    var controlText = document.createElement('div');
    controlText.style.color = 'rgb(25,25,25)';
    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlText.style.fontSize = '16px';
    controlText.style.lineHeight = '38px';
    controlText.style.paddingLeft = '5px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = 'Mi ubicación';
    controlUI.appendChild(controlText);

    // Setup the click event listeners: simply set the map to Chicago.
    controlUI.addEventListener('click', function() {
        if (navigator.geolocation) 
	  	{

	    	navigator.geolocation.getCurrentPosition(function (position) 
	    	{

	        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	        map.setCenter(initialLocation);
	 		
	 		});
	 	}
    });

  }
