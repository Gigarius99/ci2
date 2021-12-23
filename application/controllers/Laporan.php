<?php
defined('BASEPATH') OR die('No direct script access allowed!');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Laporan_model', 'laporan');
        $this->load->model('Karyawan_model', 'karyawan');
        $this->load->helper('tgl');
    }

    public function index()
    {
        if (is_level('Karyawan')) {
            return $this->detail_laporan();
        } else {
            return $this->list_karyawan();
        }
    }

    public function all_laporan()
    {
        $data = $this->detail_data_laporan_all();
        return $this->template->load('template', 'laporan/laporan_all', $data);
    }

    public function list_karyawan()
    {
        $data['karyawan'] = $this->karyawan->get_all();
        return $this->template->load('template', 'laporan/list_karyawan', $data);
    }

    public function detail_laporan()
    {
        $data = $this->detail_data_laporan();
        return $this->template->load('template', 'laporan/detail', $data);
    }

    public function detail_laporan_user()
    {
        $id_user = $this->uri->segment(3);
        $data['laporan'] = $this->laporan->find($id_user);
        return $this->template->load('template', 'laporan/detail_laporan_user', $data);
    }

    public function check_laporan()
    {
        $data['lapor'] = $this->laporan->laporan_harian_user($this->session->id_user)->num_rows();
        return $this->template->load('template', 'laporan/create', $data);
    }

    public function lapor()
    {
        $post = $this->input->post();
        $data = [
            'tanggal' => $post['tanggal'],
            'waktu' => $post['waktu'],
            'tempat' => $post['tempat'],
            'kegiatan' => $post['kegiatan'],
            'deskripsi' => $post['deskripsi'],
            'id_user' => $this->session->id_user
        ];

        $result = $this->laporan->insert_data($data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data laporan telah ditambahkan!'
            ];
            $redirect = 'laporan/detail_laporan';
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data laporan gagal ditambahkan'
            ];
            $redirect = 'laporan/create';
        }
        
        $this->session->set_flashdata('response', $response);
        redirect($redirect);

    }

    public function edit()
    {
        $id_user = $this->uri->segment(3);
        $data['laporan'] = $this->laporan->find($id_user);
        return $this->template->load('template', 'laporan/edit', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data = [
            'id_laporan' => $post['id_laporan'],
            'tanggal' => $post['tanggal'],
            'waktu' => $post['waktu'],
            'tempat' => $post['tempat'],
            'kegiatan' => $post['kegiatan'],
            'deskripsi' => $post['deskripsi'],
        ];


        $result = $this->laporan->update_data($post['id_laporan'], $data);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Laporan berhasil diubah!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Laporan gagal diubah!'
            ];
        }
        
        $this->session->set_flashdata('response', $response);
        redirect('laporan/detail_laporan');
    }

    public function destroy()
    {
        $id_user = $this->uri->segment(3);
        $result = $this->laporan->delete_data($id_user);
        if ($result) {
            $response = [
                'status' => 'success',
                'message' => 'Data Laporan berhasil dihapus!'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Laporan gagal dihapus!'
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function export_pdf()
    {
        $this->load->library('pdf');
        $data = $this->detail_data_laporan();
        $html_content = $this->load->view('laporan/print_pdf', $data, true);
        $filename = 'Laporan ' . $data['karyawan']->nama . ' - ' . bulan($data['bulan']) . ' ' . $data['tahun'] . '.pdf';
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream($filename, ['Attachment' => 1]);
    }

    public function pdf_export()
    {
        $this->load->library('pdf');
        $data = $this->detail_data_laporan_all();
        $html_content = $this->load->view('laporan/pdf_print', $data, true);
        $filename = 'Laporan ' . ' - ' . tanggal($data['angka']) . ' ' . bulan($data['bulan']) . ' ' . $data['tahun'] . '.pdf';
        $this->pdf->set_option('isRemoteEnabled', true);
        $this->pdf->loadHtml($html_content);
        $this->pdf->render();
        $this->pdf->stream($filename, ['Attachment' => 1]);
    }

    private function detail_data_laporan()
    {
        $id_user = @$this->uri->segment(3) ? $this->uri->segment(3) : $this->session->id_user;
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        $data['karyawan'] = $this->karyawan->find($id_user);
        $data['lapor'] = $this->laporan->get_Laporan($id_user, $bulan, $tahun);
        $data['all_bulan'] = bulan();
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['hari'] = hari_bulan($bulan, $tahun);

        return $data;
    }

    private function detail_data_laporan_all()
    {
        $angka = @$this->input->get('angka') ? $this->input->get('angka') : date('d');
        $bulan = @$this->input->get('bulan') ? $this->input->get('bulan') : date('m');
        $tahun = @$this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        $data['all'] = $this->laporan->all_Laporan($angka, $bulan, $tahun);
        $data['all_bulan'] = bulan();
        $data['all_angka'] = tanggal();
        $data['angka'] = $angka;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        return $data;
    }

}


/* End of File: d:\Ampps\www\project\absen-pegawai\application\controllers\Absensi.php */