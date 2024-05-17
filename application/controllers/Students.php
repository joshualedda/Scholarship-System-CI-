<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Students extends CI_Controller
{

	public function index()
	{
		$data['students'] = $this->Student->getStudents();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/student/index', $data);
		$this->load->view('partials/footer');
	}

	public function edit($studentId)
	{
		$data['student'] = $this->Student->getStudent($studentId);
		$data = $this->address($data);


		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/student/edit', $data);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$data = array(); 
		$data = $this->address($data); 
	
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/student/create', $data);
		$this->load->view('partials/footer');
	}
	
	public function show($studentId)
	{

		$data['student'] = $this->Student->getStudent($studentId);
		$data['provinces'] = $this->Address->getProvince(); 

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/student/show', $data);
		$this->load->view('partials/footer');
	}



	public function store()
	{

		$data = array(
			'student_id' => $this->input->post('student_id'),
			'campus_id' => $this->input->post('campus_id'),
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'province_id' => $this->input->post('province_id'),
			'municipal_id' => $this->input->post('municipal_id'),
			'barangay_id' => $this->input->post('barangay_id'),
			'year_level' => $this->input->post('year_level'),
			'course_id' => $this->input->post('course_id'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
		);
		$this->Student->insert_student($data);

		redirect('students');
	}


	public function update($studentId)
	{
		$data = array(
			'student_id' => $this->input->post('student_id'),
			'campus_id' => $this->input->post('campus_id'),
			'first_name' => $this->input->post('first_name'),
			'middle_name' => $this->input->post('middle_name'),
			'last_name' => $this->input->post('last_name'),
			'gender' => $this->input->post('gender'),
			'civil_status' => $this->input->post('civil_status'),
			'email' => $this->input->post('email'),
			'contact' => $this->input->post('contact'),
			'province_id' => $this->input->post('province_id'),
			'municipal_id' => $this->input->post('municipal_id'),
			'barangay_id' => $this->input->post('barangay_id'),
			'year_level' => $this->input->post('year_level'),
			'course_id' => $this->input->post('course_id'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
		);
	
		$this->Student->updateStudent($studentId, $data);
	
		$this->session->set_flashdata('success', 'Student data updated successfully.');
	
		redirect('admin/student/edit/' . $studentId, 'refresh');

	}
	public function address($data)
	{
		$data['provinces'] = $this->Address->getProvince(); 
		return $data; 
	}

	public function getMunicipalities()
	{
		$province_id = $this->input->post('province_id');
		$municipalities = $this->Address->getMunicipalityByProvince($province_id);
		$options = "<option selected value=''>Choose from below</option>";
		foreach ($municipalities as $municipality) {
			$options .= "<option value='".$municipality['citymunCode']."'>".$municipality['citymunDesc']."</option>";
		}
		echo $options;
	}

	public function getBarangays()
	{
		$municipal_id = $this->input->post('municipal_id');
		$barangays = $this->Address->getBarangayByMunicipality($municipal_id);
		$options = "<option selected value=''>Choose from below</option>";
		foreach ($barangays as $barangay) {
			$options .= "<option value='".$barangay['brgyCode']."'>".$barangay['brgyDesc']."</option>";
		}
		echo $options;
	}
	

}
