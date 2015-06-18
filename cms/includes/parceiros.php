<section class="Centro Conteudo">
	<h1 class="TituloPagina">Parceiros</h1><br/>
	
	<form name="partners" method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="action" value="cadpartner"/>
		<div class="Linha">				
			<input type="text" name="url" class="Campo input" placeholder="Link / URL: " style="width: 37.3%"/>						
		</div>
		<div class="Linha">
			Imagem (JPEG ou PNG - 205x87): <br/>
			<input type="file" name="image" class="Campo Btn CadEmp AlterDs"/>
		</div>		
		<div class="Linha">
			<input type="submit" value="Cadastrar" class="Campo Btn CadEmp AlterDs"/>
		</div>
	</form>
	<br/><br/>
	<?php include_once('php/partners.php');?>
	
	<div class="esp"></div>
</section>