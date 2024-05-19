<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function index()
	{
		$data['users'] = $this->User->getUsers();

		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/users/index', $data);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$data['campus'] = $this->Camp->getActiveCampus();
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/users/create', $data);
		$this->load->view('partials/footer');
	}
	public function show($userId)
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/users/show');
		$this->load->view('partials/footer');
	}
	public function edit()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/users/edit');
		$this->load->view('partials/footer');
	}

	public function store()
    {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('user_type', 'User Type', 'required');
        $this->form_validation->set_rules('campus_id', 'Campus', 'nullable');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
    		$this->create();
        } else {
            // Validation successful, process the data
            $data = [
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'type_id' => $this->input->post('user_type'),
                'campus_id' => $this->input->post('campus_id'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ];

			if ($this->User->insert($data)) {
                // Successfully inserted, redirect or show success message
                $this->session->set_flashdata('success', 'User added successfully.');
				redirect($_SERVER['HTTP_REFERER']);

            } else {
                // Failed to insert, show error message
                $this->session->set_flashdata('error', 'Failed to add user. Please try again.');
				redirect($_SERVER['HTTP_REFERER']);

            }

            
        }
    }
}
