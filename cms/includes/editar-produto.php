<script type="text/javascript" src="js/editar-produto.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo; ?></h1><br/>
	
	<form name="cadprod" method="post" id="cadprod" onsubmit="return EditarProduto(this)" enctype="multipart/form-data">	
		<input type="hidden" name="id" value="<?php echo $Product->Id;?>"/>
		<input type="hidden" name="action" value="edit"/>
		<input type="hidden" name="type"  value="<?php echo $Product->Type;?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%" value="<?php echo $Product->Title;?>"/>						
		</div>
		<div class="Linha"  <?php echo $Hide;?>>				
			Destaque: 
			<input type="radio" name="featured" value="1" <?php if($Product->Featured==1){echo'checked';}?>/>Sim | 
			<input type="radio" name="featured" value="0" <?php if($Product->Featured==0){echo'checked';}?>/>Não 						
		</div>
		
		<div class="Linha">				
			<input type="text" name="subtitle" class="Campo input" <?php echo $Subtitle;?> style="width: 37.3%" value="<?php echo $Product->Subtitle;?>"/>						
		</div>
		
		<div class="Linha" <?php echo $Hide;?>>				
			<input type="text" name="contact" class="Campo input" placeholder="Telefone / Contato : " style="width: 37.3%"  value="<?php echo $Product->Contact;?>"/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="url" class="Campo input" placeholder="Link / URL: " style="width: 37.3%"  value="<?php echo $Product->Link;?>"/>						
		</div>	
		
		<div class="Linha">				
			<textarea name="content" class="Campo input" placeholder="Descrição: " style="width: 37.3%; height: 180px; resize: none"><?php echo $Product->About;?></textarea>
		</div>		
	
		<div class="Linha">
			<input type="submit" value="Salvar" class="Campo Btn CadEmp AlterDs"/>
		</div>
	</form>
		<div class="Linhainput resp">
			&nbsp;
		</div>
		<br/><br/>
		<h2>Alterar Imagem</h2>
		<img src="imagens/produto/<?php echo $Product->Image;?>" alt="<?php echo $Product->Title;?>" class=""/>
		<form name="editimage" method="post" action="" onsubmit="return confirm('Deseja mesmo fazer isto?')" enctype="multipart/form-data">
			<input type="hidden" name="name" value="<?php echo $Product->Image;?>"/>
			<input type="hidden" name="action" value="alterimage"/>
			<input type="file" name="image" class="Campo Btn CadEmp AlterDs" accept="image/jpeg"/><br/>
			<input type="submit" value="Alterar" class="Campo Btn CadEmp AlterDs"/>
		</form>
		<?php
			if(isset($_POST['action'])){
				include_once('php/class/resize.class.php');
				
				$Img = $_FILES['image'];
				if($Img['type']!='image/jpeg'){
					echo '<script type="text/javascript"> alert("Escolha apenas imagens JPEG!"); history.back();</script>';
				}else{
					$tempo = time().'.jpg';
					$NomeUnico = $_POST['name'];
					move_uploaded_file($Img['tmp_name'], 'imagens/upar'.$tempo);			
					
					$resizeObj = new resize('imagens/upar'.$tempo);	
					$resizeObj -> resizeImage(200, 230, 'crop');		
					$resizeObj -> saveImage('imagens/produto/'.$NomeUnico, 80);			
						
					unlink('imagens/upar'.$tempo);
					
					echo '<script type="text/javascript"> location.href="";</script>';
				}
			}
		?>
		<br/><br/>
</section>