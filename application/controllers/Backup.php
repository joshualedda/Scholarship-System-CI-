<?php

use Config\Database;
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

	public function index()
	{
		$this->load->view('partials/header');
		$this->load->view('partials/admin/navbar');
		$this->load->view('partials/admin/sidebar');
		$this->load->view('admin/backup/index');
		$this->load->view('partials/footer');
	}
	
	public function backupData()
	{
		// Load the database utility library
		$this->load->dbutil();
	
		// Get all tables in the database
		$tables = $this->db->list_tables();
	
		// Initialize an empty SQL string
		$sql = '';
	
		// Loop through each table and append its backup to the SQL string
		foreach ($tables as $table) {
			$sql .= $this->dbutil->backup(['tables' => [$table]]);
			$sql .= "\n\n"; // Add newline between table backups
		}
	
		// Convert the SQL content to plain text
		$sql = htmlspecialchars_decode($sql);
	
		// Set headers to force download the backup file
		$this->load->helper('download');
		force_download('backup.sql', $sql);
	}
	
	
	
	
	
}

