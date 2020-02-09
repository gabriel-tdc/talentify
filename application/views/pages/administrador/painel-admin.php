
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Painel Administrador</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="bg-white">
				Olá <b><?= $this->user->name; ?></b>, aqui você pode <a href="<?= base_url('vagas/cadastrar'); ?>">cadastrar</a> ou editar as vagas de empregos
			</div>		
		</div>
	</div>
	<div class="row justify-content-center">
		<?php $this->load->view('template/card-job', array('jobs' => $jobs)); ?>
	</div>
</div>
