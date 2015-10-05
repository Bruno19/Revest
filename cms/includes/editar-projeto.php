<script type="text/javascript" src="js/cadastrar-projeto.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina">Editar Projeto</h1><br/>
	
	<form name="editproject" method="post" onsubmit="return EditarNomeProjeto(this)">	
		<input type="hidden" name="id" value="<?php echo $Project->Id;?>"/>
		<div class="Linha">
			Editar Nome:<br/>
			<input type="text" name="name" class="Campo input" placeholder="Nome do Projeto: " style="width: 37.3%" value="<?php echo $Project->Name;?>"/>
			<input type="submit" value="Salvar Alteração" class="Campo Btn CadEmp AlterDs"/>			
		</div>		
		<div class="Linhainput RespCad">
			&nbsp;
		</div>
		<br/><br/>
	</form>
	
	
	<h1 class="TituloPagina">Imagens do projeto</h1>
	<form name="addimages" method="post" action="" enctype="multipart/form-data" onsubmit="return ValidarTextoImg(this)">	
		<input type="hidden" name="addimage" value="ok"/>
		<input type="hidden" name="project" value="<?php echo $Project->Id;?>"/>
		<div class="Linha">			
			<input type="text" name="text" class="Campo input" placeholder="Texto da Imagem: " style="width: 37.3%"/>
		</div>
		<div class="Linha">
			<input type="file" name="images[]" accept="image/jpeg" required  class="Campo Btn CadEmp AlterDs" multiple /> - Selecionar Imagens (JPEG)
		</div>
		<div class="Linha">
			<input type="submit" value="Adicionar Imagens" class="Campo Btn CadEmp AlterDs"/>			
		</div>		
		<div class="Linhainput">
			<?php include_once('php/project.php');?>		
		</div>
		<br/><br/>
	</form>	
	
	<div class="Linha">
		<?php 
			$Project->SelectImages($conn, $_GET['id']);			
		
			
			if(isset($_POST['alter-parter'])){				
				
				include_once('php/escapeSQL.php');
				$post = EscapeArray($_POST);
				
				if($_FILES['imagem']['error']!=4){
					include_once('class/resize.class.php');
					$Img = $_FILES['imagem'];
					if($Img['type']=='image/jpeg' || $Img['type']=='image/png'){						
					
						move_uploaded_file($Img['tmp_name'], 'imagens/'.$post['name']);			
						
						$resizeObj = new resize('imagens/'.$post['name']);	
						$resizeObj -> resizeImage(900, 450, 'crop');		
						$resizeObj -> saveImage('imagens/projetos/'.$post['name'], 95);
						
					//	unlink('imagens/'.$post['name']);
						
					}	
				}				
				
				$UpDateLink = mysqli_query($conn, "UPDATE images_pr SET text_im='$post[linkimage]' WHERE id_im=$post[id]");
				
				if($UpDateLink){
					echo '<script type="text/javascript">location.href="";</script>';
				}else{
					echo '<script type="text/javascript">alert("Erro ao editar!");</script>';
				}
			}
		?>
		<div class="esp"></div>
	</div>
</section>