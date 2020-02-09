<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favorites extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->library('form_validation');
		$this->load->model('Favorite_model', 'favorite', TRUE);
		// Retirar as tags das mensagens de erro do FormValidation
		$this->form_validation->set_error_delimiters('', '');
	}

	public function toggle() {
		$this->form_validation->set_rules('id_user',	'id do usuário',	'required');
		$this->form_validation->set_rules('id_job',		'id do job',		'required');

		if ($this->form_validation->run()){
			$data = (object) [
				'id_user'	=> $this->input->post('id_user'),
				'id_job'	=> $this->input->post('id_job'),
			];
			
			$favorited = $this->favorite->toggle($data);		
			$success = TRUE;
			$response = ($favorited) ? 'Favoritado' : 'Favoritar';
		} else {
			$success = FALSE;
			$response = validation_errors();
		}
		
		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
		
	}

	public function isFavorited() {
		$this->form_validation->set_rules('id_user',	'id do usuário',	'required');
		$this->form_validation->set_rules('id_job',		'id do job',		'required');

		if ($this->form_validation->run()){
			$data = (object) [
				'id_user'	=> $this->input->post('id_user'),
				'id_job'	=> $this->input->post('id_job'),
			];
			
			$favorited = $this->favorite->isFavorited($data);		
			$success = TRUE;
			$response = $favorited;
		} else {
			$success = FALSE;
			$response = validation_errors();
		}
		
		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
		
	}

	public function get() {
		$this->form_validation->set_rules('id_user', 'id do usuário', 'required');

		if ($this->form_validation->run()){
			$id_user = $this->input->post('id_user');

			// if($this->userIsLoggedIn & $id_user == $this->user->id) {
				$data = (object) [
					'id_user' => $id_user,
				];
				
				$favorites = $this->favorite->get($data);		
				$success = TRUE;
				$response = $favorites;
			// } else {
			// 	$success = FALSE;
			// 	$response = 'Você só pode consultar os favoritos se estiver logado';
			// }

		} else {
			$success = FALSE;
			$response = validation_errors();
		}
		
		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
		
	}

}
