<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Monitoring extends CI_Model
{
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
}
