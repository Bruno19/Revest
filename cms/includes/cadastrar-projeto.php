<script type="text/javascript" src="js/cadastrar-projeto.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina">Criar Novo Projeto</h1><br/>
	
	<form name="cadproject" method="post" onsubmit="return CadastrarProjeto(this)">	
		<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
		<div class="Linha">				
			<input type="text" name="name" class="Campo input" placeholder="Nome do Projeto: " style="width: 37.3%"/>
			<input type="submit" value="Criar" class="Campo Btn CadEmp AlterDs"/>			
		</div>		
		<div class="Linhainput RespCad">
			&nbsp;
		</div>
		<br/><br/>
	</form>
		<h1 class="TituloPagina">Lista de Projetos Criados</h1>
		
		<div class="CadCat">			
			<table class="TabelaDeListas">
				<tbody>
					<tr>
						<th>ID</th>
						<th>Nome Do Projeto</th>
						<th>Data</th>
						<th>Deletar</th>
						<th>Imagens</th>
					</tr>
					<tr class="LinhatableImpar">
						<td colspan="5">&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<br/><br/>
		</div>	
	
</section>

<script type="text/javascript">
	
	window.onload = function(){
		var c = document.cadproject;
		CarregarlistaProjetos(c.type.value, 1);
	}
</script>