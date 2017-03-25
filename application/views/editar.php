<?php $this->load->view('commons/cabecalho'); ?>

<div class="content-wrapper">

	<div class="page-header"></div>

<div class="content">

	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>


	<div class="content">
      <!-- general form elements -->
      <div class="box box-primary">
		<div class="box-header with-border">
          <h3 class="box-title">Atualizar Cadastro de <?=$contato['nome']?></h3>

			<div class="dropdown pull-right">
			  <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Mais
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="/cadastrar"><i class="fa fa-user-plus"></i>Novo</a></li>
			    <li><a href="/listarcliente"><i class="fa fa-list"></i>Listagem</a></li>
			  </ul>
			</div>
        </div>
			<form method="post" action="<?=base_url('atualizar')?>" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group col-lg-12 col-md-12">
              <label for="NomeCliente">Nome</label>
			         <input type="text" name="nome" class="form-control" value="<?=$contato['nome']?>" id="NomeCliente" autofocus required placeholder="Nome"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="RazaoCliente">Razão</label>
			         <input type="text" name="razao" class="form-control" value="<?=$contato['razao']?>" id="RazaoCliente" required placeholder="Razão Social"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CnpjCliente">CPF / CNPJ</label>
			         <input type="text" name="cnpj" class="form-control" value="<?=$contato['cnpj']?>" id="CnpjCliente" required placeholder="CPF/CNPJ"/>
            </div>

            <div class="form-group col-lg-12 col-md-12">
              <label for="EnderecoCliente">Endereço</label>
			         <input type="text" name="endereco" class="form-control" value="<?=$contato['endereco']?>" id="EnderecoCliente" required placeholder="Rua/Av"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="TelefoneCliente">Telefone</label>
			         <input type="text" name="telefone" class="form-control" value="<?=$contato['telefone']?>" id="TelefoneCliente" placeholder="(00)0000-0000"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CelularCliente">Celular</label>
			         <input type="text" name="celular" class="form-control" value="<?=$contato['celular']?>" id="CelularCliente" required placeholder="(00)0000-0000"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="EmailCliente">E-mail</label>
			         <input type="email" name="email" class="form-control" value="<?=$contato['email']?>" id="EmailCliente" required placeholder="Email@email.com"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="SiteCliente">Site</label>
			         <input type="url" name="site" class="form-control" value="<?=$contato['site']?>" id="SiteCliente" placeholder="www.site.com"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CidadeCliente">Cidade</label>
              <input type="text" name="cidade" class="form-control" value="<?=$contato['site']?>" id="CidadeCliente" placeholder="nome da Cidade"/>
<!--         			  <select name="cidade" class="form-control" value="<?=$contato['cidade']?>" id="CidadeCliente"/>
        				<option value="Tangara da Serra" selected="selected">Tangará da Serra</option>
        				<option value="Campo Novo do Parecis">Campo Novo do Parecis</option>
        				<option value="Barra do Bugres">Barra do Bugres</option>
        				<option value="Nova Olímpia">Nova Olímpia</option>
        				<option value="Vilhena - RO">Vilhena - RO</option>
        			  </select> -->
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="ResponsavelCliente">Responsável</label>
			         <input type="text" name="responsavel" class="form-control" value="<?=$contato['responsavel']?>" id="ResponsavelCliente" placeholder="Nome da pessoa para contato"/>
            </div>

            <div class="form-group col-lg-11 col-md-11">
              <label for="ServicoCliente">Serviço Prestado</label>
               <select name="servico" class="form-control" id="ServicoCliente" required/>
                <option value="" selected="selected">- Escolha os serviços -</option>
                <option value="Identidade Visual">Identidade Visual</option>
                <option value="Adwords">AdWords</option>
                <option value="Gestão de Conteúdo">Gestão de Conteúdo</option>
                <option value="Website">Website</option>
                <option value="Facebook">Facebook</option>
                <option value="E-mail Marketing">E-mail Marketing</option>
              </select>
              <input type="hidden" name="servico" value="<?=$contato['servico']?>" id="ClienteServ"/>
            </div>
            <div class="form-group col-lg-1 col-md-1">
              <label for="ServicoCliente">Serviço</label>
              <a class="btn btn-md btn-success" id="addServ"><i class="fa fa-plus-circle fa-lg"></i></a>
            </div>

            <div class="form-group col-lg-12 col-md-12" id="servicos"></div>

            <div class="form-group col-lg-12 col-md-12">
              <label for="ObsCliente">Observações</label>
			   <textarea rows="12" name="obs" class="form-control" id="ObsCliente" placeholder="Observações..."><?=$contato['responsavel']?></textarea>
            </div>

          </div>

				<div class="box-footer">
					<input type="hidden" name="id" value="<?=$contato['id']?>"/>
					<input type="submit" value="Salvar" class="btn btn-success" />
				</div>
			</form>
		</div>
	</div>

</div>
</div>
<?php $this->load->view('commons/rodape'); ?>