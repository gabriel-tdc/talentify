<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_jobs extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'auto_increment' => TRUE
			),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
			),
			'description' => array(
				'type' => 'VARCHAR',
				'constraint' => '10000',
			),
			'status' => array(
				'type' => 'INT',
				'constraint' => '32',
			),
			'workplace' => array(
				'type' => 'VARCHAR',
				'constraint' => '256',
                'null' => TRUE,
			),
			'salary' => array(
				'type' => 'FLOAT',
				'constraint' => '32',
                'null' => TRUE,
			),
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('jobs');
	}

	public function down() {
		$this->dbforge->drop_table('jobs');
	}
}
