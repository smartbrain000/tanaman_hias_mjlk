<?php
defined('BASEPATH') or exit('No direct script access allowed');

class instansi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Login terlebih dahulu', false);
            redirect(base_url('auth'));
        }
        // Yang bukan user level 2 / user level instansi tidak dapat mengakses controller ini
        if ($_SESSION['level'] != '2') {
            notifikasi('anda tidak dapat mengakses halaman ini', false);
            redirect(base_url('dashboard'));
        }
        $this->load->model('order_model');
    }
    //INFORMASI TOKO
    public function index()
    {
        $data['judul'] = "Informasi Toko";
        $where = ['id_ins' => $_SESSION['id_instansi']];
        $data['toko'] = $this->db->get_where('instansi', $where)->row_array();
        $data['payment'] = $this->db->get_where('metode_pembayaran', $where)->result_array();
        manggil_view('dd/profil_toko', $data);
    }
    //METODE PEMBAYARAN
    public function add_banking()
    {
        $id_ins = $_SESSION['id_instansi'];
        $nama_mp = post_aman('e_banking');
        $data = [
            'id_ins' => $id_ins,
            'nama_mp' => $nama_mp,
            'nomor_rek' => post_aman('no_rek')
        ];
        $this->mydb->input_dt($data, 'metode_pembayaran');
        notifikasi('Berhasil menambahkan metode pembayaran dengan ' . $nama_mp . ' !!!', true);
        redirect(base_url('instansi'));
    }
    //HAPUS METODE PEMBAYARAN
    public function hapus_banking($id_mtp = null)
    {
        $id_ins = $_SESSION['id_instansi'];
        if ($id_mtp == null) {
            notifikasi('Data Metode Pembayaran tidak ditemukan', false);
        } else {
            $where = ['id_ins' => $id_ins, 'id_mtp' => $id_mtp];
            $table = 'metode_pembayaran';
            if ($this->db->get_where($table, $where)->num_rows() > 0) {
                $this->mydb->del($where, 'metode_pembayaran');
                notifikasi('Data Metode Pembayaran berhasil dihapus !!!', true);
            } else {
                notifikasi('Data Metode Pembayaran gagal dihapus !!!', false);
            }
        }
        redirect(base_url('instansi'));
    }
    //EDIT TOKO
    public function e_toko()
    {
        $id_ins = $_SESSION['id_instansi'];
        $data['judul'] = "Edit Toko";
        $data['toko'] = $this->db->get_where('instansi', ['id_ins' => $id_ins])->row_array();
        manggil_view('dd/e_toko2', $data);
    }
    public function p_e_toko()
    {
        $id_ins = $_SESSION['id_instansi'];
        $imageDulu = $this->db->get_where('instansi', ['id_ins' => $id_ins])->row_array()['cover'];

        $namaInstansi = $this->input->post('nama_instansi');
        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $namaImageBaru = date('YmdHis') . '_' . $namaInstansi;
            $upload = $this->mydb->uploadImage('image', $namaImageBaru, './toko/');
            if ($upload) {
                $cover = $this->upload->data('file_name');
                // print_r(json_encode($this->upload->data()));
                $source_path = "./toko/$cover";
                $this->mydb->imageResize('image', $source_path, 720, 540);
                $this->mydb->update_dt(['id_ins' => $id_ins], ['cover' => $cover], 'instansi');
                unlink(FCPATH . 'toko/' . $imageDulu);
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("instansi/e_toko"));
            }
        } else {
            $cover = NULL;
        }
        $data = array(
            'nama_instansi' => $namaInstansi,
            'nama_pemilik' => $this->input->post('pemilik'),
            'alamat_toko' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->mydb->update_dt(['id_ins' => $id_ins], $data, 'instansi');
        notifikasi('berhasil diedit', true);
        redirect(base_url("instansi"));
    }
    //PEMBELIAN
    public function pembelian()
    {
        $data['judul'] = "Data Pembelian";
        $data['tampil'] = $this->order_model->pembelian($_SESSION['id_instansi']);
        manggil_view('dd/pembelian', $data);
    }
    public function detail_order($id_order = null)
    {
        if ($id_order == null) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("dashboard"));
        }
        $cek_order = $this->order_model->get_order_pembelian($id_order, $_SESSION['id_instansi']);
        if ($cek_order->num_rows() < 1) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("dashboard"));
        }
        $data['judul'] = "Detail Order";
        $data['order'] = $cek_order->row_array();
        $data['tampil'] = $this->order_model->get_item($id_order);
        manggil_view('dd/detail_order2', $data);
    }

    //UBAH STATUS PEMBELIAN
    public function acc_pembelian($id_order)
    {
        if ($id_order == null) {
            notifikasi('Data Order tidak ditemukan', false);
        }
        $where = ['id_order' => $id_order, 'id_ins' => $_SESSION['id_instansi']];
        $cek_order = $this->db->get_where('t_order', $where);
        //mengecek data order
        if ($cek_order->num_rows() > 0) {
            //proses mengubah status data order
            $this->mydb->update_dt($where, ['status_order' => 'berhasil'], 't_order');
            notifikasi('Order sudah di validasi.', true);
        } else {
            notifikasi('Data Order tidak ditemukan', false);
        }
        redirect(base_url("instansi/pembelian"));
    }
}
