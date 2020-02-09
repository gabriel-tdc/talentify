
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Cadastrar</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="bg-white">
				<form method="post" action="<?= base_url('users/add'); ?>" id="formCadastro">
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" class="form-control" id="nome" name="name" placeholder="Seu nome">
					</div>
					<div class="form-group">
						<label for="email">E-mail</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="E-mail">
					</div>
					<div class="form-group">
						<label for="password">Senha</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Cadastrar</button>

					<div id="alert" class="alert mt-2"></div>

					<p class="small">Já possui login? <a href="<?= base_url('login'); ?>">Clique aqui</a> para realizar login.</p>
				</form>
			</div>		
		</div>
	</div>
</div>
