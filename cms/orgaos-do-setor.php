<?php
	include_once('php/conn.php');
	mysqli_set_charset($conn, "utf8");
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
					include_once('includes/cadastrar-orgao-setor.php');
				}else
				if($_GET['action']=='list'){
					include_once('includes/lista-orgao.php');
				}else
				if($_GET['action']=='edit'){
					include_once('php/class/orgao-setor.class.php');
					$Orgao = new OrgaoSetor;
					if($Orgao->SelectUniqueOrgao($conn, $_GET['id'])){
						include_once('includes/editar-orgao.php');
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