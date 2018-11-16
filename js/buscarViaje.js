<<<<<<< HEAD
$(document).ready(function() {
	var escala = 1;
	var origen = "argentina";
	var idioma = 1;
	var fecha_in = new Date(2018,11,4);
	var fecha_fi = new Date(2018,12,20);
	var fecha_ini = fecha_in.getFullYear() + "/" +(fecha_in.getMonth()+1) + "/" + fecha_in.getDate();
	var fecha_fin = fecha_fi.getFullYear() + "/" +(fecha_fi.getMonth()+1) + "/" + fecha_fi.getDate();
	var intereses = [1];
	console.log(fecha_ini);
	console.log(fecha_fin);
=======


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

>>>>>>> 581bd5ab80a71577ddf52f6a7764ba8bc044f4e4
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
