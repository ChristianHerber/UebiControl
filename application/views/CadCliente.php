<?php $this->load->view('commons/cabecalho'); ?>

<div class="content-wrapper">

	<div class="page-header"></div>
	<?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="col-lg-12">
		<div class="alert alert-warning"><?php echo $this->session->flashdata('error'); ?></div>
	   </div>
  <?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
    <div class="col-lg-12">
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	   </div>
  <?php endif; ?>

<section class="content">

      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastro de Clientes</h3>
			<div class="dropdown pull-right">
			  <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			    Mais
			    <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
			    <li><a href="/listarcliente"><i class="fa fa-list"></i>Listagem</a></li>
			  </ul>
			</div>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="<?=base_url('salvar')?>" enctype="multipart/form-data">
          <div class="box-body">

            <div class="form-group col-lg-12 col-md-12">
              <label for="NomeCliente">Nome</label>
			         <input type="text" name="nome" class="form-control" value="<?=set_value('nome')?>" id="NomeCliente" autofocus required placeholder="Nome"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="RazaoCliente">Razão</label>
			         <input type="text" name="razao" class="form-control" value="<?=set_value('razao')?>" id="RazaoCliente" required placeholder="Razão Social"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CnpjCliente">CPF / CNPJ</label>
			         <input type="text" name="cnpj" class="form-control" value="<?=set_value('cnpj')?>" id="CnpjCliente" required placeholder="CPF/CNPJ"/>
            </div>

            <div class="form-group col-lg-12 col-md-12">
              <label for="EnderecoCliente">Endereço</label>
			         <input type="text" name="endereco" class="form-control" value="<?=set_value('endereco')?>" id="EnderecoCliente" required placeholder="Rua/Av"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="TelefoneCliente">Telefone</label>
			         <input type="text" name="telefone" class="form-control" value="<?=set_value('telefone')?>" id="TelefoneCliente" placeholder="(00)0000-0000"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CelularCliente">Celular</label>
			         <input type="text" name="celular" class="form-control" value="<?=set_value('celular')?>" id="CelularCliente" required placeholder="(00)0000-0000"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="EmailCliente">E-mail</label>
			         <input type="email" name="email" class="form-control" value="<?=set_value('email')?>" id="EmailCliente" required placeholder="Email@email.com"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="SiteCliente">Site</label>
			         <input type="url" name="site" class="form-control" value="<?=set_value('site')?>" id="SiteCliente" placeholder="www.site.com"/>
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="CidadeCliente">Cidade</label>
              <input type="text" name="cidade" class="form-control" value="<?=set_value('cidade')?>" id="CidadeCliente" placeholder="nome da Cidade"/>
<!--         			  <select name="cidade" class="form-control" value="<?=set_value('cidade')?>" id="CidadeCliente"/>
        				<option value="Tangara da Serra" selected="selected">Tangará da Serra</option>
        				<option value="Campo Novo do Parecis">Campo Novo do Parecis</option>
        				<option value="Barra do Bugres">Barra do Bugres</option>
        				<option value="Nova Olímpia">Nova Olímpia</option>
        				<option value="Vilhena - RO">Vilhena - RO</option>
        			  </select> -->
            </div>

            <div class="form-group col-lg-6 col-md-6">
              <label for="ResponsavelCliente">Responsável</label>
			         <input type="text" name="responsavel" class="form-control" value="<?=set_value('responsavel')?>" id="ResponsavelCliente" placeholder="Nome da pessoa para contato"/>
            </div>

            <div class="form-group col-lg-11 col-md-11">
              <label for="ServicoCliente">Serviço Prestado</label>
      			   <select name="servico" class="form-control" id="ServicoCliente" required/>
                <option value=""selected="selected">- Escolha os serviços -</option>
                <option value="Visual">Identidade Visual</option>
                <option value="Adwords">Google AdWords</option>
                <option value="Conteudo">Gestão de Conteúdo</option>
      				  <option value="Website">Des. Website</option>
      				  <option value="Facebook">Facebook</option>
      				  <option value="E-mail Marketing">E-mail Marketing</option>
      			  </select>
              <input type="hidden" name="servico" value="<?=set_value('servico')?>" id="ClienteServ"/>
            </div>
            <div class="form-group col-lg-1 col-md-1">
              <label for="ServicoCliente" style="color:#fff;">Serviço</label>
              <a class="btn btn-md btn-success" id="addServ"><i class="fa fa-plus-circle fa-lg"></i></a>
            </div>

            <div class="form-group col-lg-12 col-md-12" id="servicos"></div>

            

            <div class="form-group col-lg-12 col-md-12">
              <label for="ObsCliente">Observações</label>
			         <textarea rows="12" name="obs" class="form-control" id="ObsCliente" placeholder="Observações..."><?=set_value('responsavel')?></textarea>
            </div>

          </div>
          <!-- /.box-body -->

          <div class="box-footer">
          	<div class="form-group col-lg-12 col-md-12">
            <button type="submit" class="btn btn-success pull-right" />Cadastrar</button>
          </div>
          </div>
        </form>
      </div>
      <!-- /.box -->

</section>


</div>

<?php $this->load->view('commons/rodape'); ?>