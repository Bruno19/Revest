
	function EditarProduto(){
		var c = document.cadprod;
		if(c.title.value<3 || c.title.value>120){
			$('.resp').html('<label class="erro">O campo Título deve possuir de 3 a 120 caracteres!</label>');
			c.title.focus();
		}else
		if(c.url.value<3 || c.url.value>150){
			$('.resp').html('<label class="erro">O campo URL deve possuir de 3 a 150 caracteres!</label>');
			c.url.focus();
		}else
		if(c.content.value<20){
			$('.resp').html('<label class="erro">O campo Conteúdo deve possuir no mínimo 20 caracteres!</label>');
			c.content.focus();
		}else{
			var data = {
				id: c.id.value,
				type: c.type.value,
				title: c.title.value,
				subtitle: c.subtitle.value,
				featured:  $("input[name=featured]:checked").val(),
				contact: c.contact.value,
				url: c.url.value,
				content: c.content.value				
			};
			
			$('.Btn').hide();
			$('.resp').html('<label class="load">Aguarde...</label>');
			setTimeout(function(){
				$.post('php/product.php', {'action':'edit', 'data':data}).done(function(result){
					if(result=='ok'){
						$('.resp').html('<label class="ok">Editado!</label>');						
					}else{
						$('.resp').html('<label class="erro">Erro ao editar!<br/>Código do erro: '+result+'.</label>');
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}