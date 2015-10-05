<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<?php $titulo_header = "Fabricantes";   ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
        
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/fabricantes.jpg" alt="Contato" class="Titulos right" style="margin-bottom: 10px;" />
             <div class="centraliza_barra">
				<div class="MapaMaroto">
					<form name="formarea" method="post">
						<input type="hidden" name="area" value="2"/>
					</form>
					<?php include_once('includes/mapa.php');?>
				</div>
                    <div class="info_direita">
						<form name="selectcidades" method="post" onsubmit="return false">
							<select name="cidade" onchange="CarregarResultados(this.value)" id="SelectCidades">
								<option value="null">Selecione uma cidade</option>   
							</select>
							
							<button onclick="CarregarResultados(document.selectcidades.cidade.value)">Pesquisar</button>
                        </form>
						<div class="ResultBusca">
							&nbsp;

							<?php
								if(isset($_GET)){
									if(is_numeric($_GET['id'])){
										
										$SelectMap = mysqli_query($conn, "SELECT * FROM mapping WHERE id_ma=$_GET[id]");
										if(mysqli_num_rows($SelectMap)>0){
											$Mapping = mysqli_fetch_object($SelectMap);
											echo'
												<div class="resultados">
													<b>'.$Mapping->name_ma.'</b> <br> 
													  '.$Mapping->info_ma.' <br> 
														'.$Mapping->cont1_ma.' <br> 
														'.$Mapping->cont2_ma.'
												</div>
											';
										}										
									}									
								}
							?>
                        </div>                         
                    </div>
				<div class="esp"></div>					
            </div>                
        </div>       
		<?php include_once('includes/footer.php');?>
	</body>
</html>