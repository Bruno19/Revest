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
		
		<section class="Centro Conteudo" style="min-height: 400px">
			<h1 class="TituloPagina">Midia Kit</h1><br/>
			
			
				<?php
					$SelectMidia = mysqli_query($conn, "SELECT * FROM midiakit");
					$Midia = mysqli_fetch_object($SelectMidia);
					if($Midia->existe==0):
				?>
				<form name="midia" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="action" value="addmidia"/>
					<div class="Linha">					
						<input type="text" name="nome" placeholder="Nome do arquivo (sem espaços): " class="Campo input" style="width: 230px"/>					
					</div>
					<div class="Linha">
						<input type="file" name="arquivo" class="Campo Btn"/>
					</div>
					<div class="Linha">
						<input type="submit" value="Adicionar Arquivo" class="Campo Btn"/>
					</div>
				</form>
				<?php
					endif;
					if($Midia->existe==1):
				?>
					<div class="Linha">
						Arquivo: <a href="midiakit/<?php echo $Midia->nome;?>" download="<?php echo $Midia->nome;?>">Clique aqui para efetuar o download.</a>
					</div>
					<div class="Linha">
						<form name="excluir" method="post" action="" onsubmit="return confirm('Deseja mesmo fazer isto?')">
							<input type="hidden" name="action" value="delete">
							<input type="submit" value="Excluir Arquivo" class="Campo Btn"/>
						</form>
					</div>
				<?php endif;?>
		</section>
		<?php
			if(isset($_POST['action'])){
				if($_POST['action']=='addmidia'){
					include_once('php/escapeSQL.php');
					$nome = str_replace(' ', '-', LimparGeralString($_POST['nome']));
					$arq = $_FILES['arquivo'];
					
					if($arq['error']==4){
						echo '<script type="text/javascript">alert("Selecione um arquivo!"); history.back();</script>';
					}else{						
						$extencao = substr($arq['name'], -4);
						echo $extencao;
						
						$upar = move_uploaded_file($arq['tmp_name'], 'midiakit/'.$nome.$extencao);
						if($upar){
							$up = mysqli_query($conn, "UPDATE midiakit SET nome='".$nome.$extencao."', existe=1");
							if($up){
								echo '<script type="text/javascript">location.href="";</script>';
							}else{
								echo '<script type="text/javascript">alert("Erro no banco de dados!"); history.back();</script>';
								unlink('midiakit/'.$nome.$extencao);
							}
						}
					}
				}
				
				if($_POST['action']=='delete'){
					unlink('midiakit/'.$Midia->nome);
					mysqli_query($conn, "UPDATE midiakit SET existe=0");
					echo '<script type="text/javascript">location.href="";</script>';
				}
			}
		?>
		<?php include_once('includes/footer.php');?>
	</body>
</html>