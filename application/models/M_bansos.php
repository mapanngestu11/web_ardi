<?php
class M_bansos extends CI_Model
{

    private $_table = "tbl_bansos";

    function tampil_data()
    {
        $this->db->select('
            a.id_bansos,
            a.nik,
            a.nama_warga,
            a.nama_bansos,
            a.jenis_bansos,
            a.keterangan,
            a.jumlah_nominal');
        $this->db->from('tbl_bansos as a');
        $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
        $query = $this->db->get();
        return $query;
    }

    function cetak_laporan($bulan)
    {
        $this->db->select('
            a.id_bansos,
            a.nik,
            a.nama_warga,
            a.nama_bansos,
            a.jenis_bansos,
            a.keterangan,
            a.jumlah_nominal,
            a.tanggal');
        $this->db->from('tbl_bansos as a');
        $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
        $this->db->where('MONTH(a.tanggal)',$bulan);
        $query = $this->db->get()->result();
        return $query;
    }

    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function delete_data($id_bansos)
    {
        $hsl = $this->db->query("DELETE FROM tbl_bansos WHERE id_bansos='$id_bansos'");
        return $hsl;
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function jumlah_data_blt()
    {
        $this->db->select('count(id_bansos) as jumlah');
        $this->db->where('jenis_bansos','BLT');
        $hsl = $this->db->get('tbl_bansos');
        return $hsl;
    }
    function jumlah_data_bpnt()
    {
        $this->db->select('count(id_bansos) as jumlah');
        $this->db->where('jenis_bansos','BPNT');
        $hsl = $this->db->get('tbl_bansos');
        return $hsl;
    }
    function jumlah_data_pkh()
    {
        $this->db->select('count(id_bansos) as jumlah');
        $this->db->where('jenis_bansos','PKH');
        $hsl = $this->db->get('tbl_bansos');
        return $hsl;
    }
    function cek_warga($nik)
    {
        $this->db->select('*');
        $this->db->from('tbl_warga');
        $this->db->where('verifikasi','1');
        $this->db->where('nik',$nik);
        $query = $this->db->get()->result();
        return $query;

    }
    function cek_kode_permohonan($kode_permohonan)
    {
     $this->db->select('
        a.id_bansos,
        a.nik,
        b.nama_lengkap,
        a.status,
        a.kode_permohonan,
        a.kebutuhan,
        a.file_pemohon,
        a.keterangan,
        a.file_surat');
     $this->db->from('tbl_bansos as a');
     $this->db->join('tbl_warga as b', 'b.nik = a.nik','left');
     $this->db->where('kode_permohonan',$kode_permohonan);
     $query = $this->db->get();
     return $query;
 }
 function cek_ktp($nik)
 {
    $this->db->select('*');
    $this->db->from('tbl_warga');
    $this->db->where('status','1');
    $this->db->where('nik',$nik);
    $query = $this->db->get();
    return $query;

}

}
