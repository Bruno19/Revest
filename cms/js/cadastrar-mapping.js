
	function CadastrarClipping(){
		var c = document.cadclipping;
		if(c.title.value<3 || c.title.value>150){
			$('.resp').html('<label class="erro">O campo Título deve possuir de 3 a 150 caracteres!</label>');
			c.title.focus();
		}else
		if(c.uf.value=='null'){
			$('.resp').html('<label class="erro">Selecione uma UF!</label>');
			c.uf.focus();
		}else
		if(c.cidades.value=='null'){
			$('.resp').html('<label class="erro">Selecione uma cidade!</label>');
			c.cidades.focus();
		}else
		if(c.info.value<3 || c.info.value>150){
			$('.resp').html('<label class="erro">O campo Informação deve possuir de 3 a 150 caracteres!</label>');
			c.info.focus();
		}else
		if(c.cont1.value<3 || c.cont1.value>150){
			$('.resp').html('<label class="erro">O campo E-mail / Contato 1 deve possuir de 3 a 150 caracteres!</label>');
			c.cont1.focus();
		}else
		if(c.cont2.value<3 || c.cont2.value>150){
			$('.resp').html('<label class="erro">O campo Website / Contato 2 deve possuir de 3 a 150 caracteres!</label>');
			c.cont2.focus();
		}else{
			var data = {
				name: c.title.value,
				uf: c.uf.value,
				cidade: c.cidades.value,
				area: c.type.value,
				info: c.info.value,
				cont1: c.cont1.value,
				cont2: c.cont2.value,
			};
			
			$('.Btn').hide();
			$('.resp').html('<label class="load">Aguarde...</label>');
			setTimeout(function(){
				$.post('php/mapa.php', {'action':'create', 'data':data}).done(function(result){
					if(result=='ok'){
						c.reset();
						$('.resp').html('<label class="ok">Cadastrado!</label>');						
					}else{
						$('.resp').html('<label class="erro">Erro ao cadastrar!<br/>Código do erro: '+result+'.</label>');
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}
	
	function CapturarEstado(uf){		
		$.post('php/mapa.php', {'action':'loadselectcid', 'uf':uf}).done(function(result){
			$('#SelectCidades').html(result);
		});
	}