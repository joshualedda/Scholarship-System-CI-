<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{

	public function index()
	{
		$data['courses'] = $this->Course->getCourses();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/courses/index', $data);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/courses/create');
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$data = array(
			'campus_id' => $this->input->post('campus_id'),
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'),
		);

		$this->Course->insertCourse($data);

		// Set flashdata message
		$this->session->set_flashdata('success', 'Course Saved Successfully.');

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function show($courseId)
	{
		$data['courses'] = $this->Course->getCourse($courseId);

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/courses/show', $data);
		$this->load->view('partials/footer');
	}
	public function edit($courseId)
	{
		$data['courses'] = $this->Course->getCourse($courseId);

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/courses/edit', $data);
		$this->load->view('partials/footer');
	}

	public function update($courseId)
	{
		$data = array(
			'campus_id' => $this->input->post('campus_id'),
			'name' => $this->input->post('name'),
			'status' => $this->input->post('status'),
		);

		$this->Course->updateCourse($courseId, $data);
	
		$this->session->set_flashdata('success', 'Course data updated successfully.');
	
		redirect($_SERVER['HTTP_REFERER']);

	}

}