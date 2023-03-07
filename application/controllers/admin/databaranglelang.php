 <?php
 defined('BASEPATH') or exit('No direct script access allowed');

 class Databaranglelang extends CI_Controller
{
     //untuk memblokir akses langsung dari url
     public function __construct()
     {
         parent::__construct();
         //is_logged_in();
         if ($this->session->userdata('id_level') != '1') {
             $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>Anda Belum Login!</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');
             redirect('auth');
         }
     }
     
    public function index()
    {
        $data['barang'] = $this->M_barang->tampil_data()->result();
        $data['title'] =" Data Barang Lelang";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/barang',$data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $data['barang'] = $this->M_barang->tampil_data()->result_array();
        $this->form_validation->set_rules('nama_barang','Barang','is_unique[tb_barang.nama_barang]', //untuk ngasih tau barang sudah ada
        [
            'is_unique' => 'nama barang sudah ada'
        ]);
        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>nama barang sudah ada!</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
             </div>');

             redirect('admin/databaranglelang/index');
            
        }else{

        
        $nama_barang     = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $tgl     = $this->input->post('tgl');
        $harga_awal     = $this->input->post('harga_awal');
        $status_barang     = 'belum terjual';
        $photo     = $_FILES['photo']['name'];
        if ($photo= '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                echo $this->upload->display_errors();
                echo "Gambar Gagal diUpload! ";die;
            } else {
                $photo = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama_barang'      => $nama_barang,
            'keterangan'      => $keterangan,
            'tgl'      => $tgl,
            'harga_awal'      => $harga_awal,
            'status_barang' => $status_barang,
            'photo'      => $photo,
        );

        $this->M_barang->tambah_barang($data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Data Berhasil ditambahkan!</strong>
             <button type="button class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/databaranglelang/index');
    }
}

    public function edit($id)
    {
        $where = array('id_barang' => $id);
        $data['barang'] = $this->M_barang->editbarang($where, 'tb_barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/editbarang', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_barang');
        $nama_barang       = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        
        $tgl           = $this->input->post('tgl');
        $harga_awal       = $this->input->post('harga_awal');
        $status_barang          = $this->input->post('status_barang');
        $photo     = $this->input->post('photo');
        
        if ($photo == '') {
            
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('photo')) {
                echo $this->upload->display_errors();
                echo "Gambar Gagal diUpload!";die;
            } else {
                $photo = $this->upload->data('file_name');
            }
        }
        
        $data = array(
            'nama_barang'      => $nama_barang,
            'keterangan'    => $keterangan,
            'tgl'      => $tgl,
            'harga_awal'         => $harga_awal,
           
            'status_barang'          => $status_barang
        );

        if ($photo != '') {
            $data['photo'] = $photo;
        }

        $where = array(
            'id_barang' => $id
        );

        $this->M_barang->update_data($where, $data, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil diupdate!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/databaranglelang/index');
    }
    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->M_barang->hapus_data($where, 'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Dihapus!</strong>
             <button type="button class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('admin/databaranglelang/index');
    }

    public function tgl_laporan(){
        $data['title'] = "Laporan";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/laporan_barang/v_laporan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan(){
        
        //load library
        $this->load->model('M_lelang');
        $this->load->library('pdf');

        //load model lelang
        $data['barang']= $this->M_lelang->cetak_barang();

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-sistemlelang.pdf";

        //run dompdf
        $data['title'] ="Laporan";
        $this->pdf->load_view('admin/laporan_barang/catak_laporan',$data);
    }
}