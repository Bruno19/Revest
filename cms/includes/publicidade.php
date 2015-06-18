<section class="Centro Conteudo">
	<h1 class="TituloPagina">Publicidade</h1><br/>
	
	<?php
		$SelectPubli = mysqli_query($conn, "SELECT * FROM publicidade");
		$i=1;
		while($Dados = mysqli_fetch_object($SelectPubli)){
			echo'
				<div class="Publicidade">
					';
					
					if($Dados->name_p!='centro1'){
						echo 'Topo '.$i;
					}else{
						echo 'Centro 1';
					}
					
					if($Dados->image_p==''){
						echo '<img src="imagens/publicidade/none.jpg" alt="image"/>';
					}else{
						echo '<img src="imagens/publicidade/'.$Dados->image_p.'" alt="image"/>';
					}
										
					echo'
					<br/>
					<form name="" method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="cadimage" value="ok"/>
						<input type="hidden" name="id" value="'.$Dados->id_p.'"/>
						<input type="hidden" name="image" value="'.$Dados->image_p.'"/>
						<input type="text" name="url" value="'.$Dados->url_p.'" class="Campo" placeholder="URL / Link: "/>
						<input type="file" name="image" class="Campo Btn CadEmp AlterDs" accept="image/jpeg"/>
						<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterDs"/>
					</form>
					
					<br/><br/>
					<form name="del" method="post" onsubmit="return confirm('."'".'Deseja mesmo fazer isto?'."'".')" action="">
						<input type="hidden" name="del" value="ok"/>
						<input type="hidden" name="image" value="'.$Dados->image_p.'"/>
						<input type="hidden" name="id" value="'.$Dados->id_p.'"/>
						<input type="submit" value="Excluir" style="background: #d00" class="Campo Btn CadEmp AlterDs"/>
					</form>
				</div>
			';
			
			$i++;
		}
		
		if(isset($_POST['del'])){
			if($_POST['image']!=''){
				unlink('imagens/publicidade/'.$_POST['image']);
				mysqli_query($conn, "UPDATE publicidade SET image_p='' WHERE id_p=$_POST[id]");
				echo '<script type="text/javascript">location.href="";</script>';
			}
		}
		
		if(isset($_POST['cadimage'])){
			
			$Img = $_FILES['image'];
			include_once('php/escapeSQL.php');
			
			$post = EscapeArray($_POST);
			
			mysqli_query($conn, "UPDATE publicidade SET url_p='$post[url]' WHERE id_p=$_POST[id]");
			if($Img['error']!='0'){
				echo '<script type="text/javascript">location.href="";</script>';
			}else
			if($Img['type']!='image/jpeg'){
				echo '<script type="text/javascript">alert("Selecione uma imagem JPEG!"); history.back();</script>';
			}else{
				include_once('php/class/resize.class.php');
				$Extencao =  substr($Img['name'], -4);
				
				$tempo = time().$Extencao;
				$NomeUnico = md5(time()).$Extencao;
				move_uploaded_file($Img['tmp_name'], 'imagens/upar'.$tempo);			
				
				$resizeObj = new resize('imagens/upar'.$tempo);	
				$resizeObj -> resizeImage(330, 226, 'crop');		
				$resizeObj -> saveImage('imagens/publicidade/'.$NomeUnico, 100);			
					
				unlink('imagens/upar'.$tempo);
				
				$Insert = mysqli_query($conn, "UPDATE publicidade SET image_p='$NomeUnico' WHERE id_p=$_POST[id]");
				if($Insert){
					echo '<script type="text/javascript">location.href="";</script>';
				}else{
					echo '<script type="text/javascript">alert("Erro ao realizar operação! \n Código do erro: '.mysqli_error($conn).'."); history.back();</script>';
					unlink('imagens/publicidade/'.$NomeUnico);
				}
				
			}
		}
	?>
	<div class="esp"></div>
</section>