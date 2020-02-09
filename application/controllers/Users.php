<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model', 'user', TRUE);
		// Retirar as tags das mensagens de erro do FormValidation
		$this->form_validation->set_error_delimiters('', '');
		
	}

	public function add() {

		$this->form_validation->set_rules('name',		'nome',		'required|min_length[6]|max_length[64]');
		$this->form_validation->set_rules('email',		'e-mail',	'required|min_length[6]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password',	'senha',	'required|min_length[6]|max_length[32]');

		if ($this->form_validation->run()){
			$data = (object) [
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'password'	=> md5(MD5_SALT.$this->input->post('password')),
			];
	
			$user = $this->user->add($data);
			
			// Realiza o Login do usuário após o cadastro
			$this->session->set_userdata('isLoggedIn', true);
			$this->session->set_userdata('user', $user);

			$success = TRUE;
			$response = $user;
		} else {
			// $this->output->set_status_header(400);
			$success = FALSE;
			$response = nl2br(validation_errors());
		}

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);

	}

	public function getOne() {

		$this->form_validation->set_rules('email',		'e-mail',	'required|min_length[6]|valid_email');
		$this->form_validation->set_rules('password',	'senha',	'required|min_length[6]|max_length[32]');

		if ($this->form_validation->run()){
			$data = (object) [
				'email' => $this->input->post('email'),
				'password' => md5(MD5_SALT.$this->input->post('password')),
			];
	
			$user = $this->user->getOne($data);

			if($user){
				$this->session->set_userdata('isLoggedIn', true);
				$this->session->set_userdata('user', $user);
				$success = TRUE;
				$response = $user;
			} else {
				$success = FALSE;
				$response = 'E-mail e/ou senha incorretos';
			}
		} else {
			$success = FALSE;
			$response = nl2br(validation_errors());
		}

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);

	}

}
