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
		$sql = "SELECT students.*, students.id AS studentId, courses.id AS courseId, courses.abbrevation AS courseName, campus.name AS campusName, campus.id AS campusId
				FROM students
				LEFT JOIN campus ON campus.id = students.campus_id
				LEFT JOIN courses ON courses.id = students.course_id";
		
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function getStudent($studentId)
	{
		$sql = "SELECT students.*, courses.id AS courseId, province.*, municipality.*, barangay.*, courses.name AS courseName
				FROM students
				LEFT JOIN province ON province.provCode = students.province_id
				LEFT JOIN municipality ON municipality.citymunCode = students.municipal_id
				LEFT JOIN barangay ON barangay.brgyCode = students.barangay_id
				LEFT JOIN courses ON courses.id = students.course_id
				WHERE students.id = ?";
	
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

	
public function insertTestData($table, $data) {
	// Insert data into the specified table
	$this->db->insert($table, $data);
}
	
	
}
