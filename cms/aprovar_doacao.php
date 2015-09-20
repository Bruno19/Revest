<?php
	include_once('php/conn.php');
	mysqli_set_charset($conn, "utf8");
	include_once('php/restrict.php');
?>


<script>
    function aprovar(id){

        var aprovar_pedido = $("aprovar_pedido").val();
        
        $.post('../processa.php',{aprovar_pedido:"aprovar_pedido",id:id}).done(function(resultado){
        alert("Doaçao aprovada");
        location.reload();
        });
}
</script>



<script>
    function bloquear(id){

        var bloquear_pedido = $("bloquear_pedido").val();
        
        $.post('../processa.php',{bloquear_pedido:"bloquear_pedido",id:id}).done(function(resultado){
            alert("Doaçao Bloqueada");
            location.reload();
        });
}
</script>



<script>
    function excluir(id){

        var excluir_pedido = $("excluir_pedido").val();
        
        $.post('../processa.php',{excluir_pedido:"excluir_pedido",id:id}).done(function(resultado){
            alert("Doaçao Excluida");
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
	<h1 class="TituloPagina">Moderar Doações</h1>
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

                    $query = "SELECT * FROM doacao ORDER BY id_doacao DESC";
                    $executa = mysql_query($query);  
                    
                        while($dados = mysql_fetch_array($executa)){
                                                         
                            $nome = $dados['nome'];                     
                            $email = $dados['email'];                     
                            $msg = $dados['msg'];                     
                            $aprovado = $dados['aprovado'];                     
                            $id = $dados['id_doacao'];                     
                                                

                ?>
                                               
                    <tr class="tr2" > 
                                                           
                        <td><?php echo $nome; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $msg; ?></td>
                        <td>
                           <?php if($aprovado == 2){  ?>
                           
                                <input type="button" value="aprovar" class="aprovar" onclick="aprovar(<?php echo $id; ?>)">

                            
                            <?php }else{ ?>
                            <input type="button" value="Bloquear" class="bloqueado" onclick="bloquear(<?php echo $id; ?>)">
                            
                            <?php } ?>
                        </td>
                        
                        <td>
                            <input type="button" value="Excluir" class="recusar" onclick="excluir(<?php echo $id; ?>)">
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