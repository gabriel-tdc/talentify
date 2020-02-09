<script> 
	$(document).ready(function() { 
		var options = {
			success:       showResponse
		}; 
	
		$('#formLogin').ajaxForm(options); 
	}); 
	
	function showResponse(responseText, statusText, xhr, $form)  { 
		var response = JSON.parse(responseText);
		if(response.status == false){
			$('#alert').show().removeClass('alert-success').addClass('alert-danger');
			$('#alert').html(response.response);
		} else {
			$('#alert').html('');
			window.location.replace("<?php echo base_url('painel'); ?>");
		}
	} 
</script> 
