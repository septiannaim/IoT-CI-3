<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kirimdata extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Monitoring');
    }


    public function kirimdata()
    {
        $suhu = $this->input->get('suhu');
        $kelembaban = $this->input->get('kelembaban');

        // Memeriksa apakah nilai suhu dan kelembaban tidak NULL sebelum menyimpan ke database
        if ($suhu !== null && $kelembaban !== null) {

            $this->M_Monitoring->simpan_data($suhu, $kelembaban);

            $response = array(
                'message' => 'Data suhu dan kelembaban berhasil disimpan'
            );
        } else {
            $response = array(
                'message' => 'Gagal menyimpan data suhu dan kelembaban: Nilai tidak valid'
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function api_jarak()
    {
        $nilai = $this->input->get('nilai');

        // Memeriksa apakah nilai tidak NULL sebelum menyimpan ke database
        if ($nilai !== null) {

            $this->M_Monitoring->simpanjarak($nilai);

            $response = array(
                'message' => 'Data ultrasonik berhasil disimpan'
            );
        } else {
            $response = array(
                'message' => 'Gagal menyimpan data ultrasonik: Nilai tidak valid'
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
