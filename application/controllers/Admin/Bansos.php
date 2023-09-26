<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bansos  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_bansos');

        $this->load->helper('url');
        $this->load->library('upload');
        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">Login Terlebih Dahulu ! </div>');
            $url = base_url('login');
            redirect($url);
        }
    }


    public function index()
    {
        $data['bansos'] = $this->M_bansos->tampil_data();
        $this->load->view('Admin/List.bansos.php', $data);
    }

    public function cek_warga()
    {
        $data = (object)array();
        $nik = $this->input->post('input_check_nik');
        // $nis = '2022001';
        $cek_nik = $this->M_bansos->cek_warga($nik);

        $data_nik = json_encode($cek_nik);

        $decode_nik = json_decode($data_nik);


        if ($decode_nik != NULL) {

            $hasil = "Data Ada";
            $data->result  = $decode_nik;
            $data->success         = TRUE;
            $data->message        = "True !";

        }else{

            $hasil = "Data Kosong";
            $data->result = FALSE ;
            $data->status = FALSE;
        }

        echo json_encode($data);

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
                $nama_bansos = $this->input->post('nama_bansos');
                $jenis_bansos = $this->input->post('jenis_bansos');
                $keterangan = $this->input->post('keterangan');
                $jumlah_nominal = $this->input->post('jumlah_nominal');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'nik' => $nik,
                    'nama_warga' => $nama_warga,
                    'nama_bansos' => $nama_bansos,
                    'jenis_bansos' => $jenis_bansos,
                    'keterangan' => $keterangan,
                    'jumlah_nominal' => $jumlah_nominal,
                    'nama_user' => $nama_user,
                    'file' => $file,
                    'tanggal' => $tanggal

                );



                $this->M_bansos->input_data($data, 'tbl_bansos');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Bansos');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Bansos');
            }
        } else {

            redirect('Admin/Bansos');
        }
    }

    public function delete($id_bansos)
    {
        $id_bansos = $this->input->post('id_bansos');
        $this->M_bansos->delete_data($id_bansos);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Bansos');
    }

    public function update()
    {
        date_default_timezone_set("Asia/Jakarta");
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $config['max_size']  = 1000000; //Batas Ukuran

        $this->upload->initialize($config);
        
        if (!empty($_FILES['file']['name'] )) {

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
                $id_bansos = $this->input->post('id_bansos');
                $nik = $this->input->post('nik');
                $nama_warga = $this->input->post('nama_warga');
                $nama_bansos = $this->input->post('nama_bansos');
                $jenis_bansos = $this->input->post('jenis_bansos');
                $jumlah_nominal = $this->input->post('jumlah_nominal');
                $keterangan = $this->input->post('keterangan');
                $nama_user = $this->input->post('nama_user');
                $tanggal =  date('Y-m-d h:i:s');

                $data = array(

                    'nik' => $nik,
                    'nama_warga' => $nama_warga,
                    'nama_bansos' => $nama_bansos,
                    'jenis_bansos' => $jenis_bansos,
                    'keterangan' => $keterangan,
                    'jumlah_nominal' => $jumlah_nominal,
                    'nama_user' => $nama_user,
                    'file' => $file,
                    'tanggal' => $tanggal

                );



                $where = array(
                    'id_bansos' => $id_bansos
                );

                $this->M_bansos->update_data($where,$data,'tbl_bansos');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Bansos');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Bansos');
            }

        } else {
           $id_bansos = $this->input->post('id_bansos');
           $nik = $this->input->post('nik');
           $nama_warga = $this->input->post('nama_warga');
           $nama_bansos = $this->input->post('nama_bansos');
           $jenis_bansos = $this->input->post('jenis_bansos');
           $keterangan = $this->input->post('keterangan');
           $jumlah_nominal = $this->input->post('jumlah_nominal');
           $nama_user = $this->input->post('nama_user');
           $tanggal =  date('Y-m-d h:i:s');

           $data = array(

            'nik' => $nik,
            'nama_warga' => $nama_warga,
            'nama_bansos' => $nama_bansos,
            'jenis_bansos' => $jenis_bansos,
            'keterangan' => $keterangan,
            'jumlah_nominal' => $jumlah_nominal,
            'nama_user' => $nama_user,
            'tanggal' => $tanggal

        );

           $where = array(
            'id_bansos' => $id_bansos
        );

           $this->M_bansos->update_data($where,$data,'tbl_bansos');
           echo $this->session->set_flashdata('msg', 'success_update');
           redirect('Admin/Bansos');
       }
   }

   function laporan_bansos()
   {
    $data['bansos'] = $this->M_bansos->tampil_data();
    $this->load->view('Admin/Laporan.php', $data);
}


public function cetak_laporan ()
{
 $tanggal = $this->input->post('tanggal');
 $bulan = date('m', strtotime($tanggal));

 $data['keterangan'] = 'Bantuan Sosial';
 $data['laporan'] = $this->M_bansos->cetak_laporan($bulan);

 $this->load->view('Admin/Cetak_laporan.php',$data);

}
}
