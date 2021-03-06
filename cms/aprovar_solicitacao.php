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
                    
					$SelectRows = mysqli_query($conn, "SELECT * FROM solicitacao");					
					$Quant = 10;
					$Rows = mysqli_num_rows($SelectRows);
			
					$Pgs = ceil($Rows/$Quant);
					
					if(isset($_GET['pg'])){
						$Page = $_GET['pg'];
						if($Page>0 && is_numeric($Page)==true){
							$Limit = ($Page-1)*$Quant;
						}else{
							$Limit=0;
						}
					}else{
						$Limit=0;
					}

                    $query = "SELECT * FROM solicitacao ORDER BY id_solicita DESC LIMIT $Limit, $Quant";
                    $executa = mysqli_query($conn, $query);  
                    
                        while($dados = mysqli_fetch_array($executa)){
                                                         
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
                <tr>
					<th colspan="6">
						<?php
							if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
								if($_GET['pg']>2){
									echo '<a href="?pg='.($_GET['pg']-1).'">&lsaquo;</a>';
								}else{
									echo '<a href="?pg=1">&lsaquo;</a>';
								}
							}else{
								echo '<a href="?pg=1">&lsaquo;</a>';
							}
						?>

						&nbsp;
						<?php
							if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
								if($_GET['pg']==$Pgs){
									echo '<a href="?pg='.($Pgs).'">';
								}else{
									echo '<a href="?pg='.($_GET['pg']+1).'">';
								}
							}else{
								echo '<a href="?pg=2">';
							}
						?>Pag 
								<?php
									if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
										echo $_GET['pg'].'/'.$Pgs;
									}else{
										echo '1/'.$Pgs;
									}
								?>
							</a>&nbsp;
						<?php
							if(isset($_GET['pg']) && is_numeric($_GET['pg'])==true){
								if($_GET['pg']==$Pgs){
									echo '<a href="?pg='.($Pgs).'">&rsaquo;</a>';
								}else{
									echo '<a href="?pg='.($_GET['pg']+1).'">&rsaquo;</a>';
								}
							}else{
								echo '<a href="?pg=2">&rsaquo;</a>';
							}
						?>
					</th>
				</tr>                                                                 
            </tbody>
        </table>
    </div>

     


		<br/><br/>
	</div>	
</section>


		
		<?php include_once('includes/footer.php');?>
	</body>
</html>