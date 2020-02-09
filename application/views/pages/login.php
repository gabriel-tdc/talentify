
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Login</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="bg-white">
				<form method="post" action="<?= base_url('users/getOne'); ?>" id="formLogin">
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
					</div>
					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>

					<div id="alert" class="alert mt-2"></div>

					<p class="small">Não possui login? <a href="<?php echo base_url('cadastrar'); ?>">Clique aqui</a> para criar uma conta.</p>
				</form>
			</div>		
		</div>
	</div>
</div>
