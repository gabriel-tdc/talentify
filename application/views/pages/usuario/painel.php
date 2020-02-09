
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Painel</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="bg-white">
				Olá <b><?= $this->user->name; ?></b>, aqui você encontra as vagas de empregos que você favoritou, busque mais vagas clicando <a href="<?= base_url('vagas'); ?>">aqui</a>
			</div>		
		</div>
	</div>
	<div class="row justify-content-center">
		<?php $this->load->view('template/card-job', array('jobs' => $favoriteJobs)); ?>
	</div>
</div>
