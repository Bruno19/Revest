	
	
	function CarregarlistaOrgao(page){
		$('.TabelaDeListas tbody').html('<tr class="LinhatablePar"><th>Carregando...</th></tr>');
		
		setTimeout(function(){
			$.post('php/orgao-setor.php', {'action':'loadlist', 'page':page}).done(function(result){
				$('.TabelaDeListas tbody').html(result);
			});
		}, 30);
	};
	
	
	function DeletarOrgao(id, page){
		if(confirm('Deseja mesmo fazer isto?')==true){
			$.post('php/orgao-setor.php', {'action':'delete', 'id':id}).done(function(result){				
				CarregarlistaOrgao(page);
			});
		}
	}
	window.onload = CarregarlistaOrgao(1);