<?php
	include_once('php/conn.php');
	include_once('php/restrict.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
	</head>
	<body>
		<?php include_once('includes/topo.php');?>
		<?php
			if(isset($_GET['action'])){
				if($_GET['action']=='create'){
					if($_GET['type']=='news'){
						$Titulo='Cadastrar Notícias';
						$Type='1';
					}else
					if($_GET['type']=='donation'){
						$Titulo='Cadastrar Doação';
						$Type='2';						
					}else{
						exit;
					}
					
					include_once('includes/cadastrar-noticia.php');
				}else
				if($_GET['action']=='list'){
					if($_GET['type']=='news'){
						$Titulo='Lista de Notícias Cadastradas';
						$Type='1';
					}else
					if($_GET['type']=='donation'){
						$Titulo='Lista de Doações Cadastradas';
						$Type='2';
					}else{
						exit;
					}
					
					include_once('includes/lista-noticias.php');
				}else
				if($_GET['action']=='edit'){
					if($_GET['type']==1){
						$Titulo='Editar Notícia';
						$Type='1';
					}else
					if($_GET['type']==2){
						$Titulo='Editar Doação';
						$Type='2';
					}else{
						exit;
					}
					
					include_once('php/class/news.class.php');
					$News = new News;
					$ReturnNews = $News->SelectUniqueNews($conn, $_GET['id'], $Type);
					if($ReturnNews==true){
						include_once('includes/editar-noticia.php');
					}else{
						exit;
					}
				}
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		<?php include_once('includes/footer.php');?>
	</body>
</html>