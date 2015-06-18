	
	
	function CarregarlistaProdutos(type, page){
		$('.TabelaDeListas tbody').html('<tr class="LinhatablePar"><th>Carregando...</th></tr>');
		
		setTimeout(function(){
			$.post('php/product.php', {'action':'loadlist', 'type':type, 'page':page}).done(function(result){					
				$('.TabelaDeListas tbody').html(result);
			});
		}, 30);
	};
	
	
	function DeletarProduto(id, page){
		if(confirm('Deseja mesmo fazer isto?')==true){
			$.post('php/product.php', {'action':'delete', 'id':id}).done(function(result){				
				CarregarlistaProdutos(document.info.type.value, page);
			});
		}
	}
	window.onload = CarregarlistaProdutos(document.info.type.value, 1);