<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class Imports extends CI_Controller {

    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('partials/admin/navbar');
        $this->load->view('partials/admin/sidebar');
        $this->load->view('admin/import/index');
        $this->load->view('partials/footer');
    }

	public function ImportStudent()
	{
		// Check if the form is submitted
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Check if a file is selected
			if (isset($_FILES["data_upload"]) && $_FILES["data_upload"]["error"] == UPLOAD_ERR_OK) {
				// Get the temporary file name
				$file_tmp = $_FILES["data_upload"]["tmp_name"];
				
				// Load the CSV file using PhpSpreadsheet
				$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file_tmp);
				
				// Get the first worksheet
				$worksheet = $spreadsheet->getActiveSheet();
				
				// Iterate through rows starting from the second row (assuming the first row contains headers)
				foreach ($worksheet->getRowIterator(2) as $row) {
					// Get the cell values
					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if some are empty
					
					// Initialize variables to hold data
					$data = [];
					
					// Iterate through cells
					foreach ($cellIterator as $cell) {
						$data[] = $cell->getValue();
					}
					
					// Insert data into the students table
					$student_data = [
						'first_name' => $data[0], // Assuming first name is in the first column
						'middle_name' => $data[1], // Assuming middle name is in the second column
						'last_name' => $data[2], // Assuming last name is in the third column
					];
					
					// Insert data into the students table
					$this->Student->insertTestData('studentss', $student_data);
				}
				
				// Redirect to a success page or display a success message
				redirect('dashboard');
			} else {
				// Handle file upload errors
				// Redirect back to the import page with an error message
				redirect('imports?error=file_upload_failed');
			}
		} else {
			// Redirect back to the import page
			redirect('imports');
		}
	}
	
}
