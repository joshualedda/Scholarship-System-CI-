<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['totalGovScholar'] = $this->Scholarship->totalGovernmentScholarships();
		$data['totalPrivateScholar'] = $this->Scholarship->totalPrivateScholarships();

		$data['totalActiveGovScholar'] = $this->Scholarship->totalActiveGovernmentScholar();
		$data['totalActivePrivateScholar'] = $this->Scholarship->totalActivePrivateScholar();
		
		//
		$data['totalGovernmentStudent'] = $this->Scholarship->totalGovernmentStudent();
		$data['totalPrivateStudent'] = $this->Scholarship->totalPrivateStudent();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('partials/footer');
	}

	public function getCampusStudentData()
	{
		$scholarship_id = $this->input->get('scholarship_id');
		$school_year = $this->input->get('school_year');
	
		$data = $this->Scholarship->getCampusStudentCounts($scholarship_id, $school_year);
		echo json_encode($data);
	}
	
}
