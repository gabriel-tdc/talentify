<script> 
	$(document).ready(function() { 
		var options = {
			success:       showResponse
		}; 
	
		$('#formFavoritar').ajaxForm(options); 
	}); 
	
	function showResponse(responseText, statusText, xhr, $form)  { 
		var response = JSON.parse(responseText);

		if(response.response == "Favoritado"){
			$('#favoritar').html(`<i class="fas fa-star"></i>  ${response.response}`);
		} else {
			$('#favoritar').html(`<i class="far fa-star"></i>  ${response.response}`);
		}

	} 
</script> 
