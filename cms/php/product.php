<?php
	include_once('conn.php');
	include_once('class/product.class.php');
	include_once('class/resize.class.php');
	include_once('escapeSQL.php');
	
	$Product = new Product;
	$post=EscapeArray($_POST);
	if(isset($_POST['action'])){
		if($_POST['action']=='create'){
			
			$Img = $_FILES['image'];
			
			$tempo = time().'.jpg';
			$NomeUnico = md5(time()).'.jpg';
			move_uploaded_file($Img['tmp_name'], '../imagens/upar'.$tempo);			
			
			$resizeObj = new resize('../imagens/upar'.$tempo);	
			$resizeObj -> resizeImage(200, 230, 'crop');		
			$resizeObj -> saveImage('../imagens/produto/'.$NomeUnico, 80);			
				
			unlink('../imagens/upar'.$tempo);
			$Product->CreateProduct($conn, $NomeUnico, $post);
		}
		
		if($_POST['action']=='loadlist'){
			$Product->SelectMultProducts($conn, $_POST['type'], $_POST['page']);
		}
		
		if($_POST['action']=='edit'){
			$Product->UpdateProduct($conn, $post['data']);
		}
		
		if($_POST['action']=='delete'){
			$Product->DeleteProduct($conn, $post['id']);
		}
	}
?>