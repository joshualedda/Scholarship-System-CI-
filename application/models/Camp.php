<?php

class Camp extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function getCampus()
	{
		$sql = "SELECT campus.id, campus.name, campus.description, campus.status
				FROM campus";
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	
	public function insertCampus($data) {
        $this->db->insert('scholarship', $data);
    }

	public function getSingleCampus($scholarId)
	{
		$sql = "SELECT * FROM campus 
		WHERE id = ?";
		
		$query = $this->db->query($sql, array($scholarId));
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return null;
		}
	}

	public function updateScholar($scholarId, $data)
	{
		$this->db->where('id', $scholarId);
		$this->db->update('scholarship', $data);
	}
	
	
}
