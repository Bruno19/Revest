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
			include_once('cms/php/class/news.class.php');
			include_once('cms/php/escapeSQL.php');
			$get = LimparGeral($_GET);
			$Doacao = new News;
			if($Doacao->SelectUniqueNews($conn, $get['id'], 2)==false){
				echo '<script type="text/javascript">location.href="index.php";</script>';
				exit;
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
							<a href="cms/imagens/news/<?php echo $Doacao->Image1;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->Image1;?>" alt="<?php echo $Doacao->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Doacao->Image2;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->Image2;?>" alt="<?php echo $Doacao->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao">
							<a href="cms/imagens/news/<?php echo $Doacao->Image3;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->Image3;?>" alt="<?php echo $Doacao->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Doacao->Image4;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->Image4;?>" alt="<?php echo $Doacao->Title;?>"/>
							</a>
						</div>
                    </div>
                    
                    <div class="texto_doacao">
                        <div class="titulo"><h1><?php echo $Doacao->Title;?></h1> <a href="">Ver todas</a></div>
                        
						<div class="Conteudo">
                        	<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Doacao->Content));?>
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