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
        
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/personalidades-destaque.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="width:603px;height:34px;"/>
                   <img src="imagens/search.png" class="search">
         
            <div class="ofertas">
                <?php 
					$SelectPerson = mysqli_query($conn, "SELECT * FROM product WHERE type_pro=2 ORDER BY featured_pro DESC");
					while($Person=mysqli_fetch_object($SelectPerson)):
				?>
                <div class="bloc_ofertas">
                    <img src="cms/imagens/produto/<?php echo $Person->image_pro;?>">                 
                        <div class="text_ofertas">
                                <b><?php echo $Person->title_pro;?> </b><br />
                                <?php echo $Person->subtitle_pro;?><br />
                                Contato: <?php echo $Person->contact_pro;?><br />
                                <?php echo $Person->link_pro;?><br /><br />
                            
                                 <b>About:</b><br />
                                                            
                                <p>
									<?php echo $Person->about_pro;?>
                                <p/>
                        </div>
                </div>
                <?php endwhile;?>
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