<?php include_once('cms/php/conn.php');?>
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
			
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Profissionais IN CENA</h2>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Fabricantes IN CENA</h2>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Lojas IN CENA</h2>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Ofertas IN CENA</h2>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
				<a href="#">Título do ultimo</a><br/>
			</div>			
			
			<div class="esp"></div>
			
			<div class="NoticiaDestaque2 left" style="background: url(imagens/destaque2.jpg) no-repeat; background-size: 100% auto; background-position: center;">
				
				<div class="Titulo">
					Título da matéria em destaque
				</div>
			</div>
			
			<div class="OutrasNoticias right TopOutrasNot">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
			<div class="OutrasNoticias right TopOutrasNot">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
			<div class="esp"></div>
			<?php for($i=1; $i<=2; $i++):?>
			<div class="OutrasNoticias left">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
			<?php endfor;?>
			
			<div class="OutrasNoticias left BackGold">
				<div class="Doacao">
					<h2>Doação IN CENA</h2>
					<a href="#">Pisos</a><br/>
					<a href="#">Marcenaria</a><br/>
					<a href="#">Designer</a><br/>
					<a href="#">Elétrica</a><br/>
					<a href="#">Arquitetura</a><br/>
					<a href="#">Paisagismo</a><br/>
				</div>
			</div>
			<div class="esp"></div>
			
			
			<?php for($i=1; $i<=2; $i++):?>
			<div class="OutrasNoticias left">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
			<?php endfor;?>
			
			<div class="OutrasNoticias left">
				<a href="#">
					<img src="imagens/propaganda2.jpg" alt="Propaganda"/>
				</a>
			</div>
			<div class="esp"></div>	
			
			
			<?php for($i=1; $i<=3; $i++):?>
			<div class="OutrasNoticias left">
				<img src="imagens/materia.jpg" alt="noticia comum"/>
				<div class="Titulo">
					Título da matéria
				</div>
			</div>
			<?php endfor;?>
			<div class="esp"></div>	
			
			<div class="PaginadorHome">
				<a href="#">&lsaquo;</a> &nbsp;
					<a href="#">Pag 1/9</a>&nbsp;
				<a href="#">&rsaquo;</a>
			</div>
		</div>
		<div class="ParceirosHome">
			<div class="Centro">
				<h2>Patrocinadores / Parceiros</h2>
				<?php 
					$SelectPartners = mysqli_query($conn, "SELECT * FROM partners");
					while($partner=mysqli_fetch_object($SelectPartners)):
				?>
					<a href="<?php echo $partner->url_pa;?>" target="_blank">
						<img src="cms/imagens/parceiros/<?php echo $partner->image_pa;?>" alt="parceiro" class="LogoParceiroHome left"/>
					</a>
				<?php endwhile;?>
				<div class="esp"></div>	
			</div>			
		</div>
		<?php include_once('includes/footer.php');?>
	</body>
</html>