<?php
class User_model extends CI_Model {

	public $id;
	public $name;
	public $email;
	public $password;
	public $access = 0;
	
	// Adicionar um usuário ao banco de dados
	public function add($data){
		$this->name = $data->name;
		$this->email = $data->email;
		$this->password = $data->password;
		
		$this->db->insert('users', $this);
		
		$this->id = $this->db->insert_id();

		$return = (object) [
			'id' => $this->db->insert_id(),
			'name' => $data->name,
			'email' => $data->email,
			'access' => 0,
		];

		return $return;
	}

	// Obter todos os usuários do banco de dados
	public function get(){
		$users = $this->db->get('users')->result();
		return $users;
	}

	// Buscar um usuário pelo email e senha (realizar login)
	public function getOne($data){
		$this->db->where('email', $data->email);
		$this->db->where('password', $data->password);
		$users = $this->db->get('users')->row();
		if(count($users) == 1){
			return $users;
		} else {
			return false;
		}
	}

}
