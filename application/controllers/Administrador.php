<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Site.php';

class Administrador extends Site {	

	public function painel() {

		// Se o usuário logado não for um admin, redirecionar para o outro painel
		if(!$this->user->access){
			redirect('painel');
		}
		
		$this->load->library('curl');
		
		$jobs = $this->curl->exec(
			base_url('jobs/getAll')
		);

		$data = array(
			'pageTitle' => 'Painel Adminitrativo',
			'pageContent' => 'administrador/painel-admin',
			'jobs' => $jobs->response
		);
		$this->load->view('site', $data);
	}

	public function cadastrar_job() {

		// Se o usuário logado não for um admin, redirecionar para o outro painel
		if(!$this->user->access){
			redirect('painel');
		}
		
		$this->load->library('curl');
	
		$data = array(
			'pageTitle' => 'Cadastrar Vaga',
			'pageContent' => 'administrador/cadastrar-job'
		);
		$this->load->view('site', $data);
	}

	public function editar_job() {

		// Se o usuário logado não for um admin, redirecionar para o outro painel
		if(!$this->user->access){
			redirect('painel');
		}
		
		$this->load->library('curl');
				
		$job = $this->curl->exec(
			base_url('jobs/getOne/'.$this->uri->segment(3))
		);

		if(!$job->response){
			redirect('painel-administrador');
		}

		$data = array(
			'pageTitle' => 'Edição de Vaga',
			'pageContent' => 'administrador/editar-job',
			'job' => $job->response
		);
		$this->load->view('site', $data);
	}

	public function apagar_job() {

		// Se o usuário logado não for um admin, redirecionar para o outro painel
		if(!$this->user->access){
			redirect('painel');
		}
		
		$this->load->library('curl');
				
		$job = $this->curl->exec(
			base_url('jobs/delete/'),
			array('id' => $this->uri->segment(3))
		);

		redirect('painel-administrador');

	}

}
