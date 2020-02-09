<nav class="navbar navbar-expand-lg">
	<div class="container">
		<div class="row div col-12">
			<a class="navbar-brand" href="<?= base_url(''); ?>">
				<img src="<?= base_url('public/img/Talentify-logo.png'); ?>" alt="Logotipo Talentify" class="mr-2">
			</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('vagas'); ?>">Vagas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('sobre'); ?>">Sobre</a>
					</li>
				</ul>
				<form action="<?= base_url('vagas'); ?>" class="form-inline my-2 my-lg-0" method="post">
					<input name="search" class="form-control mr-sm-2" type="text" placeholder="Buscar">
					<button class="btn btn-primary m-2 my-sm-0" type="submit">Buscar</button>
					
					<?php if($this->userIsLoggedIn){ ?>
						<a href="<?= base_url('painel'); ?>" class="btn btn-primary m-2 my-sm-0" type="button">Painel</a>
						<a href="<?= base_url('logout'); ?>" class="btn btn-primary m-2 my-sm-0" type="button">Logout</a>
					<?php } else { ?>
						<a href="<?= base_url('login'); ?>" class="btn btn-primary m-2 my-sm-0" type="button">Login</a>
					<?php }?>
				</form>
			</div>
		</div>
	</div>
</nav>
