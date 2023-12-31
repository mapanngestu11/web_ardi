<?php defined('BASEPATH') or exit('No direct script access allowed');

class Warga  extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_warga');
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
        $data['warga'] = $this->M_warga->tampil_data();
        $this->load->view('Admin/List.warga.php', $data);
    }

    public function cek_warga()
    {
        $data = (object)array();
        $nik = $this->input->post('input_check_nik');
        // $nis = '2022001';
        $cek_nik = $this->M_warga->cek_warga($nik);

        $data_nik = json_encode($cek_nik);

        $decode_nik = json_decode($data_nik);

        if ($decode_nik != NULL) {

            $hasil = "Data Ada";
            $data->result  = TRUE;
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
                $nik = $this->input->post('nik_baru');
                $nama_warga = $this->input->post('nama_warga');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $alamat = $this->input->post('alamat');
                $rt = $this->input->post('rt');
                $rw = $this->input->post('rw');
                $verifikasi = $this->input->post('verifikasi');
                $nama_user = $this->input->post('nama_user');
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
                    'nama_user' => $nama_user,
                    'file' => $file,
                    'tanggal' => $tanggal

                );



                $this->M_warga->input_data($data, 'tbl_warga');
                echo $this->session->set_flashdata('msg', 'success');
                redirect('Admin/Warga');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Warga');
            }
        } else {

            redirect('Admin/Warga');
        }
    }

    public function delete($id_warga)
    {
        $id_warga = $this->input->post('id_warga');
        $this->M_warga->delete_data($id_warga);
        echo $this->session->set_flashdata('msg', 'success-hapus');
        redirect('Admin/Warga');
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
                $id_warga = $this->input->post('id_warga');
                $nik = $this->input->post('nik');
                $nama_warga = $this->input->post('nama_warga');
                $jenis_kelamin = $this->input->post('jenis_kelamin');
                $alamat = $this->input->post('alamat');
                $rt = $this->input->post('rt');
                $rw = $this->input->post('rw');
                $verifikasi = $this->input->post('verifikasi');
                $nama_user = $this->input->post('nama_user');
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
                    'nama_user' => $nama_user,
                    'no_hp' => $no_hp,
                    'file' => $file,
                    'tanggal' => $tanggal

                );


                $where = array(
                    'id_warga' => $id_warga
                );

                $this->M_warga->update_data($where,$data,'tbl_warga');
                echo $this->session->set_flashdata('msg', 'success_update');
                redirect('Admin/Warga');
            } else {
                echo $this->session->set_flashdata('msg', 'warning');
                redirect('Admin/Warga');
            }

        } else {
            $id_warga = $this->input->post('id_warga');
            $nik = $this->input->post('nik');
            $nama_warga = $this->input->post('nama_warga');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $alamat = $this->input->post('alamat');
            $rt = $this->input->post('rt');
            $rw = $this->input->post('rw');
            $verifikasi = $this->input->post('verifikasi');
            $nama_user = $this->input->post('nama_user');
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
                'nama_user' => $nama_user,
                'no_hp' => $no_hp,
                'tanggal' => $tanggal
            );

            $where = array(
                'id_warga' => $id_warga
            );

            $this->M_warga->update_data($where,$data,'tbl_warga');
            echo $this->session->set_flashdata('msg', 'success_update');
            redirect('Admin/Warga');
        }
    }
}
