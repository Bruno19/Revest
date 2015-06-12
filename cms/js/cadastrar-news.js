
	function CadastrarNews(){		
		
		var c = document.cadnews;
		if(c.title.value.length<3 || c.title.length>150){
			$('.resp').html('<label class="erro">Campo Título deve possuir de 3 a 150 caracteres!</label>');
			c.title.focus();
			return false;
		}else
		if(tinyMCE.get('content').getContent().length<30){
			$('.resp').html('<label class="erro">O bloco de conteúdo deve possuir no mínimo 30 caracteres!</label>');
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
						document.cadnews.reset();
					}else{
						$('.resp').html(response);
					}
				},  
				error: function() {  
					$(".resp").html("<label class='erro'>Houve um problema ao efetuar esta operação!</label>"); 
				}  
			}; 
			
			$("#cadnews").on('submit', function(){
				tinyMCE.triggerSave();
			});
			
			$("#cadnews").ajaxForm(options); 
			return false;
	});