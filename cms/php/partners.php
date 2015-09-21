<?php
	if(isset($_POST['action'])){
		if($_POST['action']=='cadpartner'){
			include_once('php/escapeSQL.php');
			$post = EscapeArray($_POST);
			
			$Img = $_FILES['image'];
			if($Img['type']=='image/jpeg' || $Img['type']=='image/png'){
				
				$Extencao =  substr($Img['name'], -4);				
				
				$NomeUnico = md5(time()).$Extencao;
				move_uploaded_file($Img['tmp_name'], 'imagens/parceiros/'.$NomeUnico);		
				
				$Insert = mysqli_query($conn, "INSERT INTO partners(image_pa, url_pa)VALUES('$NomeUnico', '$post[url]')");
				if($Insert){
					echo '<script type="text/javascript">location.href="";</script>';
				}else{
					echo '<script type="text/javascript">alert("Erro ao realizar operação! \n Código do erro: '.mysqli_error($conn).'."); history.back();</script>';
					unlink('imagens/parceiros/'.$NomeUnico);
				}
			}else{
				echo '<script type="text/javascript">alert("Escolha uma imagem JPEG ou PNG"); history.back();</script>';
			}
		}
	}
	
	
	$SelectPartners = mysqli_query($conn, "SELECT * FROM partners ORDER BY id_pa DESC");
	while($partner = mysqli_fetch_object($SelectPartners)){
		echo '
			<div class="Partner">
				<img src="imagens/parceiros/'.$partner->image_pa.'" alt="parceiro"/><br/>
				<a href="'.$partner->url_pa.'" target="_blank">Link</a><br/><br/>
				
				<form name="editpartner" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="alter-parter" value="ok" />
					<input type="hidden" name="id" value="'.$partner->id_pa.'" />
					<input type="hidden" name="name"" value="'.$partner->image_pa.'" />
					<div class="BtnImageEdit">
						Alterar Imagem
						<input type="file" name="imagem" class="Campo Btn CadEmp"/>
					</div>
					<br/>
					<input type="text" name="linkimage" value="'.$partner->url_pa.'" class="Campo"/><br/>
					<input type="submit" value="Salvar" class="Campo Btn CadEmp AlterDs"/>
				</form>
				<br/><br/>
				<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')" action="">
					<input type="hidden" name="del" value="ok"/>
					<input type="hidden" name="image" value="'.$partner->image_pa.'"/>
					<input type="hidden" name="id" value="'.$partner->id_pa.'"/>
					<input type="submit" value="Excluir" class="Campo Btn CadEmp AlterDs"/>
				</form>
			</div>
		';
	}
	
	if(isset($_POST['del'])){
		unlink('imagens/parceiros/'.$_POST['image']);
		mysqli_query($conn, "DELETE FROM partners WHERE id_pa=$_POST[id]");
		echo '<script type="text/javascript">location.href="";</script>';
	}
	
	
	if(isset($_POST['alter-parter'])){
	
		include_once('php/escapeSQL.php');
		$post = EscapeArray($_POST);
		
		if($_FILES['imagem']['error']!=4){
			$Img = $_FILES['imagem'];
			if($Img['type']=='image/jpeg' || $Img['type']=='image/png'){				
				$Extencao =  substr($Img['name'], -4);			
				$NomeUnico = $post['name'];
				move_uploaded_file($Img['tmp_name'], 'imagens/parceiros/'.$NomeUnico);					
			}	
		}		
		
		
		$UpDateLink = mysqli_query($conn, "UPDATE partners SET url_pa='$post[linkimage]' WHERE id_pa=$post[id]");
		
		if($UpDateLink){
			echo '<script type="text/javascript">location.href="";</script>';
		}else{
			echo '<script type="text/javascript">alert("Erro ao editar!");</script>';
		}
	}
	/* 
	
	if($_POST['action']=='cadpartner'){
			include_once('php/escapeSQL.php');
			include_once('php/class/resize.class.php');
			$post = EscapeArray($_POST);
			
			$Img = $_FILES['image'];
			if($Img['type']=='image/jpeg' || $Img['type']=='image/png'){
				
				$Extencao =  substr($Img['name'], -4);
				
				$tempo = time().$Extencao;
				$NomeUnico = md5(time()).$Extencao;
				move_uploaded_file($Img['tmp_name'], 'imagens/upar'.$tempo);			
				
				$resizeObj = new resize('imagens/upar'.$tempo);	
				$resizeObj -> resizeImage(205, 87, 'crop');		
				$resizeObj -> saveImage('imagens/parceiros/'.$NomeUnico, 100);			
					
				unlink('imagens/upar'.$tempo);
				
				$Insert = mysqli_query($conn, "INSERT INTO partners(image_pa, url_pa)VALUES('$NomeUnico', '$post[url]')");
				if($Insert){
					echo '<script type="text/javascript">location.href="";</script>';
				}else{
					echo '<script type="text/javascript">alert("Erro ao realizar operação! \n Código do erro: '.mysqli_error($conn).'."); history.back();</script>';
					unlink('imagens/parceiros/'.$NomeUnico);
				}
			}else{
				echo '<script type="text/javascript">alert("Escolha uma imagem JPEG ou PNG"); history.back();</script>';
			}
		}
		
	*/
?>