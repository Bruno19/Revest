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
					if($_GET['type']==1){
						$Titulo='Cadastrar Ofertas';
						$Subtitle='placeholder="Modelo: " ';
						$Hide=' style="display: none;" ';
					}else
					if($_GET['type']==2){
						$Titulo='Cadastrar Personalidades';
						$Subtitle='placeholder="Subtítulo: " ';
						$Hide='';
					}else{
						exit;
					}
					
					include_once('includes/cadastrar-produto.php');
				}else
				if($_GET['action']=='list'){
					if($_GET['type']==1){
						$Titulo='Lista de Ofertas Cadastradas';
					}else
					if($_GET['type']==2){
						$Titulo='Lista de Personalidades Cadastradas';
					}else{
						exit;
					}
					
					include_once('includes/lista-produtos.php');
				}else
				if($_GET['action']=='edit'){
					if($_GET['type']==1){
						$Titulo='Editar Oferta';
						$Subtitle='placeholder="Modelo: " ';
						$Hide=' style="display: none;" ';
					}else
					if($_GET['type']==2){
						$Titulo='Editar Personalidade';
						$Subtitle='placeholder="Subtítulo: " ';
						$Hide='';
					}else{
						exit;
					}
					include_once('php/class/product.class.php');
					$Product = new Product;
					
					$Return = $Product->SelectUniqueProduct($conn, $_GET['id'], $_GET['type']);
					if($Return==true){
						include_once('includes/editar-produto.php');
					}else{
						exit;
					}
				}else{
					echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
				}
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		
		<?php include_once('includes/footer.php');?>
	</body>
</html>