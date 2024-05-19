<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Reports extends CI_Controller
{

	public function index()
	{
		$data = array();
		$data = $this->address($data);

		$data['campus'] = $this->Camp->getActiveCampus();
		$data['courses'] = $this->Course->getActiveCourses();

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/report/index', $data);
		$this->load->view('partials/footer');
	}

	public function address($data)
	{
		$data['provinces'] = $this->Address->getProvince();
		return $data;
	}
	
	public function generateReport()
{

    // Retrieve form data
    $province_id = $this->input->post('province_id');
    $municipal_id = $this->input->post('municipal_id');
    $barangay_id = $this->input->post('barangay_id');
    $campus_id = $this->input->post('campus_id');
    $course_id = $this->input->post('course_id');
    $semester = $this->input->post('semester');
    $school_year = $this->input->post('school_year');
    $type2 = $this->input->post('type2');
    $scholarship_id2 = $this->input->post('scholarship_id2');

    // Query database to fetch student records based on form data
    $students = $this->Student->getStudentsReport($province_id, $municipal_id, $barangay_id, $campus_id, $course_id, $semester, $school_year, $type2, $scholarship_id2);

    // Create new Spreadsheet object
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Add headers to the Excel sheet
    $sheet->setCellValue('A1', 'Student ID');
    $sheet->setCellValue('B1', 'First Name');
    $sheet->setCellValue('C1', 'Last Name');
    // Add more headers as needed

    // Populate Excel sheet with student records
    $row = 2; // Start from second row
    foreach ($students as $student) {
        $sheet->setCellValue('A' . $row, $student['student_id']);
        $sheet->setCellValue('B' . $row, $student['first_name']);
        $sheet->setCellValue('B' . $row, $student['middle_name']);
        $sheet->setCellValue('C' . $row, $student['last_name']);
        // Populate more columns with student data
        $row++;
    }

    // Set headers for Excel file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="student_report.xlsx"');
    header('Cache-Control: max-age=0');

    // Save Excel file to output
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
}

}
