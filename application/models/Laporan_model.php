<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Laporan_model extends CI_Model
{
    public function get_Laporan($id_user, $bulan, $tahun)
    {
        $this->db->where('id_user', $id_user);
        $this->db->where("DATE_FORMAT(tanggal, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tanggal, '%Y') = ", $tahun);
        // $this->db->group_by("tanggal");
        $this->db->order_by("tanggal", "asc");
        $result = $this->db->get('laporan');
        return $result->result_array();
    }

    public function all_Laporan($angka, $bulan, $tahun)
    {
        $this->db->join('users', 'laporan.id_user = users.id_user');
        $this->db->where("DATE_FORMAT(tanggal, '%d') = ", $angka);
        $this->db->where("DATE_FORMAT(tanggal, '%m') = ", $bulan);
        $this->db->where("DATE_FORMAT(tanggal, '%Y') = ", $tahun);
        $this->db->order_by("tanggal", "asc");
        $result = $this->db->get('laporan');
        return $result->result_array();
    }

    public function find($id)
    {
        $this->db->join('users', 'laporan.id_user = users.id_user');
        $this->db->where('id_laporan', $id);
        $result = $this->db->get('laporan');
        return $result->row();
    }

    public function laporan_harian_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $data = $this->db->get('laporan');
        return $data;
    }

    public function insert_data($data)
    {
        $result = $this->db->insert('laporan', $data);
        return $result;
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_laporan', $id);
        $result = $this->db->update('laporan', $data);
        return $result;
    }

    public function delete_data($id)
    {
        $this->db->where('id_laporan', $id);
        $result = $this->db->delete('laporan');
        return $result;
    }
}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\models\Karyawan_model.php */