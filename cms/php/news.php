<?php 	
	include_once('conn.php');
	mysqli_set_charset($conn, 'utf8');
	include_once('class/news.class.php');
	include_once('class/resize.class.php');
	include_once('escapeSQL.php');
	
	$News = new News;
	$post = EscapeArray($_POST);
	
	if(isset($_POST['action'])){
		if($_POST['action']=='create'){
			$Imagens = array();	
			
			if(!isset($_POST['image1'])){
				
				if($_FILES['image1']['type']=='image/jpeg'){
					$Imagens[1]=$_FILES['image1'];
				}
			}
			if(!isset($_POST['image2'])){
				if($_FILES['image2']['type']=='image/jpeg'){
					$Imagens[2]=$_FILES['image2'];
				}
			}
			if(!isset($_POST['image3'])){
				if($_FILES['image3']['type']=='image/jpeg'){
					$Imagens[3]=$_FILES['image3'];
				}
			}
			if(!isset($_POST['image4'])){
				if($_FILES['image4']['type']=='image/jpeg'){
					$Imagens[4]=$_FILES['image4'];
				}
			}
			
			$i=0;
			$Images = array(
				0=>'none.jpg',
				1=>'none.jpg',
				2=>'none.jpg',
				3=>'none.jpg',
			);
			foreach($Imagens as $key=>$value){
			
				$tempo = time().'.jpg';
				$NomeUnico = md5(time().$i).'.jpg';
				move_uploaded_file($value['tmp_name'], '../imagens/upar'.$tempo);			
				
				$resizeObj = new resize('../imagens/upar'.$tempo);	
				$resizeObj -> resizeImage(1000, 500, 'crop');		
				$resizeObj -> saveImage('../imagens/news/'.$NomeUnico, 80);
				
				$Images[$i]=$NomeUnico;
				$i++;
				
				unlink('../imagens/upar'.$tempo);
				
			}
			
			$ReturnCreate = $News->CreateNews($conn, $post, $Images);
			if($ReturnCreate==true){
				echo 'ok';
			}else{
				for($i=0; $i<=$Images; $i++){
					if($Images[$i]=='none.jpg'){
						break;
					}else{
						unlink('../imagens/news/'.$Images[$i]);
					}
				}
				echo '<br/><label class="erro">Aconteceu um erro ao cadastrar!<br/>Código do erro: '.$ReturnCreate.'.</label>';
			}
		}
		
		if($_POST['action']=='loadlist'){			
			$News->SelectMultNews($conn, $_POST['type'], $_POST['page']);
		}
		
		if($_POST['action']=='delete'){
			$News->DeleteNews($conn, $_POST['id']);
		}
		
		if($_POST['action']=='edit'){
			$Return = $News->UpdateNews($conn, $post['data']['id'], $post['data']);
			if($Return==true){
				echo '<label class="ok">Salvo com sucesso!</label>';
			}else{
				echo '<label class="erro">Erro ao efetuar operação!<br/>Código do erro: '.$Return.'.</label>';
			}
		}
	}
?>