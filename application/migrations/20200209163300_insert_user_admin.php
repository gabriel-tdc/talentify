<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_user_admin extends CI_Migration {

	public function up() {
        foreach ($this->seedData as $seed ) {
            $sql = 'INSERT INTO users (`name`, `email`, `password`, `access`) VALUES '.$seed;
            $this->db->query($sql);
        }
	}

	public function down() {
		$sql = "DELETE FROM users WHERE name = ´Administrador´ AND email = ´admin@admin.com´";
		$this->db->query($sql);
	}

	private $seedData = array(
        '("Administrador", "admin@admin.com", "8f066f82f56d1234feefb03b5f920aa3", 1)',
    );
}
