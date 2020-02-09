<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_favorites extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'auto_increment' => TRUE
			),
			'id_user' => array(
				'type' => 'INT',
			),
			'id_job' => array(
				'type' => 'INT',
			),
		));
		
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('favorites');
	}

	public function down() {
		$this->dbforge->drop_table('favorites');
	}
}
