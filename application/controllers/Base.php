<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function index()
	{

		$this->load->library('session');

		$data['errors'] = '';
		$data['mensagem'] = '';

		if(isset($_COOKIE['cadastro'])) {
			$data['mensagem'] = filter_input(INPUT_COOKIE,'cadastro',FILTER_SANITIZE_STRING);
			setcookie('cadastro');
		}

		$this->load->library('form_validation');

		$this->form_validation->set_rules("nome","Nome","required|trim|min_length[3]");
		$this->form_validation->set_rules("email","Email","required|trim|valid_email");
		$this->form_validation->set_rules("idade","Idade","required|is_natural_no_zero",array('is_natural_no_zero'=>'Somente números naturais no campo idade.'));

		if($this->form_validation->run() == false) {
			$data['errors'] = validation_errors(); //erros encontrados no formulário
		}else {
			$this->load->model('Model_cadastro','Cadastro');

			$dados = $this->input->post(); //dados do post enviados

			$resultado = $this->Cadastro->Save($dados);

			if($resultado) {

				setcookie('cadastro','Cadastrou com sucesso');

				$this->session->set_userdata('sucess',"Seus dados foram enviados");
				redirect();
				//$_SESSION['sucess'] = "Seus dados foram enviados";

				//header('Location:'.base_url());
				//exit;
			}else {
				$data['errors'] = "Não foi possível salvar o seu contato";
			}
			
		}
		$this->load->view('home',$data);
	}
}
