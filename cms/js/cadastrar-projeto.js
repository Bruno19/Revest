	function CarregarlistaProjetos(type, page){
		$('.TabelaDeListas tbody').html('<tr class="LinhatablePar"><th>Carregando...</th></tr>');
		
		setTimeout(function(){
			$.post('php/project.php', {'action':'loadlist', 'type':type, 'page':page}).done(function(result){
				$('.TabelaDeListas tbody').html(result);
			});
		}, 30);
	};
	
	function CadastrarProjeto(){
		var c = document.cadproject;
		var name = c.name.value;
		if(name.length<3 || name.lenght>120){
			$('.RespCad').html('<label class="erro">O nome do projeto deve possuir de 3 a 120 caracteres!</label>');
		}else{
			var data = {
				type: c.type.value,
				name: name
			};
			
			$('.RespCad').html('<label class="load">Aguarde...</label>');
			$('.Btn').hide();
			setTimeout(function(){
				$.post('php/project.php', {'action':'create', 'data':data}).done(function(result){
					if(result=='ok'){
						c.reset();
						$('.RespCad').html('<label class="ok">Projeto criado!</label>');
						CarregarlistaProjetos(c.type.value, 1)
					}else{
						$('.RespCad').html(result);
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}
	
	function EditarNomeProjeto(){
		var c = document.editproject;
		var name = c.name.value;
		if(name.length<3 || name.lenght>120){
			$('.RespCad').html('<label class="erro">O nome do projeto deve possuir de 3 a 120 caracteres!</label>');
		}else{
			var data = {
				id: c.id.value,
				name: name
			};
			
			$('.RespCad').html('<label class="load">Aguarde...</label>');
			$('.Btn').hide();
			setTimeout(function(){
				$.post('php/project.php', {'action':'update', 'data':data}).done(function(result){
					if(result=='ok'){
						$('.RespCad').html('<label class="ok">Salvo com sucesso!!</label>');
					}else{
						$('.RespCad').html(result);
					}
					$('.Btn').show();
				});
			}, 30);
		}
		
		return false;
	}
	
	function ValidarTextoImg(){
		var c = document.addimages;
		var text=c.text.value;
		if(text.length>250){
			alert('O texto da imagem deve possuir no máximo 250 caracteres!');			
			return false;
		}else{
			return true;
		}
	}
	
	function DeletarProjeto(id, page){
		if(confirm('Ao excluir este projeto, TODAS as imagens cadastradas no mesmo também serão apagadas! \nDeseja mesmo fazer isto?')){
			$.post('php/project.php', {'action':'deleteproject', 'id':id}).done(function(result){
				CarregarlistaProjetos('', page);
			});
		}
	}