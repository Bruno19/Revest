<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/cadastrar-produto.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo; ?></h1><br/>
	
	<form name="cadprod" method="post" id="cadprod" onsubmit="return CadastrarProduto(this)" enctype="multipart/form-data" action="php/product.php">	
		<input type="hidden" name="action" value="create"/>
		<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%"/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="subtitle" class="Campo input" <?php echo $Subtitle;?> style="width: 37.3%"/>						
		</div>
		
		<div class="Linha" <?php echo $Hide;?>>				
			<input type="text" name="contact" class="Campo input" placeholder="Telefone / Contato : " style="width: 37.3%" value=""/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="url" class="Campo input" placeholder="Link / URL: " style="width: 37.3%"/>						
		</div>	
		
		<div class="Linha">				
			<textarea name="content" class="Campo input" placeholder="Descrição: " style="width: 37.3%; height: 180px; resize: none"></textarea>
		</div>		
		
		<div class="Linha">
    		<input type="file" name="image" class="Campo Btn CadEmp AlterDs" accept="image/jpeg"/>
		</div>
		
		<div class="Linha">
			<input type="submit" value="Cadastrar" class="Campo Btn CadEmp AlterDs"/>
		</div>
		
		<div class="Linhainput resp">
			&nbsp;
		</div>
		<br/><br/>
	</form>
</section>