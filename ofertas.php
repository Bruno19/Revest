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
			<img src="imagens/em-foco.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="width:603px;height:34px;"/>
            
         
            <div class="ofertas">
                <?php 
					$SelectPerson = mysqli_query($conn, "SELECT * FROM product WHERE type_pro=1 ORDER BY featured_pro DESC");
					while($Person=mysqli_fetch_object($SelectPerson)):
				?>
                <div class="bloc_ofertas">
                    <img src="cms/imagens/produto/<?php echo $Person->image_pro;?>">                 
                        <div class="text_ofertas">
                                <b><?php echo $Person->title_pro;?> </b><br />
                                <?php echo $Person->subtitle_pro;?><br />
                                Acesse: <br />
                                <?php echo $Person->link_pro;?><br /><br />
                            
                                 <b>Descritivo:</b><br />
                                                            
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