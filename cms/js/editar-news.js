
	function EditarNews(){		
		
		var c = document.editnews;
		if(c.title.value.length<3 || c.title.length>150){
			$('.resp').html('<label class="erro">Campo Título deve possuir de 3 a 150 caracteres!</label>');
			c.title.focus();			
		}else
		if(tinyMCE.get('content').getContent().length<30){
			$('.resp').html('<label class="erro">O bloco de conteúdo deve possuir no mínimo 30 caracteres!</label>');
			c.content.focus();
			
		}else{
			var data = {
				id: c.id.value,
				action: c.action.value,
				type: c.type.value,
				title: c.title.value,
				content: tinyMCE.get('content').getContent()
			};
			
			$('.Btn').hide();
			$('.resp').html('<label class="load">Aguarde...</label>');
			
			setTimeout(function(){
				$.post('php/news.php', {'action':'edit', 'data':data}).done(function(result){
					$('.resp').html(result);
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}
	