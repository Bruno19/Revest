<script type="text/javascript" src="js/editar-orgao.js"></script>
<section class="Centro Conteudo">
	<h1 class="TituloPagina">Editar Orgao do Setor</h1><br/>
	
	<form name="cadorgao" method="post" onsubmit="return EditarOrgaoSetor(this)">
		<input type="hidden" name="id" value="<?php echo $Orgao->Id;?>"/>
		<div class="Linha">				
			<input type="text" name="title" class="Campo input" placeholder="Título: " style="width: 37.3%"  value="<?php echo $Orgao->Title;?>"/>						
		</div>
		
		<div class="Linha">				
			<input type="text" name="url" class="Campo input" placeholder="URL: " style="width: 37.3%"  value="<?php echo $Orgao->Url;?>"/>						
		</div>				
		
		<div class="Linha">
			<input type="submit" value="Salvar Alterações" class="Campo Btn CadEmp AlterDs"/>
		</div>
		
		<div class="Linhainput resp">
			&nbsp;
		</div>
		<br/><br/>
	</form>
</section>