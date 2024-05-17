<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Campus extends CI_Controller
{

	public function index()
	{
		$data['campus'] = $this->Camp->getCampus();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/campus/index', $data);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/campus/create');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'type' => $this->input->post('type'),
		);

		$this->Camp->insertCampus($data);

		// Set flashdata message
		$this->session->set_flashdata('success', 'Campus saved successfully.');

		redirect($_SERVER['HTTP_REFERER']);
	}


	public function show($campusId)
	{
		$data['campus'] = $this->Camp->getSingleCampus($campusId);
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/campus/show', $data);
		$this->load->view('partials/footer');
	}


	public function edit($campusId)
	{
		$data['campus'] = $this->Camp->getCampus($campusId);

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/campus/edit', $data);
		$this->load->view('partials/footer');
	}

	public function update($campusId)
	{
		$data = array(
			'name' => $this->input->post('name'),
			'type' => $this->input->post('type'),
		);

		$this->Camp->updateCampus($campusId, $data);
	
		$this->session->set_flashdata('success', 'Scholar data updated successfully.');
	
		redirect($_SERVER['HTTP_REFERER']);

	}

}
