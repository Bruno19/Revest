<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>	
		<link rel="stylesheet" href="css/templatemo_misc.css">
		<script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
        <?php			
			include_once('cms/php/escapeSQL.php');
			if(isset($_GET['id']) && $_GET['id']!=null){
				$get = LimparGeral($_GET);				
				$SelectDoacao = mysqli_query($conn, "SELECT * FROM news WHERE type_no=2 AND id_no=$get[id] ORDER BY id_no DESC");
				if(mysqli_num_rows($SelectDoacao)>0){
					$Doacao = mysqli_fetch_object($SelectDoacao);
				}else{
					exit;
				}
			}else{
				$SelectDoacao = mysqli_query($conn, "SELECT * FROM news WHERE type_no=2 ORDER BY id_no DESC");
				if(mysqli_num_rows($SelectDoacao)>0){
					$Doacao = mysqli_fetch_object($SelectDoacao);
				}else{
					exit;
				}
			}
		?>
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/doacao.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="margin-bottom: 10px;" />
                  
         
            <div class="doacao">
                
                <div class="centraliza_doacao">
                        <div class="barra_pesquisa">
                            <a href="">Posso doar <img src="imagens/icones/seta.png"></a>
                            <a href="">Aceito doação <img src="imagens/icones/seta.png"></a>
                            <a href="">Ver doações e solicitações <img src="imagens/icones/seta.png"></a>
                            <div class="bloco_pesquisa"><label>Pesquisa</label></div>
                        </div>
                    
                    <div class="galeria_doacao">						
                        <div class="imgs_doacao">
							<a href="cms/imagens/news/<?php echo $Doacao->image1_no;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->image1_no;?>" alt="<?php echo $Doacao->title_no;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Doacao->image2_no;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->image2_no;?>" alt="<?php echo $Doacao->title_no;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao">
							<a href="cms/imagens/news/<?php echo $Doacao->image3_no;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->image3_no;?>" alt="<?php echo $Doacao->title_no;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Doacao->image4_no;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->image4_no;?>" alt="<?php echo $Doacao->title_no;?>"/>
							</a>
						</div>
                    </div>
                    
                    <div class="texto_doacao">
                        <div class="titulo"><h1><?php echo $Doacao->title_no;?></h1> <a href="">Ver todas</a></div>
                        
						<div class="Conteudo">
                        	<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Doacao->content_no));?>
						</div>
                    </div>
                </div>
                    
                
            </div>

            
            <div class="PaginadorHome">
                <a href="#">‹</a>
                <a href="#">Pag 1/9</a>
                <a href="#">›</a>
            </div>
            
            
        </div>
        
        
        
		<?php include_once('includes/footer.php');?>
	</body>
</html>