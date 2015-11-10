<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<?php $titulo_header = "Grupo Técnico";   ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
        
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/tecnicos.jpg" alt="Contato" class="Titulos right" style="margin-bottom: 10px;" />
            <div class="centraliza_barra">
				<div class="MapaMaroto">
					<form name="formarea" method="post">
						<input type="hidden" name="area" value="4"/>
					</form>
					<?php include_once('includes/mapa.php');?>
				</div>
                    <div class="info_direita">
						<form name="selectcidades" method="post" onsubmit="return false">
							<select name="cidade" onchange="CarregarResultados(this.value)" id="SelectCidades">
								<?php
									if(isset($_GET)){
										if(is_numeric($_GET['id'])){
											$SelectCid = mysqli_query($conn, "
												SELECT a.*, b.* FROM cidades AS a INNER JOIN mapping AS b WHERE id_ma=$_GET[id] AND a.id=b.id_ci
											");
											
											$Cid = mysqli_fetch_object($SelectCid);
											
											echo '
												<option value="'.$Cid->id_ci.'" selected>'.$Cid->cidade.'</option>
											';
										}
									}
								?>
								<option value="null">Selecione uma cidade</option>   
							</select>
							
							<button onclick="CarregarResultados(document.selectcidades.cidade.value)">Pesquisar</button>
                        </form>
						<div class="ResultBusca">
							&nbsp;                     
                        </div>                         
                    </div>
				<div class="esp"></div>					
            </div>                
        </div>
		<?php include_once('includes/footer.php');?>
	</body>
</html>