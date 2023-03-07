<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapemenang extends CI_Controller
{
    //untuk memblokir akses langsung dari url
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        if ($this->session->userdata('id_level') != '2') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Sudah Login!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth');
        }
    }

    //tampil data pemenang
    public function index()
    {
        $data['masyarakat'] = $this->M_masyarakat->all();
        
        $data['title'] = "Data Pemenang Lelang";
        $this->load->view('templates_petugas/header', $data);
        $this->load->view('templates_petugas/sidebar');
        $this->load->view('petugas/datapemenang', $data);
        $this->load->view('templates_petugas/footer');
    }


    //edit pemenang
    public function edit_pemenang($id)
    {
        if ($this->input->post('tgl_akhir')) {
            $errors = $this->_edit_process_pemenang($id);
        }
        
        $args = [
            'auction' => $this->M_lelang->first($id)
        ];

        $args ['title'] = "Edit Data Lelang";
        $this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar',$args);
        $this->load->view('petugas/lelang/edit_pemenang',$args);
        $this->load->view('templates_petugas/footer');

    }

    //proses edit lelang
    private function _edit_process_pemenang($id) 
    {
        $this->load->library('form_validation'); //proses validasi data input yang dinput dari form

        $this->form_validation->set_rules('tgl_akhir', 'Auction date akhir', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if($this->form_validation->run()) {
            $tanggal_akhir = set_value('tgl_akhir').''. set_value('jam_lelang'). ':00';
            $this->M_lelang->tgl_akhir = $tanggal_akhir;
            $this->M_lelang->status = set_value('status');

            $this->M_lelang->update($id); //load ke modal update untk proses update

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
            role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">$times;</span>
            </button>
            </div>');
            redirect('petugas/datapemenang');
        }

    }

    public function view_pemenang($id)
    {
        $product = $this->M_lelang->first($id);
 
        $args = [
            'product'   => $product,
            'history'     => $this->M_lelang->history($id),
            'max_bid'     => $this->M_lelang->max_bid($id),
        ];
 
 
        $args ['title'] = "Data Bid";
        $this->load->view('templates_petugas/header', $args);
        $this->load->view('templates_petugas/sidebar', $args);
        $this->load->view('petugas/lelang/view_pemenang', $args);
        $this->load->view('templates_petugas/footer');
    }
}