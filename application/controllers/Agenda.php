<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kegiatan');
		$this->load->model('M_banner');

	}

	public function index()
	{


		$data['data_kegiatan'] = $this->M_kegiatan->tampil_data_home();
		
		
		
		$this->load->view('Front/Agenda.php',$data);
	}
}
