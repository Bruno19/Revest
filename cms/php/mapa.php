<?php
	include_once('conn.php');
	include_once('class/mapa.class.php');
	include_once('escapeSQL.php');
	$Mapa = new Mapa;
	$post = EscapeArray($_POST);
	
	if(isset($_POST['action'])){
		if($_POST['action']=='loadselectcid'){
			$Mapa->LoadSelect($conn, strtoupper($post['uf']));
		}
		
		if($_POST['action']=='create'){
			$Mapa->CreateMapping($conn, $post['data']);
		}
		
		if($_POST['action']=='loadmapping'){
			$Mapa->LoadMapping($conn, $post['cidade'], $post['area']);
		}
		
		if($_POST['action']=='loadmapuf'){
			$Mapa->LoadMapUf($conn, $post['uf'], $post['area']);
		}
		
		if($_POST['action']=='loadlist'){
			$Mapa->SelectMultMapping($conn, $post['type'], $post['page']);
		}
		
		if($_POST['action']=='delete'){
			$Mapa->DeleteMapping($conn, $post['id']);
		}
		
		if($_POST['action']=='edit'){
			$Mapa->UpdateMapping($conn, $post['data']['id'], $post['data']);
		}
		
		if($_POST['action']=='search-uf'){
			$Mapa->SearchUF($conn, $post['id']);
		}
	}
	
?>