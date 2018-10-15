<?php
	//session_start();

	$mysqli = mysqli_connect('localhost', 'root', '');
	if (!$mysqli) 
	{
		exit("error: ".mysqli_errno(). "-". mysql1_error());
	}
	$bd = mysqli_select_db($mysqli, "mochileros");

?>