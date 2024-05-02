<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Monitoring');
    }

    public function ceksuhu()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan ceksuhu
        $this->load->view('cekdata/ceksuhu', $data);
    }

    public function cekkelembaban()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan cekkelembaban
        $this->load->view('cekdata/cekkelembaban', $data);
    }

    public function cekjarak()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensorJarak();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan cekjarak
        $this->load->view('cekdata/cekjarak', $data);
    }

    public function data_suhu()
    {
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan ceksuhu
        $this->load->vars($data);
    }

    public function getDataJarak()
    {
        // Panggil method pada model untuk mengambil data dari database
        $data = $this->M_Monitoring->getDataJarak();
        $this->load->view('utils/monitoring');
        // Mengembalikan data dalam format JSON
        echo json_encode($data);
    }
}
