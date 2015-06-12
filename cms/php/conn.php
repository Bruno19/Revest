<?php
	$conn = mysqli_connect('localhost', 'root', '', 'incena')or die(mysqli_connect_error());
	mysqli_set_charset($conn, 'utf8');
	session_start();
	//error_reporting(0);
?>