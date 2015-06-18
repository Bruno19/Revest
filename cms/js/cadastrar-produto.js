
	function CadastrarProduto(){
		var c = document.cadprod;
		var image = c.image.files;
		
		if(c.title.value<3 || c.title.value>120){
			$('.resp').html('<label class="erro">O campo Título deve possuir de 3 a 120 caracteres!</label>');
			c.title.focus();
			return false;
		}else
		if(c.subtitle.value>100){
			$('.resp').html('<label class="erro">O campo Subtítulo deve possuir no máximo 100 caracteres!</label>');
			c.subtitle.focus();
			return false;
		}else
		if(c.url.value<3 || c.url.value>150){
			$('.resp').html('<label class="erro">O campo URL deve possuir de 3 a 150 caracteres!</label>');
			c.url.focus();
			return false;
		}else
		if(c.image.value==''){
			$('.resp').html('<label class="erro">Selecione uma imagem JPEG válida!</label>');
			c.image.focus();
			return false;
		}else
		if(image[0].type!='image/jpeg'){
			$('.resp').html('<label class="erro">Selecione uma imagem JPEG válida!</label>');
			c.image.focus();
			return false;
		}else
		if(c.content.value<20){
			$('.resp').html('<label class="erro">O campo Descrição deve possuir no mínimo 20 caracteres!</label>');
			c.content.focus();
			return false;
		}
	}
	$(document).ready(function() {  
		   var options = {  
				beforeSend: function() {  
					 $('.resp').html("Processando...!");  
				},  
				uploadProgress: function(event, position, total, percentComplete) {                      
					 $(".resp").html("<label class='load'>Percentual completado: " + percentComplete + "%<br/>Status: Carregando.</label>");  
					 
				},  
				success: function(response) {
					if(response=='ok'){
						$('.resp').html('<label class="ok">Conteúdo cadastrado!</label>');			
						document.cadprod.reset();
					}else{
						$('.resp').html(response);
					}
				},  
				error: function() {  
					$(".resp").html("<label class='erro'>Houve um problema ao efetuar esta operação!</label>"); 
				}  
			}; 		
						
			$("#cadprod").ajaxForm(options); 
			return false;
	});