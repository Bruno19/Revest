<?php include_once('cms/php/conn.php');?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
        
		<div class="Centro FundoConteudo contato_overflow">
			<img src="imagens/projetos.jpg" alt="Contato" class="Titulos TitulosGrandes right" style="margin-bottom: 10px;" />
            
         <div class="centraliza_barra">
                <div class="next_back">
                    <h1>Home Theater</h1>
                    <div class="setas">
                       <a href=""> <img src="imagens/icones/seta-projetos.png">
                        <img src="imagens/icones/seta-projetos_direita.png"> </a>
                    </div>
                </div>
             
             <div class="galeria">
                 <?php include ("galeria/galeria.html") ?>
              </div>
             
             <div class="outros">
                 <h2>Outros Projetos</h2>
                <ul>
                 <li>Titulo do projeto</li>
                 <li>Titulo do projeto</li>
                 <li>Titulo do projeto</li>
                 <li>Titulo do projeto</li>
                 <li>Titulo do projeto</li>
                 <li>Titulo do projeto</li>
                </ul>
            </div>
             
        </div>
   
            
        </div>
        
        
        
		<?php include_once('includes/footer.php');?>
	</body>
</html>