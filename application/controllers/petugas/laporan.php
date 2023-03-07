<?php

class Laporan extends CI_Controller 
{

    //untuk memblokir akses langsung dari url 
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong> Anda Belum Login!</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Laporan";
        $this->load->view('templates_petugas/header', $data);
        $this->load->view('templates_petugas/sidebar');
        $this->load->view('petugas/laporan/v_laporan', $data);
        $this->load->view('templates_petugas/footer');
    }

    public function cetak_laporan(){
        // load library
        $this->load->model('M_lelang');
        $this->load->library('pdf');

        $tgl_lelang_awal = $this->input->post('tgl_lelang_awal');
        $tgl_lelang_akhir = $this->input->post('tgl_lelang_akhir');

        // load model dashboard
        $data['laporan'] = $this->M_lelang->filter_laporan($tgl_lelang_awal, $tgl_lelang_akhir);


    $this->session->set_userdata('tgl_lelang_awal', $tgl_lelang_awal);
    $this->session->set_userdata('tgl_lelang_akhir', $tgl_lelang_akhir);


    $this->pdf->setPaper('A4', 'potrait');
    $this->pdf->filename = "laporan-vialelang.pdf";

    // run dompdf
    $this->pdf->load_view('petugas/laporan/cetak_laporan', $data);
    }   
}