function buscarViaje(){


	// DEBUG

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

	/*
	*/

	/*

	// ORIGINALES

	//AGARRE DE LA ESCALA
	var escalaInput = document.getElementById("escalaInput").value;
	//Funcion de abajo robada de stack overflow para conseguir el data-value de los options del datalist
	var escala = document.querySelector("#escala option[value='"+escalaInput+"']").dataset.value;


	//AGARRE DE LA FECHA
	var fecha_inF = document.getElementById("fechaDesde").value;
	var fecha_fiF = document.getElementById("fechaHasta").value;
	
	var fecha_in = new Date(fecha_inF);
	var fecha_fi = new Date(fecha_fiF);
	
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();

	//AGARRA EL ORIGEN
	// IMPORTANTE: CUANDO EL USUARIO CREA SU CUENTA TIENE QUE ELEGIR SU PAIS DE LA MISMA LISTA QUE LOS ELIJE ACA PARA QUE
	// DESPUES MATCHEE BIEN.
	var origen = document.getElementById("paisesInput").value;


	//AGARRA EL IDIOMA
	var idiomaInput = document.getElementById("idiomasInput").value;
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


	*/
	



	/*

	// DEBUG

	console.log(escala);
	console.log(fecha_ini);
	console.log(fecha_fin);
	console.log(idioma);
	console.log(interesesChecked);

	*/

	

	$.ajax({
    type: "POST",
	url: "php/buscarViaje.php",
	dataType: "json",
	data: {'escala' : escala, 'fecha_ini' : fecha_ini, 'fecha_fin' : fecha_fin, 'idioma' : idioma, 'origen' :origen, 'intereses' : interesesChecked},
	success: function (result) 
		{
			console.log(result);
			manejarResultado(result);
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

resultados_id = [];
id_actual = null;


function manejarResultado(result)
{
	/*Aca guardo los IDS de los viajes encontrados*/
	resultados_id = [];
	id_actual = null;
	for (var i = 0; i < result.length; i++)
	{
		if (resultados_id.includes(result[i].ID_VIAJE)) 
		{

		}
		else
		{
			console.log("clapton");
			resultados_id.push(result[i].ID_VIAJE);
		}
	}
	if (resultados_id.length=0) 
	{
		console.log("No se encontraron datos");
	}
	else
	{
		// Busca todos los puntos del primer resultado y los pone en el mapa
		// Setea el id_actual
	}
}



function traerDemasPuntos(id_viaje){
	console.log(resultados_id);
}


var resultados = [];

// Boton "Anterior" pone en el mapa los puntos del resultado anterior de la lista
// Boton "Siguiente" pone en el mapa los puntos del resultado siguiente en la lista