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
        <?php
			include_once('cms/php/escapeSQL.php');
			
			if(isset($_GET) && $_GET!=null){				
				$get = LimparGeral($_GET);
				$Selectproject = mysqli_query($conn, "SELECT * FROM projects WHERE id_pr=$get[id]");
				if(mysqli_num_rows($Selectproject)==1){
					$Project = mysqli_fetch_object($Selectproject);
				}else{
					echo '<script type="text/javascript">location.href="index.php"</script>';
				}
			}else{
				$Selectproject = mysqli_query($conn, "SELECT * FROM projects ORDER BY id_pr DESC")or die(mysqli_error($conn));
				if(mysqli_num_rows($Selectproject)>0){
					$Project = mysqli_fetch_object($Selectproject);
				}else{
					echo '<script type="text/javascript">location.href="index.php"</script>';
				}
			}		
		?>
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/projetos.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="margin-bottom: 10px;" />
            
			 <div class="centraliza_barra">					
				 
				 <div class="galeria">
					<div class="next_back">
						<h1><?php echo $Project->name_pr;?></h1>
						<div class="setas">
						   <a href=""> <img src="imagens/icones/seta-projetos.png">
							<img src="imagens/icones/seta-projetos_direita.png"> </a>
						</div>
					</div>
					 <?php include ("galeria/galeria.php") ?>
				  </div>
				 
				 <div class="outros">
					 <h2>Outros Projetos</h2>
					<ul>
						<?php
							$SelectProjects = mysqli_query($conn, "SELECT * FROM projects ORDER BY id_pr DESC");
							while($Projects = mysqli_fetch_object($SelectProjects)){
								echo '<li><a href="projetos.php?id='.$Projects->id_pr.'" style="color: inherit; text-decoration: none;">'.$Projects->name_pr.'</a>';
							}
						?>
					</ul>
				</div>
				 
			</div> 
            
        </div>
        
        
        
		<?php include_once('includes/footer.php');?>
	</body>
</html>