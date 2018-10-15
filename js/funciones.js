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
        $("#insert").removeClass("hidden");
    });

});

// validar nueva foto de usuario__________________________________________________
 $(document).ready(function(){  
      $('#form-foto').submit(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                /*alert("Please Select Image");*/
                data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> Por favor seleccione una imagen </div>'+
                        '<div class="table-responsive">'+
                        '<table class="table" id="tr_modal"></table>'+
                    '</div>'; 
                $('#mensaje_modal').html(data);  
                return false;  
           }  
           else  
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
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  


//validaciones editar perfil_______________________________________________________________
$(document).ready(function() {
    $("#form_usuario").submit(function(){

    //validar nombre_____________________________________________________________________________________
        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 32) {
            /*$("#p-nom").text("* El nombre es obligatorio max 32 caracteres")*/
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 32 caracteres </div>'+
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
        if($("#ape-form").val().length > 32) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El apellido puede ser de un maximo de 32 caracteres </div>'+
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
        


        function isValidDate(dateString)
        {
            // revisar el patrón
            if(!/^\d{4}\-\d{1,2}\-\d{1,2}$/.test(dateString))
                return false;

            // convertir los numeros a enteros
            var parts = dateString.split("/");
            var day = parseInt(parts[2], 10);
            var month = parseInt(parts[1], 10);
            var year = parseInt(parts[0], 10);

            // Revisar los rangos de año y mes
            if( (year < 1000) || (year > 3000) || (month == 0) || (month > 12) )
                return false;

            var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

            // Ajustar para los años bisiestos
            if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
                monthLength[1] = 29;

            // Revisar el rango del dia
            return day > 0 && day <= monthLength[month - 1];
        };


        $("button").click(function() {
        alert( isValidDate($("#fechaentrega").val()) );
        });

        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 32) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 32 caracteres </div>'+
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

    //validar intereses______________________________________________________________________________________
        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 32) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 32 caracteres </div>'+
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

        //validar contacto_________________________________________________________________________________________
        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 32) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 32 caracteres </div>'+
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
        if($("#nom-form").val().length < 1 || $("#nom-form").val().length > 32) {
            data =  '<div class="alert alert-danger"><span class="glyphicon glyphicon-remove"></span> El nombre es obligatorio max 32 caracteres </div>'+
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