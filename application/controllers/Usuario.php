<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'controllers/Site.php';

class Usuario extends Site {
	
	public function painel() {

		// Se o usuário logado for um admin, redirecionar para o outro painel
		if($this->user->access){
			redirect('painel-administrador');
		}
		
		$this->load->library('curl');
		
		$favoriteJobs = $this->curl->exec(
			base_url('favorites/get'),
			array('id_user' => $this->user->id)
		);

		$data = array(
			'pageTitle' => 'Painel',
			'pageContent' => 'usuario/painel',
			'favoriteJobs' => $favoriteJobs->response
		);
		$this->load->view('site', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('');
	}

}
