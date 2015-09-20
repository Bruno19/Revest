<?php $pagename = "holofotes";   ?>
<?php $titulo_header = "Órgãos do setor";   ?>
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
			<img src="imagens/tit-orgaos-setor.jpg" alt="Orgãos do Setor" class="Titulos TitulosGrandes right"/>
		
		<?php
			$SelectOrgaos = mysqli_query($conn, "SELECT * FROM orgaos ORDER BY title_or");
			while($orgaos = mysqli_fetch_object($SelectOrgaos)):
		?>
			<div class="BlocoConteudo1 BlocoQuemSomos right">
				<h2><?php echo $orgaos->title_or;?></h2>
				<br/>
				<p>
					<a href="<?php echo $orgaos->url_or;?>" target="_blank"><?php echo $orgaos->url_or;?></a>
				</p>
			</div>
		<?php
			endwhile;
		?>
			<div class="esp"></div>
		</div>
		<?php include_once('includes/footer.php');?>
	</body>
</html>