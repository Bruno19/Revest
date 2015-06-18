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
					include_once('includes/cadastrar-projeto.php');
				}else
				if($_GET['action']=='addimages'){
					include_once('php/class/project.class.php');
					$Project = new Project;
					if($Project->SelectUniqProject($conn, $_GET['id'])==true){
						include_once('includes/editar-projeto.php');
					}else{
						echo '<section class="Centro CentroConteudo"><h2 class="AcessNeg">Acesso Negado!</h2></section>';
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