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
			if(isset($_GET['action']) && isset($_GET['type'])){
				if($_GET['action']=='create'){
					
					if($_GET['type']==1){
						$Titulo='Cadastrar clipping de notícias';
					}else
					if($_GET['type']==2){
						$Titulo='Cadastrar Evento';
					}else{
						exit;
					}
					
					include_once('includes/cadastrar-clipping.php');
				}else
				if($_GET['action']=='list'){
				
					if($_GET['type']==1){
						$Titulo='Lista de notícias cadastradas (clipping)';
					}else
					if($_GET['type']==2){
						$Titulo='Lista de eventos cadastradas';
					}else{
						exit;
					}
					
					include_once('includes/lista-clipping.php');
				}else
				if($_GET['action']=='edit'){
					if($_GET['type']==1){
						$Titulo='Editar Clipping de Notícias)';
					}else
					if($_GET['type']==2){
						$Titulo='Editar Evento';
					}else{
						exit;
					}
					
					include_once('php/class/clipping.class.php');
					$Clipping = new Clipping;
					
					$ReturnSelect = $Clipping->SelectUniqueClipping($conn, $_GET['id'], $_GET['type']);
					if($ReturnSelect==true){
						include_once('includes/editar-clipping.php');
					}
				}
				
			}else{
				echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
			}
		?>
		<?php include_once('includes/footer.php');?>
	</body>
</html>