<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

<script type="text/javascript" >
	tinymce.init({
		selector: ".tiny",
		theme: "modern",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
		templates: [
			{title: 'Test template 1', content: 'Test 1'},
			{title: 'Test template 2', content: 'Test 2'}
		]
	 });
</script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/cadastrar-news.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo;?></h1><br/>
	
	<form name="cadnews" method="post" id="cadnews" onsubmit="return CadastrarNews(this)" enctype="multipart/form-data" action="php/news.php">	
		<input type="hidden" name="type" value="<?php echo $Type;?>"/>
		<input type="hidden" name="action" value="create"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%"/>						
		</div>
		<div class="Linha">
			Imagens (Apenas JPEG): <br/>
			<input type="file" name="image1" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
			<input type="file" name="image2" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/><br/>
			<input type="file" name="image3" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
			<input type="file" name="image4" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
		</div>
		<div class="Linha">				
			<textarea name="content" class="tiny" style="width: 37.3%; height: 350px; resize: none"></textarea>
		</div>		
		
		<div class="Linha">
			<input type="submit" value="Cadastrar" class="Campo Btn CadEmp AlterDs"/>
		</div>
		
		<div class="Linhainput resp">
				
		</div>
		<br/><br/>
	</form>
</section>