<?php
	//session_start();

	//$mysqli = mysqli_connect('localhost', 'id7451751_mochilerodb', '123456');
	$mysqli = mysqli_connect('localhost', 'root', '');
	if (!$mysqli) 
	{
		exit("error: ".mysqli_errno(). "-". mysql1_error());
	}
	$bd = mysqli_select_db($mysqli, "mochileros2");
	//$bd = mysqli_select_db($mysqli, "id7451751_mochilerodb");

?>