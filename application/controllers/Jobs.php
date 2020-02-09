<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('text');
		$this->load->library('form_validation');
		$this->load->model('Job_model', 'job', TRUE);
		// Retirar as tags das mensagens de erro do FormValidation
		$this->form_validation->set_error_delimiters('', '');
	}

	public function add() {

		$this->form_validation->set_rules('title',			'título',		'required|min_length[6]|max_length[256]');
		$this->form_validation->set_rules('description',	'descrição',	'required|min_length[6]|max_length[10000]');
		$this->form_validation->set_rules('status',			'status',		'required');

		if ($this->form_validation->run()){
			$data = (object) [
				'title'			=> $this->input->post('title'),
				'slug'			=> url_title(rand(10000,99999).'-'.convert_accented_characters($this->input->post('title')), '-', TRUE),
				'description'	=> $this->input->post('description'),
				'status'		=> $this->input->post('status'),
				'workplace'		=> $this->input->post('workplace'),
				'salary'		=> str_replace(',', '', $this->input->post('salary')),
			];
	
			$job = $this->job->add($data);
			$success = TRUE;
			$response = $job;
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

	public function edit() {

		$this->form_validation->set_rules('id',				'id',			'required');
		$this->form_validation->set_rules('title',			'título',		'required|min_length[6]|max_length[256]');
		$this->form_validation->set_rules('description',	'descrição',	'required|min_length[6]|max_length[10000]');
		$this->form_validation->set_rules('status',			'status',		'required');

		if ($this->form_validation->run()){
			$id = $this->input->post('id');
			
			$data = (object) [
				'title'			=> $this->input->post('title'),
				'description'	=> $this->input->post('description'),
				'status'		=> $this->input->post('status'),
				'workplace'		=> $this->input->post('workplace'),
				'salary'		=> str_replace(',', '', $this->input->post('salary')),
			];
			
			// Trocar o Slug somente se o titulo for alterado
			if($this->input->post('title') != $this->input->post('title_old')){
				$data->slug = url_title(rand(10000,99999).'-'.convert_accented_characters($this->input->post('title')), '-', TRUE);
			}
			
			$job = $this->job->edit($id, $data);
			$success = TRUE;
			$response = $job;
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

	public function get() {
		$search = $this->input->post('search');

		$jobs = $this->job->get($search);
		$success = TRUE;
		$response = $jobs;

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
	}

	public function getAll() {

		$jobs = $this->job->getAll();
		$success = TRUE;
		$response = $jobs;

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
	}

	public function getOne() {
		$job = $this->job->getOne($this->uri->segment(3));
		$success = TRUE;
		$response = $job;

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);
	}

	public function delete() {

		$id = $this->input->post('id');
		
		$this->job->delete($id);
		$success = TRUE;
		$response = 'Vaga deletada com sucesso';

		echo json_encode(
			array(
				'status' => $success,
				'response' => $response
			)
		);

	}

}
