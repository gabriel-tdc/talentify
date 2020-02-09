<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Vagas</h1>
		</div>

		<?php if($jobs){ ?>
			<?php $this->load->view('template/card-job', array('jobs' => $jobs)); ?>
		<?php } else {?>
			<div class="col-md-4 my-3">
				<div class="card">
					<div class="card-body text-center">
						<h2 class="card-title h5">Nenhuma vaga encontrada.</h2>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
</div>

