<?php $pagename = "holofotes";   ?>
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
		 
			<img src="imagens/tit-noticias.jpg" alt="Notícias" class="Titulos TitulosGrandes right"/>
			
			<?php
				$SelectAllNews = mysqli_query($conn, "SELECT id_c FROM clipping WHERE type_c=1");
				$NoticiasPorPagina = 10;
				$Pages = ceil(mysqli_num_rows($SelectAllNews)/10);
				
				if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
					$Limite = ($_GET['pg']-1)*$NoticiasPorPagina;
				}else{
					$Limite=0;
				}
				
				$SelectClipping = mysqli_query($conn, "SELECT * FROM clipping WHERE type_c=1 ORDER BY id_c DESC LIMIT $Limite, $NoticiasPorPagina");
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
						echo '<a href="?pg=1">';
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
		<?php include_once('includes/footer.php');?>
	</body>
</html>