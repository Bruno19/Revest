
	function EditarOrgaoSetor(){
		var c = document.cadorgao;
		
		if(c.title.value.length<3 || c.title.value.length>150){
			$('.resp').html('<label class="erro">O campo título deve possuir de 3 a 150 caracteres!</label>');
			c.title.focus();
		}else
		if(c.url.value.length<3 || c.url.value.length>150){
			$('.resp').html('<label class="erro">O campo URL/Link deve possuir de 3 a 150 caracteres!</label>');
			c.url.focus();
		}else{
			var data = {
				id: c.id.value,
				title: c.title.value,
				url: c.url.value,
			};
			
			$('.Btn').hide();
			$('.resp').html('<label class="load">Aguarde...</label>');
			setTimeout(function(){
				$.post('php/orgao-setor.php', {'action':'edit', 'data':data}).done(function(result){
					if(result=='ok'){
						$('.resp').html('<label class="ok">Salvo!</label>');						
					}else{
						$('.resp').html(result);
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}