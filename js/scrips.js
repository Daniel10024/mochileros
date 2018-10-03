function onSignIn (googleUser)
{

	location.href ="p1.html";
 
   }

function signOut() 
{
	var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      alert('User signed out.');
    });

 
  }