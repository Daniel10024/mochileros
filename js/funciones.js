//boton de activar editar________________________________________________________
$(document).ready(function() {
    $("#edit").on("click", function() {

        $('*').prop('disabled', false);
        $("#atras").addClass("hidden");
        $("#edit2").addClass("hidden");
        $("#btnedit").removeClass("hidden");
    });

});

$(document).ready(function() {
    $("#edit2").on("click", function() {

        $('*').prop('disabled', false);
        $("#atras").addClass("hidden");
        $("#edit2").addClass("hidden");
        $("#btnedit").removeClass("hidden");
    });

});

//submit editar foto perfil________________________________________________________
$(document).ready(function() {
    $("#image").on("click", function() {
        $('*').prop('disabled', false);
        $("#atras").addClass("hidden");
        $("#edit2").addClass("hidden");
        $("#btnedit").removeClass("hidden");
    });

});



//validaciones editar perfil_______________________________________________________________
$(document).ready(function() {
    $("#form_usuario").submit(function(){
    //validar foto ___________________________________________________________________
        var image_name = $('#image').val();  
           if(image_name)  
           /*{  
                data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor seleccione una imagen </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>'; 
                $('#mensaje_modal').html(data);  
                return false;  
           }  
           else  */
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     /*alert('Invalid Image File');*/
                     data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor seleccione una imagen valida </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>'; 
                    $('#mensaje_modal').html(data);    
                     return false;  
                }  
           } 

    //validar nombre_____________________________________________________________________________________
        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 16) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 64 caracteres </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;   
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };

    //validar apellido_______________________________________________________________________________________
        if($("#ape-form").val().length > 16) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El apellido puede ser de un maximo de 64 caracteres </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;   
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };

    //validar fecha nacimiento__________________________________________________________________________________
    	var fecha = $("#eda-form").val()
        // revisar el patrón
        console.log (fecha+" "+"hola");
        if (fecha != 0) {
            console.log (fecha+" "+"chau");
            /*alert ("hola");*/
            if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(fecha)) {
            	data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Ingrese una fecha valida </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            	$('#mensaje_modal').html(data);
                return false;
    		}

        // convertir los numeros a enteros
        var parts = fecha.split("/");
        var day = parseInt(parts[2], 10);
        var month = parseInt(parts[1], 10);
        var year = parseInt(parts[0], 10);

        // Revisar los rangos de año y mes
        if( (year < 1000) || (year > 3000) || (month == 0) || (month > 12) ) {
        	data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Ingrese una fecha valida </div>'+
                    '<div class="table-responsive">'+
                    '<table class="table" id="tr_modal"></table>'+
                '</div>';
        	$('#mensaje_modal').html(data);
            return false;
		}
        var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

        // Ajustar para los años bisiestos
        if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) {
            monthLength[1] = 29;
        }

        // Revisar el rango del dia
        if (day <= 0 || day > monthLength[month - 1]) {
        	data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Ingrese una fecha valida </div>'+
                    '<div class="table-responsive">'+
                    '<table class="table" id="tr_modal"></table>'+
                '</div>';
        	$('#mensaje_modal').html(data);
            return false;
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };
        }

        //validar contacto_________________________________________________________________________________________
        if($("#con-form").val().length > 64) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El contacto puede acupar como maximo 64 caracteres </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;   
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };
        //validar descripcion_______________________________________________________________________________________
        if($("#des-form").val().length > 320) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> La descripcion no puede ocupar mas de 320 caracteres </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;   
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };
   });
});


//validaciones publicacion_______________________________________________________________
$(document).ready(function() {
    $("#form-publicacion").submit(function(){
    //validar foto ___________________________________________________________________
        var image_name = $('#publicar-foto').val();  
           if(image_name)  
           {  
                var extension = $('#publicar-foto').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     /*alert('Invalid Image File');*/
                     data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor seleccione una imagen valida </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>'; 
                    $('#mensaje_modal').html(data);   
                      
                     return false;  
                }  
           } 

    //validar comentario_____________________________________________________________________________________
        if($("#message").val().length > 210) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El comentario puede tener como maximo 210 caracteres </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;   
        }
        else {
            data =  '<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Datos guardados exitosamente </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
        };
        if ($("#message").val().length < 1 && !image_name) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Adjunte un comentario o una imagen para compartir </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>';
            $('#mensaje_modal').html(data);
            return false;
        }
   });
});

//tiempo de ventana modal de error_______________________________________________________
$(function(){
    $('#modal_error').on('show.bs.modal', function(){
        var myModal = $(this);
        clearTimeout(myModal.data('hideInterval'));
        myModal.data('hideInterval', setTimeout(function(){
            myModal.modal('hide');
        }, 2500));
    });
});



var inputs = $('#message');
    $(document).on('keyup', "[maxlength]", function (e) {
        var este = $(this),
            maxlength = este.attr('maxlength'),
            maxlengthint = parseInt(maxlength),
            textoActual = este.val(),
            currentCharacters = este.val().length;
            remainingCharacters = maxlengthint - currentCharacters,
            espan = $('#span');  
            espan2 = $('#span2');          
            // Detectamos si es IE9 y si hemos llegado al final, convertir el -1 en 0 - bug ie9 porq. no coge directamente el atributo 'maxlength' de HTML5
            if (document.addEventListener && !window.requestAnimationFrame) {
                if (remainingCharacters <= -1) {
                    remainingCharacters = 0;            
                }
            }
            if (este.attr('id') == 'con-form' || este.attr('id') == 'message') {
                espan.html(remainingCharacters);
            }
            if (este.attr('id') == 'message' || este.attr('id') == 'des-form') {
               espan2.html(remainingCharacters); 
            }
            
            if (!!maxlength) {
                var texto = este.val(); 
                if (texto.length >= maxlength) {
                    este.removeClass("bordegris").addClass("borderojo");
                    este.val(text.substring(0, maxlength));
                    e.preventDefault();
                }
                else if (texto.length < maxlength) {
                    este.removeClass("borderojo").addClass("bordegris");
                }   
            }   
        });


//publicaciones____________________________________________________________
$(document).ready(function() {
    $("#publicar-foto").on("click", function() {
        $("#content_coment").removeClass("col-md-12");
        $("#content_coment").addClass("col-md-7");
        $("#label_foto").text("Cambiar imagen");
    });

});

function buscarVariables(){
    console.log("est");
    window.location="p3.php";
    console.log("est22");
}