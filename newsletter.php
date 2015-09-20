<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<?php $titulo_header = "Newsletter";   ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
        
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/news_latter.jpg" alt="Contato" class="Titulos TitulosGrandes right"/>
            
            <div class="contato">
                 <h1>Breve descritivo sobre <br />o conteudo da Newsletter</h1>
                
                <div class="texto">
                    Lorem ipsum dolor sit amet, consectetuer <br />
adipiscing elit, sed diam nonummy nibh <br />
euismod tincidunt ut laoreet dolore magna <br />
aliquam erat volutpat. Ut wisi enim ad <br />
minim veniam, quis nostrud exerci tation <br />
ullamcorper suscipit lobortis nisl ut aliquip <br />
ex ea commodo consequat. Duis autem <br />
vel eum iriure doloro ...
                    </div>
            </div>           
            
            <div class="contato esquerda">
                <center>
                   <div class="barra_amarela"> <h2>Solicite aqui sua News Letter</h2></div>
                    
                    <br /><br />
                    
                    <form>
                        
                        <input type="text" placeholder="Nome" class="input_text"><br />
                        <input type="text" placeholder="Email" class="input_text"><br />
                     
                    </form>
                </center>
                  
                
                    <input type="button" value="Solicitar" class="bt_news">
            </div>
            
            
        </div>
        
        
        
		<?php include_once('includes/footer.php');?>
	</body>
</html>