<?php

class Student extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function insert_student($data)
	{
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


	public function insertTestData($student_data)
	{
		// Insert student_data into the specified table
		$this->db->insert('studentss', $student_data);
	}


	// Report Generate Function
	public function getStudentsReport($province_id, $municipal_id, $barangay_id, $campus_id, $course_id, $semester, $school_year, $type2, $scholarship_id2)
{
    $sql = "SELECT students.*, grantees.*, 
                   province.provDesc AS province_name, 
                   municipality.citymunDesc AS municipal_name, 
                   barangay.brgyDesc AS barangay_name,
                   campus.name AS campus_name, 
                   courses.name AS course_name
            FROM grantees
            LEFT JOIN students ON students.id = grantees.student_id
            LEFT JOIN campus ON campus.id = students.campus_id
            LEFT JOIN courses ON courses.id = students.course_id
            LEFT JOIN province ON students.province_id = province.provCode
            LEFT JOIN municipality ON students.municipal_id = municipality.citymunCode
            LEFT JOIN barangay ON students.barangay_id = barangay.brgyCode
            WHERE 1 = 1";

    // Add conditions based on the provided parameters
    $bindings = [];
    
    if ($province_id) {
        $sql .= " AND students.province_id = ?";
        $bindings[] = $province_id;
    }
    if ($municipal_id) {
        $sql .= " AND students.municipal_id = ?";
        $bindings[] = $municipal_id;
    }
    if ($barangay_id) {
        $sql .= " AND students.barangay_id = ?";
        $bindings[] = $barangay_id;
    }
    if ($campus_id) {
        $sql .= " AND students.campus_id = ?";
        $bindings[] = $campus_id;
    }
    if ($course_id) {
        $sql .= " AND students.course_id = ?";
        $bindings[] = $course_id;
    }
    if ($semester) {
        $sql .= " AND grantees.semester = ?";
        $bindings[] = $semester;
    }
    if ($school_year) {
        $sql .= " AND grantees.school_year = ?";
        $bindings[] = $school_year;
    }
    if ($scholarship_id2) {
        $sql .= " AND grantees.scholarship_id = ?";
        $bindings[] = $scholarship_id2;
    }

    // Execute the query with bindings
    $query = $this->db->query($sql, $bindings);

    // Check if the query was successful
    if ($query) {
        return $query->result_array(); // Return the result set
    } else {
        return false; // Return false if there was an error
    }
}

	
}
