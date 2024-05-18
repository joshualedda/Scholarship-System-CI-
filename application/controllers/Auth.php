<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function login()
	{
		$this->load->view('partials/header');
		$this->load->view('admin/auth/login');
		$this->load->view('partials/footer');
	}
}
