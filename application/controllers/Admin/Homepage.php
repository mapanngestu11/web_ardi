<?php defined('BASEPATH') or exit('No direct script access allowed');

class Homepage  extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('M_login');
        $this->load->model('M_bansos');
        $this->load->model('M_warga');
        // $this->load->model('M_instansi');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('Login');
            redirect($url);
        }
    }

    public function index()
    {

        $data['blt'] = $this->M_bansos->jumlah_data_blt()->result();
        $data['pkh'] = $this->M_bansos->jumlah_data_pkh()->result();
        $data['bpnt'] = $this->M_bansos->jumlah_data_bpnt()->result();
        $data['warga'] = $this->M_warga->jumlah_data_warga()->result();
        
        $this->load->view('Admin/Homepage.php',$data);
    }
}
