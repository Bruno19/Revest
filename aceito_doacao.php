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
			<img src="http://incena.esy.es/imagens/doacao.jpg" alt="Contato" class="Titulos TitulosGrandes right"/>
           
            <div class="contato" style="background:none;">
                
            </div>           
            
            <div class="contato esquerda">
                <center>
                    <form action="processa.php" method="POST">
                    <style>
                        .posso{
                            background:#F5D039;
                            width:392px;
                            height:30px;
                            margin-top:20px;
                        }.posso a{
                            color:#8D8051;
                            float:left;
                            font-weight:bold;
                            text-decoration:none;
                            margin-top:5px;
                            margin-left:15px;
                        }
                        </style>
                            <div class="posso">
                                <a href="">Aceito doação</a>
                            </div>
                           
                            <br />
<input type="text" placeholder="Nome" id="nome" class="input_text" style="margin-top: 0px;margin-bottom: 30px;"><br />
    <input type="text" placeholder="Email" id="email" class="input_text" style="margin-top: 0px;margin-bottom: 30px;"><br />
    <textarea placeholder="Mensagem" id="texto" style="margin-top: 0px;"></textarea><br />
                </center>
                   <label>Tel.: 11 9999.9999</label>
                
                    <input type="button" value="Enviar" class="btn" onclick="enviar_email()">
               </form>
              
                     <div class="resposta"></div> 
            </div>
            
            
        </div>



































        
		<?php include_once('includes/footer.php');?>
	</body>
</html>