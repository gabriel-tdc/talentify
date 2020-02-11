<?php
class Job_model extends CI_Model {

	public $id;
	public $title;
	public $slug;
	public $description;
	public $status;
	public $workplace;
	public $salary;
	
	// Adicionar um usuário ao banco de dados
	public function add($data){
		$this->title		= $data->title;
		$this->slug		= $data->slug;
		$this->description	= $data->description;
		$this->status		= $data->status;
		$this->workplace	= $data->workplace;
		$this->salary		= $data->salary;
		
		$this->db->insert('jobs', $this);
		
		$this->id = $this->db->insert_id();

		return $this;
	}
	
	// Editar os dados de um Job
	public function edit($id, $data){
		$this->db->where('id', $id);
		$this->db->update('jobs', $data);

		return $this;
	}

	// Obter os jobs ativos do banco de dados
	public function get($search = NULL){
		if($search){
			$this->db->or_like('title', $search);
			$this->db->or_like('description', $search);
			$this->db->or_like('workplace', $search);
			$this->db->or_like('salary', $search);
		}
		$this->db->where('status', 1);
		$this->db->order_by('id', 'desc');
		$jobs = $this->db->get('jobs')->result();
		return $jobs;
	}

	// Obter todos os jobs do banco de dados
	public function getAll(){
		$this->db->order_by('id', 'desc');
		$jobs = $this->db->get('jobs')->result();
		return $jobs;
	}

	// Buscar um job pelo slug (URL)
	public function getOne($slug){
		$this->db->where('slug', $slug);
		$job = $this->db->get('jobs')->row();
		return $job;
	}

	// Deletar o Job
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('jobs');
		return true;
	}


}
