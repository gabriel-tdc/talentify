<?php $this->load->helper('text'); ?>

<?php foreach($jobs as $job){ ?>
	<div class="col-md-4 my-3">
		<div class="card <?= !$job->status ? 'card-disabled' : ''; ?>">
			<div class="card-body text-center">
				<h2 class="card-title h5"><?= $job->title; ?></h2>
				<p class="card-text"><?= ellipsize($job->description, 100, 1); ?></p>
				<a href="<?php echo base_url('vaga/'.$job->slug); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Ver detalhes</a>
			</div>
		</div>
	</div>
<?php } ?>
