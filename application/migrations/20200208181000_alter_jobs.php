<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_jobs extends CI_Migration {

	public function up() {
		$fields = array(
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => 255,
				'after' => 'title'
			)
		); 
		$this->dbforge->add_column('jobs', $fields);
	}

	public function down() {
		$this->dbforge->drop_column('jobs', 'slug');
	}
}
