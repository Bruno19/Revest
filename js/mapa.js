
	function CapturarEstado(uf){		
		$.post('cms/php/mapa.php', {'action':'loadselectcid', 'uf':uf}).done(function(result){
			$('#SelectCidades').html(result);
		});
	}
	
	function CarregarResultados(valor){
		var area = document.formarea.area.value;
		$('.ResultBusca').html('<label style="color:#fff">Carregando...</label>');
		setTimeout(function(){
			$.post('cms/php/mapa.php', {'action':'loadmapping', 'cidade':valor, 'area':area}).done(function(result){
				$('.ResultBusca').html(result);
			});
		}, 30);
	}