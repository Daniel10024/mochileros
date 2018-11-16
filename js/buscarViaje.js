

function buscarViaje(){


	var escala = document.getElementById("escalaInput").value;

	var origen = document.getElementById("paisesInput").value;

	var idioma = document.getElementById("idiomasInput").value;

	var fecha_ini = document.getElementById("fechaDesde").value;

	var fecha_fin = document.getElementById("fechaHasta").value;

	console.log(escala)
	console.log(origen)
	console.log(idioma)
	console.log(fecha_ini)
	console.log(fecha_fin)

	$.ajax({
    type: "POST",
	url: "php/buscarViaje.php",
	dataType: "json",
	data: {'escala' : escala, 'fecha_ini' : fecha_ini, 'fecha_fin' : fecha_fin, 'idioma' : idioma, 'origen' :origen},
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
