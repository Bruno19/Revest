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
<script type="text/javascript" src="js/editar-news.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina"><?php echo $Titulo;?></h1><br/>
	
	<form name="editnews" method="post" id="editnews" onsubmit="return EditarNews(this)" enctype="multipart/form-data">	
		<input type="hidden" name="type" value="<?php echo $Type;?>"/>
		<input type="hidden" name="action" value="edit"/>
		<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%" value="<?php echo $News->Title;?>"/>						
		</div>
		
		<div class="Linha">				
			<textarea name="content" class="tiny" style="width: 37.3%; height: 350px; resize: none"><?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $News->Content));?></textarea>
		</div>		
		
		<div class="Linha">
			<input type="submit" value="Salvar" class="Campo Btn CadEmp AlterDs"/>
		</div>
	</form>
		<div class="Linhainput resp">
				
		</div>
		<br/><br/>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image1;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image1;?>"/>
				<input type="hidden" name="field" value="image1_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs"/>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image2;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image2;?>"/>
				<input type="hidden" name="field" value="image2_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs"/>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image3;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image3;?>"/>
				<input type="hidden" name="field" value="image3_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs"/>
			</form>
		</div>
		
		<div class="BlocoImgNews">
			<form name="alterimage" method="post" action="" enctype="multipart/form-data">
				<img src="imagens/news/<?php echo $News->Image4;?>" alt="<?php echo $News->Title;?>" class="ImageNews" />
				<input type="hidden" name="id" value="<?php echo $News->Id;?>"/>
				<input type="hidden" name="name" value="<?php echo $News->Image4;?>"/>
				<input type="hidden" name="field" value="image4_no"/>
				<input type="hidden" name="action" value="alter-image"/>
				<input type="file" name="image" accept="image/jpeg" class="Campo Btn CadEmp AlterDs"/>
				<input type="submit" value="Alterar Imagem" class="Campo Btn CadEmp AlterDs"/>
			</form>
		</div>
		<?php  include_once('php/images-news.php');?>
		<div class="esp"></div>
	
</section>