<script type="text/javascript" src="js/editar-clipping.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo; ?></h1><br/>
	
	<form name="cadclipping" method="post" onsubmit="return CadastrarClipping(this)">
		<input type="hidden" name="id" value="<?php echo $Clipping->Id;?>"/>
		<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%"  value="<?php echo $Clipping->Title;?>"/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="url" class="Campo input" placeholder="URL: " style="width: 37.3%"  value="<?php echo $Clipping->Url;?>"/>						
		</div>	
		
		<div class="Linha">				
			<textarea name="content" class="Campo input" placeholder="Conteúdo: " style="width: 37.3%; height: 180px; resize: none"> <?php echo $Clipping->Content;?></textarea>
		</div>		
		
		<div class="Linha">
			<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterDs"/>
		</div>
		
		<div class="Linhainput resp">
			&nbsp;
		</div>
		<br/><br/>
	</form>
</section>