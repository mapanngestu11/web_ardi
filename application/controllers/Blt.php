<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blt extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_bansos');
		$this->load->model('M_banner');

	}

	public function index()
	{


		$data['data_bansos'] = $this->M_bansos->tampil_data_blt();
		
		
		
		$this->load->view('Front/Blt.php',$data);
	}
}
