<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	/**
  * Carrega a home
  */
	public function Index()
	{

		$contatos = $this->contatos_model->GetAll('nome');
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);


		$facebook = $this->facebook_model->GetAllFace('nome');;
		$dados['facebook'] =$this->facebook_model->Formatar($facebook);

		$site = $this->site_model->GetAllSite('nome');;
		$dados['site'] =$this->site_model->Formatar($site);

		$mail = $this->mail_model->GetAllMail('nome');;
		$dados['mail'] =$this->mail_model->Formatar($mail);

		$this->load->view('home',$dados);
	}

	public function Cadastrar(){
		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('nome');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);
		// Chama a home enviando um array de dados a serem exibidos
		$this->load->view('CadCliente',$dados);
	}

	public function ListarCliente(){
		// Recupera os contatos através do model
		$facebook = $this->facebook_model->GetAll('nome');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->facebook_model->Formatar($facebook);
		// Chama a home enviando um array de dados a serem exibidos
		$this->load->view('ListarCliente',$dados);
	}

	// public function ListarClienteFace(){
	// 	// Recupera os contatos através do model
	// 	$contatos = $this->contatos_model->GetAll('nome');
	// 	// Passa os contatos para o array que será enviado à home
	// 	$dados['contatos'] =$this->contatos_model->Formatar($contatos);
	// 	// Chama a home enviando um array de dados a serem exibidos
	// 	$this->load->view('ListarCliente',$dados);
	// }

	/**
  * Processa o formulário para salvar os dados
  */
	public function Salvar(){

		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('nome');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();

		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Inserir($contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				//redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('CadCliente',$dados);

	}

	/**
  * Carrega a view para edição dos dados
  */
	public function Editar(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();

		// Recupera os dados do registro a ser editado
		$dados['contato'] = $this->contatos_model->GetById($id);

		// Carrega a view passando os dados do registro
		$this->load->view('editar',$dados);

	}

	/**
  * Processa o formulário para atualizar os dados
  */
	public function Atualizar(){

		// Realiza o processo de validação dos dados
		$validacao = self::Validar('update');

		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Atualiza os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Atualizar($contato['id'],$contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$dados['contato'] = $this->contatos_model->GetById($contato['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato atualizado com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}

		// Carrega a view para edição
		$this->load->view('editar',$dados);
	}

	/**
  * Realiza o processo de exclusão dos dados
  */
	public function Excluir(){
		// Recupera o ID do registro - através da URL - a ser editado
		$id = $this->uri->segment(2);
		// Se não foi passado um ID, então redireciona para a home
		if(is_null($id))
			redirect();

		// Remove o registro do banco de dados recuperando o status dessa operação 
		$status = $this->contatos_model->Excluir($id);

		// Checa o status da operação gravando a mensagem na seção
		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}
		// Redirecionao o usuário para a home
		redirect();
	}

	/**
  * Valida os dados do formulário
  *
  * @param string $operacao Operação realizada no formulário: insert ou update
  *
  * @return boolean
  */
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
			case 'update':
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				break;
			default:
				$rules['nome'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				break;
		}

		$this->form_validation->set_rules('nome', 'Nome', $rules['nome']);
		$this->form_validation->set_rules('email', 'Email', $rules['email']);

		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}


	public function Listar($p1) { 
		$sth = $p1->prepare("SELECT * FROM contatos ORDER BY id DESC"); 
		$sth->execute(); 	
		$count_fetchall = $sth->fetchAll(PDO::FETCH_ASSOC); 
		$retorno = array(); 
		foreach($count_fetchall as $w) { 
		$retorno[] = new Agenda($w['nome'], $w['telefone'], $w['nextel'], $w['email'], $w['id']); 
		} 
		return $retorno; 
	}

}
