<?php $pagename = "contato";   ?>
<?php $titulo_header = "Contato";   ?>
<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>	
        
        <script>
            function enviar_email(){
                
                var enviar_pro_email = $("enviar_pro_email").val();
                var nome = $("#nome").val();
                var email = $("#email").val();
                var texto = $("#texto").val();
                var assunto = $("#assunto").val();
        
            
            $.post('processa.php',{enviar_pro_email:"enviar_pro_email",nome:nome,email:email,texto:texto,assunto:assunto}).done(function(resultado){
                $('.resposta').html(resultado);
            });
        }
        </script>
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
                    <form action="processa.php" method="POST">
                            <select id="assunto">
                                <option value="">Selecione um assunto</option>     
                                <option value="Duvidas">Duvidas</option>    
                                <option value="Sugestão">Sugestão</option>    
                                <option value="Criticas">Criticas</option>    
                            </select>
                            <br />
                            <input type="text" placeholder="Nome" id="nome" class="input_text"><br />
                            <input type="text" placeholder="Email" id="email" class="input_text"><br />
                            <textarea placeholder="Mensagem" id="texto"></textarea><br />
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