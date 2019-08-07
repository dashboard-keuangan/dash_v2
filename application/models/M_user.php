<?php

class M_user extends CI_Model 
{
	private $table_name = 'user';
	public function get_user($username, $pwd) {
		return $this->db->get_where($this->table_name, array('username' => $username, 'password' => $pwd))->result_array();
	}
	public function get_user_by_id($id) {
		return $this->db->get_where($this->table_name, array('id' => $id))->result();
	}
	public function get_user_by_username($username, $pertanyaan, $jawaban){
		return $this->db->get_where($this->table_name, array('username' => $username, 'pertanyaan' => $pertanyaan, 'jawaban' => $jawaban))->result_array();
	}

	public function add_user($data) {
		return $this->db->insert($this->table_name, $data);
	}
	public function update_user($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update($this->table_name, $data);
	}
}