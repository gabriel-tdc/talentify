<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function session() {
		$this->load->library('session');
		
		// $this->session->sess_destroy();
		// $this->session->set_userdata('isLoggedIn', true);
		
		var_dump($this->session->userdata());
	}

}
