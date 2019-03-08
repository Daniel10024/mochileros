var googleUser = {};
  var startApp = function() {
    gapi.load('auth2', function(){
      auth2 = gapi.auth2.init();
      attachSignin(document.getElementById('customBtn'));
    });
  };

  function attachSignin(element) {
    
    auth2.attachClickHandler(element, {},
      function(googleUser) {
        var profile = googleUser.getBasicProfile();
        var user_fulname = profile.getName();
        var user_id = profile.getId();
        var user_firstname = profile.getGivenName();
        var user_lastname = profile.getFamilyName();
        var user_image = profile.getImageUrl();
        var user_email = profile.getEmail();
        var _urlform ='crear_cuenta.php';
        $.post(_urlform,{id:user_id, nombre:user_firstname, apellido:user_lastname, foto:user_image, contacto:user_email},
        function(data){
          if(data != 1){
            
            location.href ="p1.php";

            console.log('ID: ' + profile.getId());
            console.log('Full Name: ' + profile.getName());
            console.log('first Name: ' + profile.getGivenName());
            console.log('last Name: ' + profile.getFamilyName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail());
                        
          }
          else{
            alert(data)
          }
        });
      }, function(error) {
          console.log(JSON.stringify(error, undefined, 2));
        });
  }


function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    	auth2.disconnect();
    	location.href ="index.html/../";
    });
  }
	


function onLoad() {
      gapi.load('auth2', function() {
       auth2 = gapi.auth2.init();
      });
    }


function invitado(){
  var _urlform ='crear_cuenta.php';
    $.post(_urlform,{id:'1', nombre:"Invitado", apellido:" ", foto:"foto", contacto:"contacto"},
    function(data){
        if(data != 1){
          
          location.href ="p1.php";
                      
        }
        else{
          alert(data)
        }
    });
}


$(document).ready(function amigos() {
    var _urlform ='amigos.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        var ventana_modal2 = "";
        $.each(json, function(i, item) {
          if (item.ida != id_yo) {
            texto += '<tr>'+
                      '<td>'+
                        '<img class="cardo2" src="img/foto/'+item.ida+'.jpg" alt="" />'+
                      '</td>'+
                      '<td><p>'+item.nombre + " " + item.apellido+'</p></td>'+
                      '<td align="center">'+
                        '<a name="ver1" href="p8.php?id='+item.ida+'" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'+
                        '<a name="del1" title="Eliminar" onclick="modal_eliminar_amix('+item.ida+')" class="btn btn-danger row-remove"><em class="glyphicon glyphicon-trash"></em></a>'+
                      '</td>'+
                    '</tr>';

           /* ventana_modal2 +=  '<div class="modal fade" id="delete'+item.ida+'" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">'+
                              '<div class="modal-dialog">'+
                                '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                      '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
                                      '<h4 class="modal-title custom_align" id="Heading">Eliminar contacto</h4>'+
                                  '</div>'+
                                     '<div class="modal-body">'+
                                      '<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>'+
                                    '</div>'+
                                    '<div class="modal-footer ">'+
                                      '<button id="botonsi" onclick="eliminar('+item.ida+')" type="button" class="btn btn-success botonmodal"><span class="glyphicon glyphicon-ok-sign row-remove"></span>Si</button>'+
                                      '<button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>'+
                                    '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>';*/
          }
        })
        $("#tbody").html(texto);
        console.log(ventana_modal2);
        //alert(ventana_modal2);
        $("#modal_aca2").html(ventana_modal2);
    });
});



function modal_eliminar_amix(valor){
  var valor = valor;
  $('#delete_amix').modal('show')
  $('#botonsi_eliminar').on("click", function() {
    eliminar_amix(valor);
  });
}

function eliminar_amix(soli){
  var id_yo = myvar;
  var _urlform ='eliminar_amigo.php';
    $.post(_urlform,{id_amigo:soli, id_yo:id_yo},
    function(data){
        if(data != 1){
          
          location.href ="p7.php";
                      
        }
        else{
          alert(data)
        }
    });
}


/*function eliminar(soli){
  var id_yo = myvar;
  var _urlform ='eliminar_amigo.php';
    $.post(_urlform,{id_amigo:soli, id_yo:id_yo},
    function(data){
        if(data != 1){
          
          location.href ="p7.php";
                      
        }
        else{
          alert(data)
        }
    });
}*/


$(document).ready(function solicitudes() {
    var _urlform ='solisitudes.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        var ventana_modal = "";
        $.each(json, function(i, item) {
          if (item.ida != id_yo) {
            texto += '<tr>'+
                      '<td>'+
                        '<img class="cardo" src="img/foto/'+item.ida+'.jpg" alt="" />'+
                      '</td>'+
                      '<td><p>'+item.nombre + " " + item.apellido+'</p></td>'+
                      '<td align="center">'+
                        '<a name="aceptar" onclick="aceptar('+item.ida+')" title="Aceptar" class="btn btn-primary"><em class="glyphicon glyphicon-thumbs-up"></em></a>'+
                        '<a name="rechazar" title="rechazar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete'+item.ida+'"><em class="glyphicon glyphicon-thumbs-down"></em></a>'+
                      '</td>'+
                    '</tr>';

          ventana_modal +=  '<div class="modal fade" id="delete'+item.ida+'" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">'+
                              '<div class="modal-dialog">'+
                                '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                      '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
                                      '<h4 class="modal-title custom_align" id="Heading">Eliminar contacto</h4>'+
                                  '</div>'+
                                     '<div class="modal-body">'+
                                      '<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>'+
                                    '</div>'+
                                    '<div class="modal-footer ">'+
                                      '<button id="botonsi" onclick="rechazar('+item.ida+')" type="button" class="btn btn-success botonmodal"><span class="glyphicon glyphicon-ok-sign row-remove"></span>Si</button>'+
                                      '<button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>'+
                                    '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>';
             
          }
        })
        $("#tbody2").html(texto);
        $("#modal_aca").html(ventana_modal);
    });
});

function enviar(){
  var id_yo = myvar;
  var id_el = suvar;
  var _urlform ='enviar_solicitud.php';
    $.post(_urlform,{id_amigo:id_el, id_yo:id_yo},
    function(data){
        if(data != 1){
          location.href ="p8.php?id="+id_el+"";
                      
        }
        else{
          alert(data)
        }
    });
}

function aceptar(soli){
  var id_yo = myvar;
  var _urlform ='aceptar_solicitud.php';
    $.post(_urlform,{id_amigo:soli, id_yo:id_yo},
    function(data){
        if(data != 1){
          
          location.href ="p7.php";
                      
        }
        else{
          alert("algo esta fincionando mal con la base de datos, porfavor cantacte con soporte para resolverlo")
        }
    });
}

function rechazar(soli){
  var id_yo = myvar;
  var _urlform ='rechazar_solicitud.php';
    $.post(_urlform,{id_amigo:soli, id_yo:id_yo},
    function(data){
        if(data != 1){
          
          location.href ="p7.php";
                      
        }
        else{
          alert(data)
        }
    });
}



$(document).ready(function publicaciones() {
    var _urlform ='publicaciones.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},    
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        $.each(json, function(i, item) {
          if (id_yo == 1) {
            if (item.image == '<div></div>') {
              texto +='<div class="noticia">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="testimonials">'+
                                  '<div class="active item">'+
                                      '<blockquote><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                        '<div class="pull-left">'+
                                        '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                      '</div>'+
                                          '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                          
                                        '</blockquote>'+
                                      '<div class="table-responsive">'+ 
                                        '<table><div class="row coment"><div class="col-sm-12 col-md-12"><p class="p_coment">'+item.coment+'</p></div>'+
                                        '<div class="col-sm-4 col-md-3">'+item.image+'</div></div></table>'+
                                      '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                      '</div>';


              }
              else {
                texto +='<div class="noticia">'+
                          '<div class="row">'+
                              '<div class="col-md-12">'+
                                  '<div class="testimonials">'+
                                    '<div class="active item">'+
                                        '<blockquote><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                          '<div class="pull-left">'+
                                          '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                        '</div>'+
                                            '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                            
                                          '</blockquote>'+
                                        '<div class="table-responsive">'+ 
                                          '<table><div class="row coment"><div class="col-md-6"><p class="p_coment">'+item.coment+'</p></div>'+
                                          '<div class="col-md-6">'+item.image+'</div></div></table>'+
                                        '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>';
           

              }
          } // if yo == invitado
          else{

          
          if (item.ida == id_yo) {
              if (item.image == '<div></div>') {
                
              texto +='<div class="noticia">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="testimonials">'+
                                  '<div class="active item">'+
                                      '<blockquote><a href="p2.php"><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                        '<div class="pull-left">'+
                                        '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                      '</div></a>'+
                                          '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                          '<button type="button" class="close error" onclick="modal_eliminar('+item.idp+')" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
                                        '</blockquote>'+
                                      '<div class="table-responsive">'+ 
                                        '<table><div class="row coment"><div class="col-sm-12 col-md-12"><p class="p_coment">'+item.coment+'</p></div>'+
                                        '<div class="col-sm-4 col-md-3">'+item.image+'</div></div></table>'+
                                      '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                      '</div>';


              }
              else {
                texto +='<div class="noticia">'+
                          '<div class="row">'+
                              '<div class="col-md-12">'+
                                  '<div class="testimonials">'+
                                    '<div class="active item">'+
                                        '<blockquote><a href="p2.php"><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                          '<div class="pull-left">'+
                                          '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                        '</div></a>'+
                                            '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                            '<button type="button" class="close error" onclick="modal_eliminar('+item.idp+')" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
                                          '</blockquote>'+
                                        '<div class="table-responsive">'+ 
                                          '<table><div class="row coment"><div class="col-md-6"><p class="p_coment">'+item.coment+'</p></div>'+
                                          '<div class="col-md-6">'+item.image+'</div></div></table>'+
                                        '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>';
           

              }
          } //if mi publicacion
          else{
              if (item.image == '<div></div>') {
              texto +='<div class="noticia">'+
                        '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<div class="testimonials">'+
                                  '<div class="active item">'+
                                      '<blockquote><a href="p8.php?id='+item.ida+'"><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                        '<div class="pull-left">'+
                                        '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                      '</div></a>'+
                                          '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                        '</blockquote>'+
                                      '<div class="table-responsive">'+ 
                                        '<table><div class="row coment"><div class="col-sm-12 col-md-12"><p class="p_coment">'+item.coment+'</p></div>'+
                                        '<div class="col-sm-4 col-md-3">'+item.image+'</div></div></table>'+
                                      '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                      '</div>';
              }
              else {
                texto +='<div class="noticia">'+
                          '<div class="row">'+
                              '<div class="col-md-12">'+
                                  '<div class="testimonials">'+
                                    '<div class="active item">'+
                                        '<blockquote><a href="p8.php?id='+item.ida+'"><img alt="" src="img/foto/'+item.ida+'.jpg" class="pull-left cardo">'+
                                          '<div class="pull-left">'+
                                          '<span class="testimonials-name">'+item.nombre + " " + item.apellido+'</span>'+
                                        '</div></a>'+
                                            '<span class="testimonials-post hidden-xs">'+item.fecha+'</span>'+
                                          '</blockquote>'+
                                        '<div class="table-responsive">'+ 
                                          '<table><div class="row coment"><div class="col-md-6"><p class="p_coment">'+item.coment+'</p></div>'+
                                          '<div class="col-md-6">'+item.image+'</div></div></table>'+
                                        '</div>'+
                                      '</div>'+
                                  '</div>'+
                              '</div>'+
                          '</div>'+
                        '</div>';
              }
          }
          }
        })
        $("#notice").html(texto);
        $("#modal_acap").html(ventana_modalp);
    });
});

//eliminar publicacion_____________________

function modal_eliminar(valor){
  var valor = valor;
  $('#delete_public').modal('show')
  $('#botonsi_eliminar').on("click", function() {
    eliminar_publicacion(valor);
  });
}

function eliminar_publicacion(soli){
  var id_yo = myvar;
  var _urlform ='eliminar_publicacion.php';
    $.post(_urlform,{soli:soli, id_yo:id_yo},
    function(data){
        if(data != 1){
          
          location.href ="p1.php";
                      
        }
        else{
          alert(data)
        }
    });
}


/*____________________________________________________________*/

/*previsualizar foto de publicacion*/
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#aca + img').remove();
            $('#aca').html('<img class="right" src="'+e.target.result+'" width="185"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#publicar-foto").change(function () {
    filePreview(this);
});

/*____________________________________________________________*/

/*previsualizar foto de perfil*/
function filePreview2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#foto_perfil + img').remove();
            $('#foto_perfil').html('<img src="'+e.target.result+'" />');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function () {
    filePreview2(this);
});
/*____________________________________________________________*/

/*cambiar icono public/global*/
$("#Public").change(function () {
  $("#dibujito").removeClass("glyphicon-user").addClass("glyphicon-globe");
});

$("#Friends").change(function () {
  $("#dibujito").removeClass("glyphicon-globe").addClass("glyphicon-user");
});

//cargar notificaciones

$(document).ready(function notificaciones () {
    var _urlform ='notificaciones.php';
    $.post(_urlform,{},    
    function(data){
      $("#num_soli").html(data);
      if (data == 0) {
        if ($("#notifi").hasClass("sinotifi")) {
          $("#notifi").removeClass("sinotifi").addClass("nonotifi");
        };
      }

      if (data > 0) {
        if ($("#notifi").hasClass("nonotifi")) {
          $("#notifi").removeClass("nonotifi").addClass("sinotifi");
        };
      }
    });
});

$(document).ready(function notificaciones2 () {
    var _urlform ='notificaciones.php';
    $.post(_urlform,{},    
    function(data){
      if (data > 0) {
        $("#num_soli2").html(data);
      }
      
    });
});


$(document).ready(function viajes() {
    var _urlform ='mis_viajes.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo}, 
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        //var ventana_modal2 = "";
        $.each(json, function(i, item) {
            texto += 
                            '<tr>'+
                              '<td><p>'+item.vesca+'</p></td>'+
                              '<td><p>'+item.vnom+'</p></td>'+
                              '<td data-name="opt" align="center">'+
                                '<a name="ver1" href="p6.php?id='+item.vvia+'"" title="Editar" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'+
                                //'<a name="del1" title="Eliminar" class="btn btn-danger row-remove " data-toggle="modal" data-target="#delete"><em class="glyphicon glyphicon-trash"></em></a>'+
                                '<a name="del1" title="Eliminar" onclick="modal_eliminar_viaje('+item.vvia+')" class="btn btn-danger row-remove"><em class="glyphicon glyphicon-trash"></em></a>'+
                              '</td>'+
                          '</tr>';

            /*ventana_modal2 +=  '<div class="modal fade" id="delete'+item.ida+'" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">'+
                              '<div class="modal-dialog">'+
                                '<div class="modal-content">'+
                                    '<div class="modal-header">'+
                                      '<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'+
                                      '<h4 class="modal-title custom_align" id="Heading">Eliminar contacto</h4>'+
                                  '</div>'+
                                     '<div class="modal-body">'+
                                      '<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿Seguro que quieres eliminar este registro?</div>'+
                                    '</div>'+
                                    '<div class="modal-footer ">'+
                                      '<button id="botonsi" onclick="eliminar('+item.ida+')" type="button" class="btn btn-success botonmodal"><span class="glyphicon glyphicon-ok-sign row-remove"></span>Si</button>'+
                                      '<button type="button" class="btn btn-default botonmodal" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>'+
                                    '</div>'+
                                '</div>'+
                              '</div>'+
                          '</div>';*/
          
        })
        $("#misviajes").html(texto);
        //$("#modal_aca2").html(ventana_modal2);
    });
});


function modal_eliminar_viaje(valor){
  var valor = valor;
  $('#delete_viaje').modal('show')
  $('#botonsi').on("click", function() {
    eliminar_viaje(valor);
  });
}

function eliminar_viaje(soli){
  //alert ("eliminar viaje");
  var _urlform ='eliminar_viaje.php';
    $.post(_urlform,{id_viaje:soli},
    function(data){
        if(data != 1){
          //alert ("eliminar viaje 2");
          location.href ="p4.php";
        }
        else{
          alert ("error al eliminar el viaje");
          //alert(data)
        }
    });
}


$("#select_idioma").load("idiomas.php");

$(document).ready(function habla() {
    var _urlform ='habla.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        $.each(json, function(i, item) {
            texto += '<option selected value="'+item.idh+'">'+item.habla+'</option>';
        })
        $("#select_idioma").prepend(texto);
    });
});


$(document).ready(function paises() {
    var _urlform ='paises.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
        var json = JSON.parse(data);
        var texto = "";
        var pais_origen = "";
        
        $.each(json, function(i, item) {
            texto += '<option selected value="'+item.idp+'">'+item.pais+'</option>';
        })
        $("#select_pais").html(texto);
        //$("#select_pais").prepend(pais_origen);
    });
});


$(document).ready(function origen() {
    var _urlform ='origen.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
        //var json = JSON.parse(data);
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        $.each(json, function(i, item) {
            texto += '<option selected value="'+item.idh+'">'+item.habla+'</option>';
        })
        $("#select_pais").prepend(texto);
    });
});