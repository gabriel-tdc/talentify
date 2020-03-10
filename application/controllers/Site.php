<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->userIsLoggedIn = $this->session->userdata('isLoggedIn');
		if(!$this->session->userdata('user')){
			$this->user = (object) [
				'access' => NULL
			];
		} else {
			$this->user = $this->session->userdata('user');
		}
	}

	public function index() {
		$this->load->library('Curl');

		$jobs = $this->Curl->exec(
			base_url('jobs/get')
		);

		if($jobs->status){
			$vagas = count($jobs->response);
		} else {
			show_404();
		}

		$data = array(
			'pageTitle' => 'Home',
			'pageContent' => 'home',
			'vagas' => $vagas,
		);
		$this->load->view('site', $data);
	}

	public function vagas() {
		$this->load->helper('text');
		$this->load->library('Curl'); 
		
		$search = $this->input->post('search');

		$jobs = $this->Curl->exec(
			base_url('jobs/get'),
			array('search' => $search)
		);

		if($jobs->status){
			$jobs = $jobs->response;
		} else {
			show_404();
		}

		$data = array(
			'pageTitle' => 'Vagas',
			'pageContent' => 'vagas',
			'jobs' => $jobs,
		);
		$this->load->view('site', $data);
	}

	public function vaga() {
		$this->load->library('curl');

		$job = $this->curl->exec(
			base_url('jobs/getOne/'.$this->uri->segment(2))
		);

		if($job->status){
			$job = $job->response;
		} else {
			show_404();
		}
		
		// Se for um job desativado e o usuário não for administrador
		if(!$job->status && !$this->user->access){
			show_404();
		}

		$isFavorited = (!$this->userIsLoggedIn) ? FALSE :
			$this->curl->exec(
				base_url('favorites/isFavorited'),
				array(
					'id_user' => $this->user->id,
					'id_job' => $job->id,
				)
			);	

		$data = array(
			'pageTitle' => 'Vaga ' . $job->title,
			'pageContent' => 'vaga',
			'job' => $job,
			'isFavorited' => ($isFavorited) ? $isFavorited->response : NULL,
		);
		$this->load->view('site', $data);
	}

	public function sobre() {
		$data = array(
			'pageTitle' => 'Sobre',
			'pageContent' => 'sobre'
		);
		$this->load->view('site', $data);
	}

	public function login() {
		// Verificar se o usuário está logado, se estiver, direcionar para Painel
		if($this->userIsLoggedIn){
			redirect('painel');
		}

		$data = array(
			'pageTitle' => 'Login',
			'pageContent' => 'login'
		);
		$this->load->view('site', $data);
	}
	
	public function cadastrar() {
		// Verificar se o usuário está logado, se estiver, direcionar para Painel
		if($this->userIsLoggedIn){
			redirect('painel');
		}

		$data = array(
			'pageTitle' => 'Cadastrar',
			'pageContent' => 'cadastrar'
		);
		$this->load->view('site', $data);
	}

}
