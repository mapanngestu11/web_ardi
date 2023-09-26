<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kegiatan');
		$this->load->model('M_warga');
		$this->load->model('M_banner');

	}

	public function index()
	{
		
		$this->load->view('Front/Warga.php');
	}
}
