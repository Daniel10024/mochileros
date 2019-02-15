<?php
	//session_start();

	$mysqli = mysqli_connect('localhost', 'root', '');
	$bd = mysqli_select_db($mysqli, "mochileros4");
	$conn = new PDO("mysql:host=localhost;dbname=mochileros4", "root", "");
	/*

	$mysqli = mysqli_connect('localhost', 'u173991785_mochi', 'fsPMfXy1qfN8');
	$bd = mysqli_select_db($mysqli, "u173991785_mochi");
	$conn = new PDO("mysql:host=localhost;dbname=u173991785_mochi", "u173991785_mochi", "fsPMfXy1qfN8");
	*/

	if (!$mysqli) 
	{
		exit("error: ".mysqli_errno(). "-". mysql1_error());
	}


?>

