<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_model
{
    public function order_bunga($id_user, $id_ins = null)
    {
        $this->db->select('a.*, nama_instansi')->from('t_order a')
            ->join('instansi b', 'a.id_ins = b.id_ins')
            ->where('a.id_user', $id_user);
        if ($id_ins == null) {
            return $this->db->order_by('waktu_order', 'DESC')->get()->result_array();
        } else {
            $this->db->where('a.id_ins', $id_ins)
                ->where('status_order', null)
                ->order_by('waktu_order', 'DESC');
            return $this->db->get();
        }
    }

    public function get_order($id_order)
    {
        return $this->db->select('a.*, nama_instansi')->from('t_order a')
            ->join('instansi b', 'a.id_ins = b.id_ins')
            ->where('a.id_order', $id_order)->get();
    }
    public function get_order_pembelian($id_order, $id_ins)
    {
        return $this->db->select('a.*, nama_instansi')->from('t_order a')
            ->join('instansi b', 'a.id_ins = b.id_ins')
            ->where('a.id_order', $id_order)->where('a.id_ins', $id_ins)
            ->get();
    }
    public function get_item($id_order)
    {
        $this->db->select('a.*, nama_bunga')->from('t_item_order a')->join('bunga b', 'a.id_bunga=b.id_bunga');
        return $this->db->where('id_order', $id_order)->get();
    }

    public function tambah_total_pembelian($id_order, $total)
    {
        $order = $this->get_order($id_order)->result_array();
        $total_pembayaran = $order['total_pembayaran'] + $total;
        $data_baru = ['total_pembayaran' => $total_pembayaran];
        $this->mydb->update_dt(['id_order' => $id_order], $data_baru, 't_order');
    }
    public function kurangi_total_pembelian($id_order, $total)
    {
        $order = $this->get_order($id_order)->result_array();
        $total_pembayaran = $order['total_pembayaran'] - $total;
        $total_pembayaran = ($total_pembayaran < 1) ? 0 : $total_pembayaran;
        $data_baru = ['total_pembayaran' => $total_pembayaran];
        $this->mydb->update_dt(['id_order' => $id_order], $data_baru, 't_order');
    }
    public function update_expired($waktu)
    {
        $waktu_sekarang  = strtotime($waktu);
        $detik           = ((60 * 60) * 24) * 3; // 60 detik dikali 60 menit dikali 24 jam dikali 3 hari
        $jml_detik       = $waktu_sekarang + $detik;
        $expired         = date("Y-m-d H:i:s", $jml_detik);
        return $expired;
    }

    /// PEMBELIAN
    public function pembelian($id_ins)
    {
        $this->db->select('a.*, nama ')->from('t_order a');
        $this->db->join('user b', 'a.id_user = b.id_user');
        $this->db->where('a.id_ins', $id_ins);
        return $this->db->get()->result_array();
    }

    //CEK EXPIRED ORDER
    public function cek_expired($id_user)
    {
        $waktu_sekarang = date('Y-m-d H:i:s');
        $where = [
            'id_user' => $id_user,
            'expired <' => $waktu_sekarang
        ];
        //cek data order berdasarkan tgl expired dan id_user
        $cek_order = $this->db->get_where('t_order', $where);
        if ($cek_order->num_rows() > 0) {
            //cek status_order
            foreach ($cek_order->result_array() as $order) {
                if (
                    ($order['type_payment'] == 'Cash') ||
                    ($order['status_order'] == 'pending') ||
                    (($order['status_order'] == 'proses') && ($order['type_payment'] == 'Transfer') && ($order['bukti_transfer'] == null))
                ) {
                    //mengembalikan jumlah stok bunga
                    $this->load->model('bunga_model');
                    $item_bunga = $this->get_item($order['id_order']);
                    foreach ($item_bunga->result_array() as $item) {
                        //proses menambah stok bunga dari data item_order
                        $this->bunga_model->tambah_stok($item['id_bunga'], $item['jumlah_dipesan']);
                    }
                    //update status order ke BATAL
                    $status_order = ['status_order' => 'dibatalkan'];
                    $this->mydb->update_dt(['id_order' => $order['id_order']], $status_order, 't_order');
                }
            }
        }
    }
}
