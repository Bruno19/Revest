<?php
	include_once('conn.php');
	
	if(isset($_POST['action'])){
		if($_POST['action']=='alter-image'){
			var_dump($_POST);
		}
	}
?>