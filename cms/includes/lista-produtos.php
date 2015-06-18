<section class="Centro CentroConteudo">
	<br/>
	<h1 class="TituloPagina"><?php echo $Titulo;?></h1>
	<form name="info">
		<input type="hidden" name="type" value="<?php echo $_GET['type'];?>"/>
	</form>
	<div class="CadCat">
		<br/>
		<table class="TabelaDeListas">
			<tbody>
				<tr>
					<th>Imagem</th>
					<th>Título</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="4">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<br/><br/>
	</div>	
</section>

<script type="text/javascript" src="js/lista-produtos.js"></script>
