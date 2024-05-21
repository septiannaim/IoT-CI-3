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
        $data['suhu_kelembaban'] = $this->M_Monitoring->get_last_5_suhu();
        $data['sensor_jarak'] = $this->M_Monitoring->get_last_5_jarak();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/sidebar');
        $this->load->view('utils/index', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function tables()
    {
        $data['suhu_kelembaban'] = $this->M_Monitoring->get_last_5_suhu();
        $data['sensor_jarak'] = $this->M_Monitoring->get_last_5_jarak();
        $this->load->view('templates/dashboard_header');
        $this->load->view('templates/sidebar');
        $this->load->view('utils/tables', $data);
        $this->load->view('templates/dashboard_footer');
    }
}
