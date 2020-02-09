<?php
class Favorite_model extends CI_Model {

	public $id;
	public $id_user;
	public $id_job;
		
	// Favoritar a vaga do usuário
	// Retorna TRUE quando é favoritado, FALSE quando é desfavoritado
	public function toggle($data){

		$this->id_user = $data->id_user;
		$this->id_job = $data->id_job;

		$this->db->where('id_user', $this->id_user);
		$this->db->where('id_job', $this->id_job);
		$hasFavorito = $this->db->get('favorites')->row();

		if($hasFavorito) {
			$this->id = $hasFavorito->id;
			$this->db->where('id', $this->id);
			$this->db->delete('favorites');
			$return = FALSE;
		} else {
			$this->db->insert('favorites', $this);
			$return = TRUE;
		}

		return $return;
	}

	// Retorna TRUE quando já é favoritado
	public function isFavorited($data){

		$this->id_user = $data->id_user;
		$this->id_job = $data->id_job;

		$this->db->where('id_user', $this->id_user);
		$this->db->where('id_job', $this->id_job);
		$hasFavorito = $this->db->get('favorites')->row();

		return ($hasFavorito) ? TRUE : FALSE;
	}

	// Retorna todos jobs favoritados
	public function get($data){
		$this->id_user = $data->id_user;

		$this->db->where('id_user', $this->id_user);
		$this->db->join('jobs', 'jobs.id = favorites.id_job');
		$this->db->order_by('favorites.id', 'desc');
		$hasFavorito = $this->db->get('favorites')->result();

		return $hasFavorito;
	}


}
