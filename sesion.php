<?php
	//session_start();

	//$mysqli = mysqli_connect('localhost', 'id7451751_mochilerodb', '123456');
	// $mysqli = mysqli_connect('localhost', 'root', '');
	// if (!$mysqli) 
	// {
	// 	exit("error: ".mysqli_errno(). "-". mysql1_error());
	// }
	// $bd = mysqli_select_db($mysqli, "mochileros4");
	//$bd = mysqli_select_db($mysqli, "id7451751_mochilerodb");

?>

<?php 
    $servername = "localhost";
    $username = "u173991785_mochi";
    $password = "fsPMfXy1qfN8";
    $dbname = "u173991785_mochi";
    
	//session_start();
    
    //$mysqli = mysqli_connect('localhost', 'u173991785_mochi', 'fsPMfXy1qfN8');
	//$mysqli = mysqli_connect('localhost', 'id7451751_mochilerodb', '123456');
	$mysqli = mysqli_connect('localhost', 'root', '');
	if (!$mysqli) 
	{
		exit("error: ".mysqli_errno(). "-". mysql1_error());
	}
	$bd = mysqli_select_db($mysqli, "mochileros4");
	//$bd = mysqli_select_db($mysqli, "id7451751_mochilerodb");
	//$bd = mysqli_select_db($mysqli, "u173991785_mochi");
 ?>