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
			if(isset($_GET['action']) && isset($_GET['area'])){
				if($_GET['action']=='create'){
					
					if($_GET['area']==1){
						$Titulo='Cadastrar Profissionais IN CENA';
					}else
					if($_GET['area']==2){
						$Titulo='Cadastrar Fabricantes IN CENA';
					}else
					if($_GET['area']==3){
						$Titulo='Cadastrar Lojas IN CENA';
					}else
					if($_GET['area']==4){
						$Titulo='Cadastrar Técnicos IN CENA';
					}else{
						exit;
					}
					
					include_once('includes/cadastrar-mapping.php');
				}else
				if($_GET['action']=='list'){
				
					if($_GET['area']==1){
						$Titulo='Lista de Profissionais IN CENA cadastrado';
					}else
					if($_GET['area']==2){
						$Titulo='Lista de Fabricantes IN CENA';
					}else
					if($_GET['area']==3){
						$Titulo='Lista de Lojas IN CENA';
					}else
					if($_GET['area']==4){
						$Titulo='Lista de Técnicos IN CENA';
					}else{
						exit;
					}
					
					include_once('includes/lista-mapping.php');
				}else
				if($_GET['action']=='edit'){
					if($_GET['area']==1){
						$Titulo='Editar Profissionais IN CENA';
					}else
					if($_GET['area']==2){
						$Titulo='Editar Fabricantes IN CENA';
					}else
					if($_GET['area']==3){
						$Titulo='Editar Lojas IN CENA';
					}else
					if($_GET['area']==4){
						$Titulo='Editar Técnicos IN CENA';
					}else{
						exit;
					}
					
					include_once('php/class/mapa.class.php');
					$Mapa = new Mapa;
					
					$ReturnSelect = $Mapa->SelectUniqueMapping($conn, $_GET['id'], $_GET['area']);
					if($ReturnSelect==true){
						include_once('includes/editar-mapping.php');
					}
				}
				
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		<?php include_once('includes/footer.php');?>
	</body>
</html>