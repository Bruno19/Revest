<section class="Centro CentroConteudo">
	<br/>
	<h1 class="TituloPagina"><?php echo $Titulo;?></h1>
	<form name="info">
		<input type="hidden" name="type" value="<?php echo $_GET['area'];?>"/>
	</form>
	<div class="CadCat">
		<br/>
		<table class="TabelaDeListas">
			<tbody>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>UF</th>
					<th>Deletar</th>
					<th>Editar</th>
				</tr>
				<tr class="LinhatableImpar">
					<td colspan="5">&nbsp;</td>
				</tr>
			</tbody>
		</table>
		<br/><br/>
	</div>	
</section>

<script type="text/javascript" src="js/lista-mapping.js"></script>
