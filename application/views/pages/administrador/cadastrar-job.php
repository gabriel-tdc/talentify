
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12 text-center">
			<h1 class="title my-5">Cadastrar Vaga</h1>
		</div>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="bg-white">
				<form method="post" action="<?= base_url('jobs/add'); ?>" id="formCadastrarJob">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" class="form-control" id="titulo" name="title" placeholder="Título" value="">
					</div>
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<textarea class="form-control" id="descricao" name="description" placeholder="Descrição"></textarea>
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="" disabled selected>Selecione o Status</option>
							<option value="1">Ativo</option>
							<option value="0">Inativo</option>
						</select>
					</div>
					<div class="form-group">
						<label for="endereco">Endereço</label>
						<input type="text" class="form-control" id="endereco" name="workplace" placeholder="Endereço" value="">
					</div>
					<div class="form-group">
						<label for="salario">Salário</label>
						<input type="text" class="form-control mask-money" id="salario" name="salary" placeholder="Salário" value="">
					</div>
					
					<button type="submit" class="btn btn-primary">Cadastrar</button>
					<a href="<?= base_url('painel-administrador'); ?>" class="btn btn-primary">Cancelar</a>
					
					<div id="alert" class="alert mt-2"></div>
					
				</form>
			</div>		
		</div>
	</div>
</div>
