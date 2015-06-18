<?php
	if(isset($_POST['action'])){
		$Img = $_FILES['image'];
		if($Img['type']!='image/jpeg'){
			echo '<script type="text/javascript">alert("Escolha uma imagem JPEG"); history.back();</script>';
		}else{
			$Extencao =  substr($Img['name'], -4);
			
			include_once('php/class/resize.class.php');
			$tempo = time().$Extencao;
			$NomeUnico = md5(time()).'.jpg';
			move_uploaded_file($Img['tmp_name'], 'imagens/upar'.$tempo);			
			
			$resizeObj = new resize('imagens/upar'.$tempo);	
			$resizeObj -> resizeImage(645, 192, 'crop');		
			$resizeObj -> saveImage('imagens/slider/'.$NomeUnico, 100);			
				
			unlink('imagens/upar'.$tempo);
		}
	}
	
	$path = 'imagens/slider/';
	$dir = dir($path);
	
	while($arquivo=$dir->read()){
		if(substr($arquivo, -4)=='.jpg'){
			echo '
				<div class="ImagensSlider">
					<img src="imagens/slider/'.$arquivo.'" alt="slider">
					<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')" action="">
					<input type="hidden" name="del" value="ok"/>
					<input type="hidden" name="image" value="'.$arquivo.'"/>
					<input type="submit" value="Excluir" class="Campo Btn CadEmp AlterDs"/>
				</form>
				</div>
			';
		}
	}
	
	if(isset($_POST['del'])){
		unlink('imagens/slider/'.$_POST['image']);
		echo '<script type="text/javascript">location.href="";</script>';
	}
?>