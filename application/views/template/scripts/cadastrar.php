<script> 
	$(document).ready(function() { 
		var options = {
			success:       showResponse
		}; 
	
		$('#formCadastro').ajaxForm(options); 
	}); 
	
	function showResponse(responseText, statusText, xhr, $form)  { 
		var response = JSON.parse(responseText);
		if(response.status == false){
			$('#alert').show().removeClass('alert-success').addClass('alert-danger');
			$('#alert').html(response.response);
		} else {
			$('#alert').show().removeClass('alert-danger').addClass('alert-success');
			$('#alert').html('Cadastro realizado com sucesso! Aguarde enquanto você é redirecionado <i class="fas fa-spinner fa-spin"></i>');
			setTimeout(
				function(){
					window.location.replace("<?php echo base_url('painel'); ?>");
				}, 2000);
		}
	} 
</script> 
