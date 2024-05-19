<?php

class User extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function getUsers()
	{
		$sql = "SELECT users.*, users.id AS userId, users.name As nameUser, user_types.name AS userTypeName
				FROM users
				LEFT JOIN user_types ON users.type_id = user_types.id
				ORDER BY users.created_at DESC";
	
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function insert($data)
    {
        return $this->db->insert('users', $data);
    }

}
