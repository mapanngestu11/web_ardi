<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kegiatan');
		$this->load->model('M_warga');
		$this->load->model('M_banner');
		$this->load->helper('url');
		$this->load->library('upload');

	}

	public function index()
	{
		
		$this->load->view('Front/Warga.php');
	}

	public function add()
	{
		date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 10000; //Batas Ukuran

        $this->upload->initialize($config);
        if (!empty($_FILES['file']['name'])) {
        	if ($this->upload->do_upload('file')) {
        		$gbr = $this->upload->data();
                //Compress Image
        		$config['image_library'] = 'gd2';
        		$config['source_image'] = './assets/upload/' . $gbr['file_name'];
        		$config['create_thumb'] = FALSE;
        		$config['maintain_ratio'] = FALSE;
        		$config['quality'] = '100%';
        		$config['new_image'] = './assets/upload/' . $gbr['file_name'];
        		$this->load->library('image_lib', $config);
        		$this->image_lib->resize();

        		$file = $gbr['file_name'];
        		$nik = $this->input->post('nik');
        		$nama_warga = $this->input->post('nama_warga');
        		$jenis_kelamin = $this->input->post('jenis_kelamin');
        		$alamat = $this->input->post('alamat');
        		$rt = $this->input->post('rt');
        		$rw = $this->input->post('rw');
        		$verifikasi = '0' ;
        		$no_hp = $this->input->post('no_hp');
        		$tanggal =  date('Y-m-d h:i:s');

        		$data = array(

        			'nik' => $nik,
        			'nama_warga' => $nama_warga,
        			'jenis_kelamin' => $jenis_kelamin,
        			'alamat' => $alamat,
        			'rt' => $rt,
        			'rw' => $rw,
        			'verifikasi' => $verifikasi,
        			'file' => $file,
        			'tanggal' => $tanggal

        		);

        		$this->M_warga->input_data($data, 'tbl_warga');
        		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Data Sudah Terkirim !</div>');
        		redirect('Warga');
        	} else {
        		$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Gagal</div>');
        		redirect('Warga');
        	}
        } else {

        	redirect('Warga');
        }
    }
}
