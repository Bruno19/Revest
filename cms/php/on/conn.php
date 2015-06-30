<?php
	$conn = mysqli_connect('mysql.hostinger.com.br', 'u894602325_cms', 'senha123', 'u894602325_cms')or die(mysqli_connect_error());
	mysqli_set_charset($conn, 'utf8');
	session_start();
	//error_reporting(0);
?>