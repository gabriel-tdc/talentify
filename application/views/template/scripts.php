
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<!-- Jquery Ajax Form -->
<script src="http://malsup.github.com/jquery.form.js"></script> 

<!-- Jquery Mask -->
<script src="<?= base_url('public/jquery/jquery.mask.js'); ?>"></script> 

<script>
	$('.mask-money').mask('000,000,000,000,000.00', {reverse: true});
</script>

<script>
	$('.btn-delete').on('click', function(){
		if($(this).hasClass('btn-delete')){
			$(this).html('Tem certeza?').addClass('btn-danger').removeClass('btn-delete');
			return false;
		}
	});
</script>

<?php
	$auxPage = explode('/', $pageContent);
	$auxPage = end($auxPage);
	if(file_exists(FCPATH."application/views/template/scripts/".$auxPage.".php")){
		$this->load->view("template/scripts/".$auxPage);
	}
?>
