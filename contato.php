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
			<img src="imagens/tit-contato.jpg" alt="Contato" class="Titulos TitulosGrandes right"/>
            
            <div class="contato">
                
            </div>           
            
            <div class="contato esquerda">
                <center>
                    <form>
                        
                        <select>
                            <option>Assunto</option>    
                            <option>Duvidas</option>    
                            <option>Sugestão</option>    
                            <option>Criticas</option>    
                        </select>
                        <br />
                        
                        <input type="text" placeholder="Nome" class="input_text"><br />
                        <input type="text" placeholder="Email" class="input_text"><br />
                        <textarea placeholder="Mensagem"></textarea><br />
                    </form>
                </center>
                   <label>Tel.: 11 9999.9999</label>
                
                    <input type="button" value="Enviar" class="btn">
            </div>
            
            
        </div>
        
        
        
		<?php include_once('includes/footer.php');?>
	</body>
</html>