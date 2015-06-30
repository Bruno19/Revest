<?php
	include_once('conn.php');
	mysqli_set_charset($conn, 'utf8');
	include_once('class/orgao-setor.class.php');
	include_once('escapeSQL.php');
	$Orgao = new OrgaoSetor;
	$post = EscapeArray($_POST);
	
	if(isset($_POST['action'])){
		if($_POST['action']=='create'){
			$Orgao->CreateOrgan($conn, $post['data']);
		}
		if($_POST['action']=='edit'){
			$Orgao->EditOrgan($conn, $post['data']);
		}
		
		if($_POST['action']=='loadlist'){
			$Orgao->SelectMultOrgan($conn, '', $_POST['page']);
		}
		
		if($_POST['action']=='delete'){
			$Orgao->DeleteOrgao($conn, $_POST['id']);
		}
	}
?>