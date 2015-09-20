<?php include_once('cms/php/conn.php'); mysqli_set_charset($conn, "utf8");?>
<?php $titulo_header = "Solicitações e Doações";   ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>		
	</head>
	<body>
		<?php include_once('includes/header.php');?>
		<?php include_once('includes/menu.php');?>
		
           
           
           <div class="Centro FundoConteudo contato_overflow">
            
            <div class="centraliza_barras">
            
            <div class="doacoes">
                     <div class="posso">
                            <a href="">Doações</a>
                     </div>
                     
                     
                 <?php
                    $conn = @mysql_connect('localhost', 'root', '', 'incena')or die(mysql_errno());
                    @mysql_select_db('incena');

                    $query = "SELECT * FROM solicitacao ORDER BY nome ASC";
                    $executa = mysql_query($query);  
                    
                        while($dados = mysql_fetch_array($executa)){
                                                         
                            $nome = $dados['nome'];                     
                            $email = $dados['email'];                     
                            $msg = $dados['msg'];                     
                            $aprovado = $dados['aprovado'];                     
                                          
                                                
                            if($aprovado == 1){
                ?>                     
                     <div class="resultados">
                         <b> <?php echo $nome; ?> </b><br />
                            <?php echo $email; ?><br />
                            www.incena.com.br<br />
                     </div>  
                     
                <?php }} ?> 
            </div>
            
                <div class="solicita">
                     <div class="posso">
                            <a href="">Solicitações</a>
                     </div>
                     
                <?php
          

                    $query = "SELECT * FROM doacao ORDER BY nome ASC";
                    $executa = mysql_query($query);  
                    
                        while($dados = mysql_fetch_array($executa)){
                                                         
                            $nome = $dados['nome'];                     
                            $email = $dados['email'];                     
                            $msg = $dados['msg'];                     
                            $aprovado = $dados['aprovado'];                     
                            $id = $dados['id_doacao'];                     
                                                
                            if($aprovado == 1){
                ?>                     
                     <div class="resultados">
                         <b> <?php echo $nome; ?> </b><br />
                            <?php echo $email; ?><br />
                            www.incena.com.br<br />
                     </div>  
                     
                <?php }} ?>                   
    
                </div>
            </div>

        </div>
        
       
		<?php include_once('includes/footer.php');?>
	</body>
</html>