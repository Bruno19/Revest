<?php $pagename = "holofotes";   ?>
<?php $titulo_header = "Materias e artigos";   ?>
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
			$SelectAllNews = mysqli_query($conn, "SELECT id_no FROM news WHERE type_no=1");
			$NoticiasPorPagina = 1;
			$Pages = ceil(mysqli_num_rows($SelectAllNews)/1);
			
			if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
				$Limite = ($_GET['pg']-1)*$NoticiasPorPagina;
			}else{
				$Limite=0;
			}
			
			include_once('cms/php/escapeSQL.php');
			if(isset($_GET['id']) && $_GET['id']!=null){
				$get = LimparGeral($_GET);				
				$SelectDoacao = mysqli_query($conn, "SELECT * FROM news WHERE type_no=1 AND id_no=$get[id] ORDER BY id_no DESC");				
				if(mysqli_num_rows($SelectDoacao)>0){
					$Doacao = mysqli_fetch_object($SelectDoacao);
				}else{
					exit;
				}
			}else{
				$SelectDoacao = mysqli_query($conn, "SELECT * FROM news WHERE type_no=1 ORDER BY id_no DESC LIMIT $Limite, 1");
				if(mysqli_num_rows($SelectDoacao)>0){
					$Doacao = mysqli_fetch_object($SelectDoacao);
				}else{
					exit;
				}
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
						<?php
							if($Doacao->image2_no=='none.jpg' && $Doacao->image3_no=='none.jpg' && $Doacao->image4_no=='none.jpg'){
						?>
						<div class="Unica_img_doacao">
							<a href="cms/imagens/news/<?php echo $Doacao->image1_no;?>" data-rel="lightbox" style="text-decoration: none">
								<img src="cms/imagens/news/<?php echo $Doacao->image1_no;?>" alt="<?php echo $Doacao->title_no;?>" width="790" height="406"/>
							</a>
						</div>
						<?php }else{ ?>
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
						<?php } ?>
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
				
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']>2){
							echo '<a href="?pg='.($_GET['pg']-1).'">&lsaquo;</a>';
						}else{
							echo '<a href="?pg=1">&lsaquo;</a>';
						}
					}else{
						echo '<a href="?pg=1">&lsaquo;</a>';
					}
				?>

				&nbsp;
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']==$Pages){
							echo '<a href="?pg='.($Pages).'">';
						}else{
							echo '<a href="?pg='.($_GET['pg']+1).'">';
						}
					}else{
						echo '<a href="?pg=2">';
					}
				?>Pag 
						<?php
							if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
								echo $_GET['pg'].'/'.$Pages;
							}else{
								echo '1/'.$Pages;
							}
						?>
					</a>&nbsp;
				<?php
					if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
						if($_GET['pg']==$Pages){
							echo '<a href="?pg='.($Pages).'">&rsaquo;</a>';
						}else{
							echo '<a href="?pg='.($_GET['pg']+1).'">&rsaquo;</a>';
						}
					}else{
						echo '<a href="?pg=2">&rsaquo;</a>';
					}
				?>
			</div>
            
            
        </div>
            
            
        </div>        
		<?php include_once('includes/footer.php');?>
	</body>
</html>