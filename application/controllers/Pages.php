<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Monitoring');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dahsboard_header');
        $this->load->view('templates/sidebar');
        $this->load->view('utils/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function tables()
    {
        $this->load->view('templates/dahsboard_header');
        $this->load->view('templates/sidebar');
        $this->load->view('utils/tables');
        $this->load->view('templates/dashboard_footer');
    }
}
