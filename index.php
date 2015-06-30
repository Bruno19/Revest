<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
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
		
		<?php
			$SelectAllNews = mysqli_query($conn, "SELECT id_no FROM news WHERE type_no=1");
			$NoticiasPorPagina = 13;
			$Pages = ceil(mysqli_num_rows($SelectAllNews)/13);
			
			if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
				$Limite = ($_GET['pg']-1)*$NoticiasPorPagina;
			}else{
				$Limite=0;
			}		
		?>
		
		<div class="Centro FundoConteudo">
			<?php
				$SelectDestaque1 = mysqli_query($conn, "SELECT * FROM news WHERE featured_no=1 AND type_no=1");
				$Destaque1=mysqli_fetch_object($SelectDestaque1);
			?>
			<a href="materias.php?id=<?php echo $Destaque1->id_no;?>" style="text-decoration: none">
			<div class="NoticiaDestaque1">
				<img src="cms/imagens/news/<?php echo $Destaque1->image1_no;?>" alt="<?php echo $Destaque1->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Destaque1->title_no;?>
				</div>
			</div>
			</a>
		<?php 
			$SelectNoticias1 = mysqli_query($conn, "SELECT id_no, title_no, image1_no FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $Limite, 4");
			while($Dados1=mysqli_fetch_object($SelectNoticias1)):
		?>	
			<a href="materias.php?id=<?php echo $Dados1->id_no;?>" style="text-decoration: none">
			<div class="OutrasNoticias left">
				<img src="cms/imagens/news/<?php echo $Dados1->image1_no;?>" alt="<?php echo $Dados1->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Dados1->title_no;?>
				</div>
			</div>
			</a>
		<?php endwhile;?>
			<div class="Propaganda1sl right">
				<div id="demo" style="z-index: 0 !important;">
					<div class="container">
						<div class="row">
							<div class="span12">
								<div id="owl-demo" class="owl-carousel">
									<!--Padrão de exibição-->
									<?php
									
									$caminho = 'cms/imagens/slider/';
									$diretorio = dir($caminho);
									
									while($banners = $diretorio->read()):
									if(substr($banners, -3)=='jpg'):
								?>
									<div class="item">
										<img src="<?php echo $caminho.$banners;?>" alt="banner" class="Banner"/>
									</div>
								<?php
									endif;
									endwhile;
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="esp"></div>
			
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Profissionais IN CENA</h2>
				<?php 
					$SelectMapping1=mysqli_query($conn, "SELECT name_ma FROM mapping WHERE area_ma=1 ORDER BY id_ma DESC LIMIT 0, 3");
					while($Mapping1=mysqli_fetch_object($SelectMapping1)){
						echo '<a href="profissionais.php">'.$Mapping1->name_ma.'</a><br/>';
					}
				?>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Fabricantes IN CENA</h2>
				<?php 
					$SelectMapping2=mysqli_query($conn, "SELECT name_ma FROM mapping WHERE area_ma=2 ORDER BY id_ma DESC LIMIT 0, 3");
					while($Mapping2=mysqli_fetch_object($SelectMapping2)){
						echo '<a href="fabricantes.php">'.$Mapping2->name_ma.'</a><br/>';
					}
				?>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Lojas IN CENA</h2>
				<?php 
					$SelectMapping3=mysqli_query($conn, "SELECT name_ma FROM mapping WHERE area_ma=3 ORDER BY id_ma DESC LIMIT 0, 3");
					while($Mapping3=mysqli_fetch_object($SelectMapping3)){
						echo '<a href="lojas.php">'.$Mapping3->name_ma.'</a><br/>';
					}
				?>
			</div>
			
			<div class="ListaUltimosCadastradosH left">
				<h2>Ofertas IN CENA</h2>
				<?php 
					$SelectMapping4=mysqli_query($conn, "SELECT title_pro FROM product WHERE type_pro=1 ORDER BY id_pro DESC LIMIT 0, 3");
					while($Mapping4=mysqli_fetch_object($SelectMapping4)){
						echo '<a href="ofertas.php">'.$Mapping4->title_pro.'</a><br/>';
					}
				?>
			</div>			
			
			<div class="esp"></div>
			<?php
				$SelectDestaque2 = mysqli_query($conn, "SELECT * FROM news WHERE featured_no=2 AND type_no=1");
				if(mysqli_num_rows($SelectDestaque2)==1):
				$Destaque2=mysqli_fetch_object($SelectDestaque2);
			?>
			<a href="materias.php?id=<?php echo $Destaque2->id_no;?>" style="text-decoration: none">
			<div class="NoticiaDestaque2 left" style="background: url(cms/imagens/news/<?php echo $Destaque2->image1_no;?>) no-repeat; background-color: #333; background-size: 100% auto; background-position: center;">				
				<div class="Titulo">
					<?php echo $Destaque2->title_no;?>
				</div>
			</div>
			</a>
			<?php
				endif;
			?>
			<?php
				$l1 = $Limite+4;
				$SelectNoticias2 = mysqli_query($conn, "SELECT id_no, title_no, image1_no FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $l1, 2")or die(mysqli_error($conn));
				while($Dados2=mysqli_fetch_object($SelectNoticias2)):
			?>
			<a href="materias.php?id=<?php echo $Dados2->id_no;?>" style="text-decoration: none">
			<div class="OutrasNoticias right TopOutrasNot">
				<img src="cms/imagens/news/<?php echo $Dados2->image1_no;?>" alt="<?php echo $Dados2->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Dados2->title_no;?>
				</div>
			</div>
			</a>
			<?php endwhile;?>
			
			<div class="esp"></div>
			<?php 
				$l2 = $Limite+6;
				$SelectNoticias3 = mysqli_query($conn, "SELECT id_no, title_no, image1_no FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $l2, 2")or die(mysqli_error($conn));
				while($Dados3=mysqli_fetch_object($SelectNoticias3)):
			?>			
			<a href="materias.php?id=<?php echo $Dados3->id_no;?>" style="text-decoration: none">
			<div class="OutrasNoticias left">
				<img src="cms/imagens/news/<?php echo $Dados3->image1_no;?>" alt="<?php echo $Dados3->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Dados3->title_no;?>
				</div>
			</div>
			</a>
			<?php endwhile;?>
			
			<div class="OutrasNoticias right BackGold">
				<div class="Doacao">
					<h2>Doação IN CENA</h2>
					<?php
						$SelectDonation = mysqli_query($conn, "SELECT id_no, title_no FROM news WHERE type_no=2 ORDER BY id_no DESC");
						while($Donations = mysqli_fetch_object($SelectDonation)):
					?>
					<a href="doacao.php?id=<?php echo $Donations->id_no;?>"><?php echo $Donations->title_no;?></a><br/>
					<?php endwhile;?>
				</div>
			</div>
			<div class="esp"></div>			
			
			<?php
				$l3 = $Limite+8;
				$SelectNoticias4 = mysqli_query($conn, "SELECT id_no, title_no, image1_no FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $l3, 2")or die(mysqli_error($conn));
				while($Dados4=mysqli_fetch_object($SelectNoticias4)):
			?>			
			<a href="materias.php?id=<?php echo $Dados4->id_no;?>" style="text-decoration: none">
			<div class="OutrasNoticias left">
				<img src="cms/imagens/news/<?php echo $Dados4->image1_no;?>" alt="<?php echo $Dados4->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Dados4->title_no;?>
				</div>
			</div>
			</a>
			<?php endwhile;?>
			
			<?php
				$SelectPrC = mysqli_query($conn, "SELECT * FROM publicidade WHERE name_p='centro1'");
				$PrC = mysqli_fetch_object($SelectPrC);
				if($PrC->image_p!=''):
			?>
			<div class="OutrasNoticias right">
				<a href="<?php echo $PrC->url_p;?>" target="_blank">
					<img src="cms/imagens/publicidade/<?php echo $PrC->image_p;?>" alt="Propaganda"/>
				</a>
			</div>
			<?php endif;?>
			<div class="esp"></div>				
			
			<?php
				$l4 = $Limite+10;
				$SelectNoticias5 = mysqli_query($conn, "SELECT id_no, title_no, image1_no FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $l4, 3")or die(mysqli_error($conn));
				while($Dados5=mysqli_fetch_object($SelectNoticias5)):
			?>			
			<a href="materias.php?id=<?php echo $Dados5->id_no;?>" style="text-decoration: none">
			<div class="OutrasNoticias left">
				<img src="cms/imagens/news/<?php echo $Dados5->image1_no;?>" alt="<?php echo $Dados5->title_no;?>"/>
				<div class="Titulo">
					<?php echo $Dados5->title_no;?>
				</div>
			</div>
			</a>
			<?php endwhile;?>
			
			<div class="esp"></div>	
			
			<div class="PaginadorHome">
				
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']>2){
							echo '<a href="?pg='.($_GET['pg']-1).'">&lsaquo;</a>';
						}else{
							echo '<a href="?pg=1">&lsaquo;</a>';
						}
					}else{
						echo '<a href="?pg=1">&lsaquo;</a>';
					}
				?>

				&nbsp;
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']==$Pages){
							echo '<a href="?pg='.($Pages).'">';
						}else{
							echo '<a href="?pg='.($_GET['pg']+1).'">';
						}
					}else{
						echo '<a href="?pg=2">';
					}
				?>Pag 
						<?php
							if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
								echo $_GET['pg'].'/'.$Pages;
							}else{
								echo '1/'.$Pages;
							}
						?>
					</a>&nbsp;
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']==$Pages){
							echo '<a href="?pg='.($Pages).'">&rsaquo;</a>';
						}else{
							echo '<a href="?pg='.($_GET['pg']+1).'">&rsaquo;</a>';
						}
					}else{
						echo '<a href="?pg=2">&rsaquo;</a>';
					}
				?>
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