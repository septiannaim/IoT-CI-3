<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Monitoring extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Monitoring');
    }

    public function suhu()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan ceksuhu
        $this->load->view('cekdata/suhu', $data);
    }

    public function ceksuhu()
    {
        $data = $this->M_Monitoring->getDataSensor();
        $result = [
            'data' => $data->suhu
        ];
        echo json_encode($result);
    }


    public function getDataSuhu()
    {
        // Panggil method pada model untuk mengambil data dari database
        $data = $this->M_Monitoring->getDataSuhu();

        // Mengembalikan data dalam format JSON
        $result = [
            'data' => $data
        ];
        echo json_encode($result);
    }


    public function kelembaban()
    {
        $data = $this->M_Monitoring->getDataSensor();
        $result = [
            'data' => $data->kelembaban
        ];
        echo json_encode($result);
    }


    public function cekkelembaban()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensor();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan cekkelembaban
        $this->load->view('cekdata/cekkelembaban', $data);
    }


    public function jarak()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensorJarak();
        $result = [
            'data' => $recordSensor->nilai
        ];
        echo json_encode($result);
    }

    public function cekjarak()
    {
        //panggil function get data sensor
        $recordSensor = $this->M_Monitoring->getDataSensorJarak();
        $data = array('data_sensor' => $recordSensor);

        //kirim data ke tampilan cekjarak
        $this->load->view('cekdata/cekjarak', $data);
    }

    public function getDataJarak()
    {
        // Panggil method pada model untuk mengambil data dari database
        $data = $this->M_Monitoring->getDataJarak();

        // Mengembalikan data dalam format JSON
        $result = [
            'data' => $data
        ];
        echo json_encode($result);
    }
}
