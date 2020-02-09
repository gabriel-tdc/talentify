<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5"><?= $job->title; ?></h1>
		</div>

		<div class="col-md-12 my-3">
			<div class="card">
				<div class="card-body text-center">

					<?php if($this->userIsLoggedIn && !($this->user->access)){ ?>
						<div class="row justify-content-end mb-4">
							<div class="col-4">
								<form action="<?= base_url('favorites/toggle'); ?>" method="post" id="formFavoritar">
									<input type="hidden" name="id_job" value="<?= $job->id ?>">
									<input type="hidden" name="id_user" value="<?= $this->user->id ?>">
									<button id="favoritar" type="submit" class="btn btn-primary">
										<?= ($isFavorited) ? '<i class="fas fa-star"></i> Favoritado' : '<i class="far fa-star"></i> Favoritar' ?>
									</button>
								</form>
							</div>
						</div>
					<?php } ?>
					
					<?php if($this->user->access){ ?>
						<div class="row justify-content-end mb-4">
							<div class="col-4">
								<a href="<?= base_url('vagas/editar/'.$job->slug); ?>" class="btn btn-primary mr-2">
									<i class="fas fa-pen"></i> Editar
								</a>
								<a href="<?= base_url('vagas/apagar/'.$job->id); ?>" class="btn btn-primary btn-delete">
									<i class="fas fa-trash"></i> Apagar
								</a>
							</div>
						</div>
					<?php } ?>

					<p class="card-text text-left"><?= nl2br($job->description) ?></p>

					<div class="row">
						<?php if($job->workplace) { ?>
							<div class="col-6">
								<p class="card-text"><i class="fas fa-map-marked-alt"></i> <?= $job->workplace ?></p>
							</div>
						<?php } ?>
						<?php if($job->salary) { ?>
							<div class="col-6">
								<p class="card-text"><i class="fas fa-dollar-sign"></i> <?= number_format($job->salary, 2) ?></p>
							</div>
						<?php } ?>
					</div>
					<div class="row mt-5">
						<div class="col-12">
							<a href="<?= base_url('painel'); ?>" class="btn btn-primary">
								<i class="fas fa-arrow-left"></i> Voltar
							</a>
						</div>
					</div>
					

				</div>
			</div>
		</div>
	</div>
</div>

