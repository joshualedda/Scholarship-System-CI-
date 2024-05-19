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

	public function getUser($userId)
	{
		$sql = "SELECT * FROM users 
		WHERE id = ?";
		
		$query = $this->db->query($sql, array($userId));
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return null;
		}
	}

	public function updateUser($data, $userId)
    {
        $this->db->where('id', $userId);
        $this->db->update('users', $data);

        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }

	// Login
	public function check_credentials($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            $user = $query->row_array();

            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }

        return false; 
    }
}
