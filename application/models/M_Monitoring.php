<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Monitoring extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function getDataSensor()
    {
        $this->db->select('*');
        $this->db->from('tb_suhu');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function getDataSensorJarak()
    {
        $this->db->select('*');
        $this->db->from('tb_jarak');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function getDataJarak()
    {
        // Query untuk mengambil data dari database
        $query = $this->db->get('tb_jarak');
        // Mengembalikan hasil query dalam bentuk array
        return $query->result_array();
    }


    public function getDataSuhu()
    {
        // Assuming 'sensor_data' is the name of your database table
        $query = $this->db->get('tb_suhu');
        return $query->result_array(); // Return the result as an array of objects
    }


    public function simpan_data($suhu, $kelembaban)
    {
        $data = array(
            'suhu' => $suhu,
            'kelembaban' => $kelembaban
        );
        return $this->db->insert('tb_suhu', $data);
    }

    public function simpanjarak($nilai)
    {
        $data = array(
            'nilai' => $nilai
        );
        return $this->db->insert('tb_jarak', $data);
    }

    public function get_last_5_suhu()
    {
        $this->db->select('id,suhu, kelembaban, tgl');
        $this->db->order_by('tgl', 'DESC');
        $this->db->limit(5);
        return $this->db->get('tb_suhu')->result();
    }

    public function get_last_5_jarak()
    {
        $this->db->select('id,nilai, tgl');
        $this->db->order_by('tgl', 'DESC');
        $this->db->limit(5);
        return $this->db->get('tb_jarak')->result();
    }
}
