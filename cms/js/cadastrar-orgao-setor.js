
	function CadastrarOrgaoSetor(){
		var c = document.cadorgao;
		
		if(c.title.value.length<3 || c.title.value.length>150){
			$('.resp').html('<label class="erro">O campo título deve possuir de 3 a 150 caracteres!</label>');
			c.title.focus();
		}else{
			var data = {
				title: c.title.value,
				url: c.url.value,
			};
			
			$('.Btn').hide();
			$('.resp').html('<label class="load">Aguarde...</label>');
			setTimeout(function(){
				$.post('php/orgao-setor.php', {'action':'create', 'data':data}).done(function(result){
					if(result=='ok'){
						c.reset();
						$('.resp').html('<label class="ok">Cadastrado!</label>');						
					}else{
						$('.resp').html(result);
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}