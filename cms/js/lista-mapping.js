	
	
	function CarregarlistaMapping(type, page){
		$('.TabelaDeListas tbody').html('<tr class="LinhatablePar"><th>Carregando...</th></tr>');
		
		setTimeout(function(){
			$.post('php/mapa.php', {'action':'loadlist', 'type':type, 'page':page}).done(function(result){
				$('.TabelaDeListas tbody').html(result);
			});
		}, 30);
	};
	
	
	function DeletarMapping(id, page){
		if(confirm('Deseja mesmo fazer isto?')==true){
			$.post('php/mapa.php', {'action':'delete', 'id':id}).done(function(result){				
				CarregarlistaMapping(document.info.type.value, page);
			});
		}
	}
	window.onload = CarregarlistaMapping(document.info.type.value, 1);