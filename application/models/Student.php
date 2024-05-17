<?php

class Student extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function insert_student($data) {
        $this->db->insert('students', $data);
    }

	public function getStudents()
	{
		$sql = "SELECT students.id AS studentId, students.first_name, students.last_name, students.gender, students.status, students.campus_id
				FROM students";
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getStudent($studentId)
	{
		$sql = "SELECT * FROM students
				LEFT JOIN province
				ON province.provCode = students.province_id
				LEFT JOIN municipality 
				ON municipality.citymunCode = students.municipal_id
				LEFT JOIN barangay
				ON barangay.brgyCode = students.barangay_id
				WHERE id = ?";
		
		$query = $this->db->query($sql, array($studentId));
		
		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return null;
		}
	}
	

	public function updateStudent($studentId, $data)
{
    $this->db->where('id', $studentId);
    $this->db->update('students', $data);
}

	
	
	
	
}
