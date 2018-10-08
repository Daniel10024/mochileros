function onSignIn (googleUser)
{
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
}


function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    	auth2.disconnect();
    	location.href ="index.html";
      
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
        var json = JSON.parse(JSON.stringify(data));
        var texto = "";
        texto += '<tr>'+
                      '<td>'+
                        '<img class="cardo" src='+json.foto+' alt="" />'+
                      '</td>'+
                      '<td><p>'+json.nombre + " " + json.apellido+'</p></td>'+
                      '<td align="center">'+
                        '<a name="ver1" href="p8.php?id='+json.ida+'" title="Ver" class="btn btn-primary"><em class="glyphicon glyphicon-eye-open"></em></a>'+
                        '<a name="del1" title="Eliminar" class="btn btn-danger row-remove" data-toggle="modal" data-target="#delete"><em class="glyphicon glyphicon-trash"></em></a>'+
                      '</td>'+
                  '</tr>';
        /*$('#a_nom').html(json.nombre + " " + json.apellido);*/
        $("#tbody").html(texto);
    });
});




/*
$(document).ready(function amigos() {
    var _urlform ='amigos.php';
    var id_yo = myvar;
    $.post(_urlform,{id:id_yo},
    function(data){
      var json = JSON.parse(JSON.stringify(data));
      var texto = "";
      $.each(json, function (key, data) {
        texto += "<option value='"+key+"'>"+data+"</option>";
        alert(key + ": " + data)
      });  
    });
});
*/
