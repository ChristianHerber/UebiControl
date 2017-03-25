<?php $this->load->view('commons/cabecalho'); ?>

<div class="content-wrapper">
<div class="col-md-12">
	<div class="page-header"></div>

	<div class="box box-primary">
		<div class="box-header with-border">
          <h3 class="box-title">Clientes - Facebook Marketing</h3>

			<div class="dropdown pull-right">
			  <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Mais
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="/sist/cadastrar"><i class="fa fa-user-plus"></i>Novo</a></li>
			  </ul>
			</div>
        </div>
		<div class="dataTables_wrapper form-inline dt-bootstrap">
			<table  class="table table-bordered table-hover dataTable" style="background: #fff;">
				<thead>
					<tr role="row">
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nome</th>
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Email</th>
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Telefone</th>
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Celular</th>
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Serviço</th>
						<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Operações</th>
					</tr>
				</thead>
				<tbody>
					<?php if ($facebook == FALSE): ?>
						<tr><td colspan="2">Nenhum contato encontrado</td></tr>
					<?php else: ?>
						<?php foreach ($facebook as $row): ?>
							<tr>
								<td><?= $row['nome'] ?></td>
								<td><?= $row['email'] ?></td>
								<td><?= $row['telefone'] ?></td>
								<td><?= $row['celular'] ?></td>
								<td><?= $row['servico'] ?></td>
								<td class="text-center">
									<a href="<?= $row['editar_url'] ?>">
										<button class="btn btn-xs btn-primary">
											<i class="fa fa-pencil" style="color:#fff;" aria-hidden="true"></i>
										</button>
									</a>
									<a href="<?= $row['excluir_url'] ?>">
										<button class="btn btn-xs btn-warning">
											<i class="fa fa-eye" style="color:#fff;" aria-hidden="true"></i>
										</button>
									</a>
									<a href="<?= $row['excluir_url'] ?>">
										<button class="btn btn-xs btn-danger">
											<i class="fa fa-times" style="color:#fff;" aria-hidden="true"></i>
										</button>
									</a>

								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
</div>

<?php $this->load->view('commons/rodape'); ?>