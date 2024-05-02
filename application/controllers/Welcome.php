<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('utils/monitoring');
	}

	public function chart_data()
	{
		$data = $this->chart_model->chart_database();
		echo json_encode($data);
	}
}
