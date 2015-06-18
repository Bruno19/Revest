<section class="Centro Conteudo">
	<h1 class="TituloPagina">Sliders</h1><br/>
	
	<form name="slider" method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="action" value="cadslider"/>	
		<div class="Linha">
			Imagem (JPEG - 645x192): <br/>
			<input type="file" name="image" class="Campo Btn CadEmp AlterDs"/>
		</div>		
		<div class="Linha">
			<input type="submit" value="Cadastrar" class="Campo Btn CadEmp AlterDs"/>
		</div>
	</form>
	<br/><br/>
	<?php include_once('php/slider.php');?>
	
	<div class="esp"></div>
</section>