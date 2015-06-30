<?php
	include_once('conn.php');
	mysqli_set_charset($conn, 'utf8');
	if(isset($_POST['action'])){
		if($_POST['action']=='alter-image'){
			include_once('php/class/resize.class.php');
				
			$Img = $_FILES['image'];
			if($Img['type']!='image/jpeg'){
				echo '<script type="text/javascript"> alert("Escolha apenas imagens JPEG!"); history.back();</script>';
			}else{
				$tempo = time().'.jpg';
				if($_POST['name']=='none.jpg'){
					$NomeUnico = md5(time()).'.jpg';
				}else{
					$NomeUnico = $_POST['name'];
				}
				move_uploaded_file($Img['tmp_name'], 'imagens/upar'.$tempo);			
				
				$resizeObj = new resize('imagens/upar'.$tempo);	
				$resizeObj -> resizeImage(1000, 500, 'crop');		
				$resizeObj -> saveImage('imagens/news/'.$NomeUnico, 80);			
					
				unlink('imagens/upar'.$tempo);
				
				echo '<script type="text/javascript"> location.href="";</script>';
				
				if($_POST['name']=='none.jpg'){
					$SelectNews = mysqli_query($conn, "UPDATE news SET $_POST[field]='$NomeUnico' WHERE id_no=$_POST[id]");
				}
			}
		}
	}
?>