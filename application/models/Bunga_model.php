<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bunga_model extends CI_model
{
    //BUNGA
    public function bunga($limit = null)    //untuk di guest
    {
        $this->db->select('a.*, nama_instansi as toko ')
            ->from('bunga a')
            ->join('instansi b', 'a.id_ins = b.id_ins')
            ->where('status', '1')
            ->order_by('a.id_bunga', 'DESC');
        if ($limit != null) {
            return $this->db->limit(6, $limit)->get()->result_array();
        } else {
            return $this->db->get()->num_rows();
        }
    }
    public function hitung_bunga_pertoko($id_ins)
    {
        $this->db->select('a.*, nama_instansi as toko ')->from('bunga a');
        $this->db->join('instansi b', 'a.id_ins = b.id_ins')
            ->where('status', '1')->where('id_ins', $id_ins);
        return $this->db->get()->num_rows();
    }
    public function bunga_terbaru()
    {
        $this->db->select('a.*, nama_instansi as toko ')->from('bunga a');
        $this->db->join('instansi b', 'a.id_ins = b.id_ins')->where('status', '1');
        $this->db->order_by('id_bunga', 'DESC')->limit(6);
        return $this->db->get()->result_array();
    }
    public function s_bunga($id_bunga) //MEMILIH SATU BUNGA DARI DATABASE
    {
        $this->db->select('a.*, nama_instansi as toko ')->from('bunga a');
        $this->db->join('instansi b', 'a.id_ins = b.id_ins')->where('a.id_bunga', $id_bunga);
        return $this->db->get()->row_array();
    }

    //order bunga
    public function kurangi_stok($id_bunga, $jml) //digunakan ketika order bunga
    {
        $bunga = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array();
        //proses pengurangan stok bunga
        $jumlah_bunga = $bunga['jumlah'] - $jml;
        $this->mydb->update_dt(['id_bunga' => $id_bunga], ['jumlah' => $jumlah_bunga], 'bunga');
    }
    public function tambah_stok($id_bunga, $jml)    //digunakan ketika membatalkan order bunga
    {
        $bunga = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array();
        //proses penambahan stok bunga
        $jumlah_bunga = $bunga['jumlah'] + $jml;
        $this->mydb->update_dt(['id_bunga' => $id_bunga], ['jumlah' => $jumlah_bunga], 'bunga');
    }
}
