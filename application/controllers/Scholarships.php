<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scholarships extends CI_Controller
{

	public function index()
	{
		$data['scholarships'] = $this->Scholarship->getScholarships();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/scholar/index', $data);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/scholar/create');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'type' => $this->input->post('type'),
		);

		$this->Scholarship->insertScholarship($data);

		// Set flashdata message
		$this->session->set_flashdata('success', 'Scholarship saved successfully.');

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function show($scholarId)
	{
		$data['scholar'] = $this->Scholarship->getScholar($scholarId);

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/scholar/show', $data);
		$this->load->view('partials/footer');
	}
	public function edit($scholarId)
	{
		$data['scholar'] = $this->Scholarship->getScholar($scholarId);

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/scholar/edit', $data);
		$this->load->view('partials/footer');
	}

	public function update($scholarId)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'type' => $this->input->post('type'),
		);

		$this->Scholarship->updateScholar($scholarId, $data);
	
		$this->session->set_flashdata('success', 'Scholar data updated successfully.');
	
		redirect($_SERVER['HTTP_REFERER']);

	}

}
