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
			$Noticia = new News;
			if($Noticia->SelectUniqueNews($conn, $get['id'], 1)==false){
				echo '<script type="text/javascript">location.href="index.php";</script>';
				exit;
			}			
		?>
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/materias.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="margin-bottom: 10px;" />                 
         
            <div class="doacao">
                
                <div class="centraliza_doacao">
                        <div class="barra_pesquisa">
                            <a href="">Clique na foto para ampliar</a>
 
                            <div class="bloco_pesquisa"><label>Pesquisa</label></div>
                        </div>
                    
                    <div class="galeria_doacao">						
                        <div class="imgs_doacao">
							<a href="cms/imagens/news/<?php echo $Noticia->Image1;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Noticia->Image1;?>" alt="<?php echo $Noticia->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Noticia->Image2;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Noticia->Image2;?>" alt="<?php echo $Noticia->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao">
							<a href="cms/imagens/news/<?php echo $Noticia->Image3;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Noticia->Image3;?>" alt="<?php echo $Noticia->Title;?>"/>
							</a>
						</div>
                        <div class="imgs_doacao" style="float:right;">
							<a href="cms/imagens/news/<?php echo $Noticia->Image4;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Noticia->Image4;?>" alt="<?php echo $Noticia->Title;?>"/>
							</a>
						</div>
                    </div>
                    
                    <div class="texto_doacao">
                        <div class="titulo"><h1><?php echo $Noticia->Title;?></h1> <a href="">Ver todas</a></div>
                        
						<div class="Conteudo">
                        	<?php echo str_replace('&#39;', "'", str_replace('&#34;', '"', $Noticia->Content));?>
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