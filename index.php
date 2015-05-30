<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
		
		<!-- slider -->
		<link rel="stylesheet" type="text/css"  href="css/owl.carousel.css"/>
		<link rel="stylesheet" type="text/css"  href="css/owl.theme.css"/>
		<link rel="stylesheet" type="text/css"  href="css/prettify.css"/>
		
		<script type="text/javascript" src="js/owl.carousel.js"></script>	
		
		<style type="text/css">
		#owl-demo .item, .Banner{
			display: block;
			width: 100%;
			height: auto;
			z-index: 0;
			position: relative;
		}
		
		.owl-pagination{
			display: none !important;
		}
		
		</style>
		<script type="text/javascript">
		$(document).ready(function() {
		  $("#owl-demo").owlCarousel({

		  navigation : true,
		  slideSpeed : 300,
		  paginationSpeed : 400,
		  singleItem : true

		  // "singleItem:true" is a shortcut for:
		  // items : 1, 
		  // itemsDesktop : false,
		  // itemsDesktopSmall : false,
		  // itemsTablet: false,
		  // itemsMobile : false

		  });
		});
		</script>
		<!--fim slider-->
		
		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
		
		
		<div class="Centro FundoConteudo">
			<div class="NoticiaDestaque1">
				<img src="imagens/destaque.jpg" alt="destaque"/>
				<div class="Titulo">
					Título da matéria em destaque
				</div>
			</div>
		<?php for($i=1; $i<=4; $i++):?>	
			<div class="OutrasNoticias left">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
		<?php endfor;?>
		<div class="Propaganda1sl left">
			<div id="demo" style="z-index: 0 !important;">
				<div class="container">
					<div class="row">
						<div class="span12">
							<div id="owl-demo" class="owl-carousel">
								<!--Padrão de exibição-->								
								<div class="item">
									<img src="imagens/propaganda1.jpg" alt="banner" class="Banner"/>
								</div>
								<div class="item">
									<img src="imagens/propaganda1.jpg" alt="banner" class="Banner"/>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="esp"></div>
		</div>
		
		<?php include_once('includes/footer.php');?>
	</body>
</html>