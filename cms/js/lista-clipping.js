	
	
	function CarregarlistaClipping(type, page){
		$('.TabelaDeListas tbody').html('<tr class="LinhatablePar"><th>Carregando...</th></tr>');
		
		setTimeout(function(){
			$.post('php/clipping.php', {'action':'loadlist', 'type':type, 'page':page}).done(function(result){
				$('.TabelaDeListas tbody').html(result);
			});
		}, 30);
	};
	
	
	function DeletarClipping(id, page){
		if(confirm('Deseja mesmo fazer isto?')==true){
			$.post('php/clipping.php', {'action':'delete', 'id':id}).done(function(result){				
				CarregarlistaClipping(document.info.type.value, page);
			});
		}
	}
	window.onload = CarregarlistaClipping(document.info.type.value, 1);