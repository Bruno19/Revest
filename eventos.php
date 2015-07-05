<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
		
		
		<div class="Centro FundoConteudo">
		 
			<img src="imagens/tit-eventos.jpg" alt="Eventos" class="Titulos TitulosGrandes right"/>
			
			<?php
				$SelectClipping = mysqli_query($conn, "SELECT * FROM clipping WHERE type_c=2 ORDER BY id_c DESC");
				while($Clipping=mysqli_fetch_object($SelectClipping)):
			?>
			<a href="<?php echo $Clipping->url_c;?>" target="_blank" style="text-decoration: none">
			<div class="BlocoConteudo1 BlocoEventos right">
				<h2><?php echo $Clipping->title_c;?></h2>
				<br/>
				<p>
					<?php echo $Clipping->content_c;?>
				</p>
			</div>
			</a>
			<?php endwhile;?>
			
			<div class="esp"></div>
          <div class="PaginadorHome">
                <a href="#">‹</a>
                <a href="#">Pag 1/9</a>
                <a href="#">›</a>
            </div>
            
		</div>
		<?php include_once('includes/footer.php');?>
	</body>
</html>