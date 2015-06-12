<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
		
		
		<div class="Centro FundoConteudo">
		 
			<img src="imagens/tit-noticias.jpg" alt="Notícias" class="Titulos TitulosGrandes right"/>
			
			<?php for($i=1; $i<=3; $i++):?>
			<div class="BlocoConteudo1 BlocoEventos right">
				<h2>Titulo da notícia</h2>
				<br/>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut molestie purus. Aenean finibus iaculis suscipit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam iaculis dapibus arcu, eu condimentum diam placerat non.
				</p>
			</div>
			<?php endfor;?>
			
			<div class="esp"></div>
		</div>
		<?php include_once('includes/footer.php');?>
	</body>
</html>