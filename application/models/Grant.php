<?php

class Grant extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function insertGrantee($data)
    {
        return $this->db->insert('grantees', $data);
    }
}
