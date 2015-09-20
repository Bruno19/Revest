<?php
	include_once('php/conn.php');
	mysqli_set_charset($conn, "utf8");
	include_once('php/restrict.php');
?>


<script>
    function aprovar_solici(id){

        var aprovar_solicitacao = $("aprovar_solicitacao").val();
        
        $.post('../processa.php',{aprovar_solicitacao:"aprovar_solicitacao",id:id}).done(function(resultado){
        alert("Solicitação aprovada");
        location.reload();
        });
}
</script>



<script>
    function bloquear_solici(id){

        var bloquearsolicitacao = $("bloquearsolicitacao").val();
        
        $.post('../processa.php',{bloquearsolicitacao:"bloquearsolicitacao",id:id}).done(function(resultado){
            alert("Solicitação Bloqueada");
            location.reload();
        });
}
</script>



<script>
    function excluir_solici(id){

        var excluirsolicitacao = $("excluirsolicitacao").val();
        
        $.post('../processa.php',{excluirsolicitacao:"excluirsolicitacao",id:id}).done(function(resultado){
            alert("Solicitação Excluida");
            location.reload();
        });
}
</script>





<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php include_once('includes/head.php');?>
	</head>
	<body>
		<?php include_once('includes/topo.php');?>
		

<section class="Centro CentroConteudo">
	<br/>
	<h1 class="TituloPagina">Moderar Solicitações</h1>
	<form name="info">
		<input type="hidden" name="type" value=""/>
	</form>
	<div class="CadCat">
		<br/>



    <div class="moderacao">
        <table class="mod" border="0"> 
            <tbody>
                <tr class="tr1"> 
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Mensagem </td>
                    <td>Aprovar</td>
                    <td>Recusar</td>
                    <td>Situação</td>
                </tr> 

                <?php
                    $conn = @mysql_connect('localhost', 'root', '', 'incena')or die(mysql_errno());
                    @mysql_select_db('incena');

                    $query = "SELECT * FROM solicitacao ORDER BY id_solicita DESC";
                    $executa = mysql_query($query);  
                    
                        while($dados = mysql_fetch_array($executa)){
                                                         
                            $nome = $dados['nome'];                     
                            $email = $dados['email'];                     
                            $msg = $dados['msg'];                     
                            $aprovado = $dados['aprovado'];                     
                            $id = $dados['id_solicita'];                     
                                                

                ?>
                                               
                    <tr class="tr2" > 
                                                           
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $msg; ?></td>
                        <td>
                           <?php if($aprovado == 2){  ?>
                           
                                <input type="button" value="aprovar" class="aprovar" onclick="aprovar_solici(<?php echo $id; ?>)">

                            
                            <?php }else{ ?>
                            <input type="button" value="Bloquear" class="bloqueado" onclick="bloquear_solici(<?php echo $id; ?>)">
                            
                            <?php } ?>
                        </td>
                        
                        <td>
                            <input type="button" value="Excluir" class="recusar" onclick="excluir_solici(<?php echo $id; ?>)">
                        </td>
                        
                        <td>
                           <?php if($aprovado == 2){  ?>
                               Aguardando aprovação
                            <?php }else{ ?>
                             Aprovado
                            <?php } ?>
                        </td>
                      
                    </tr>
                
                <?php } ?>
                
                              
                                            
                                                                        
            </tbody>
        </table>
    </div>

     


		<br/><br/>
	</div>	
</section>


		
		<?php include_once('includes/footer.php');?>
	</body>
</html>