<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_users extends CI_Migration {

	public function up() {
		$fields = array(
			'access' => array(
				'type' => 'INT',
				'default' => 0
			)
		); 
		$this->dbforge->add_column('users', $fields);
	}

	public function down() {
		$this->dbforge->drop_column('users', 'access');
	}
}
