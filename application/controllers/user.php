<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Login terlebih dahulu', false);
            redirect(base_url('auth'));
        }
        $this->load->model('bunga_model');
        $this->load->model('order_model');
    }
    //PEMESANAN
    public function pemesanan()
    {
        $data['judul'] = "Data Pemesanan";
        $data['tampil'] = $this->order_model->order_bunga($_SESSION['id_user']);
        manggil_view('dd/pemesanan', $data);
    }
    public function detail_order($id_order = null)
    {
        if ($id_order == null) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("dashboard"));
        }
        $cek_order = $this->order_model->get_order($id_order);
        if (($cek_order->num_rows() < 1) || ($cek_order->row_array()['id_user'] != $_SESSION['id_user'])) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("dashboard"));
        }
        $data['judul'] = "Detail Order";
        $data['order'] = $cek_order->row_array();
        $data['tampil'] = $this->order_model->get_item($id_order);
        manggil_view('dd/detail_order', $data);
    }
    public function p_check_out($id_order = null)
    {
        if ($id_order == null) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("user/pemesanan"));
        }

        $where = ['id_order' => $id_order, 'id_user' => $_SESSION['id_user']];
        $cek_order = $this->db->get_where('t_order', $where);
        //mengecek data order
        if ($cek_order->num_rows() > 0) {
            $order = $cek_order->row_array();

            $type_payment = $this->input->post('type_payment');
            $bank = $this->input->post('e_banking');

            $waktu   = date("Y-m-d H:i:s");
            $expired = $this->order_model->update_expired($waktu);

            $status_proses = ($type_payment == 'Cash') ? 'proses' : 'pending';
            $bukti_tf = NULL;

            if (!empty($_FILES) && $_FILES['bukti_tf']['size'] > 0) {
                $nama_file  =  $order['id_order'] . '_' . $order['total_pembayaran'];
                $folder     = './bukti_tf/';
                //proses upload 
                $proses = $this->mydb->uploadImage('bukti_tf', $nama_file, $folder, false);
                if ($proses) {
                    // print_r(json_encode($this->upload->data()));
                    $status_proses = 'proses';
                    $bukti_tf = $this->upload->data('file_name');
                } else {
                    notifikasi($this->upload->display_errors(), false);
                    redirect(base_url('user/detail_order/' . $id_order));
                }
            } else {
                $bukti_tf = NULL;
            }

            $set = [
                'waktu_order'   => $waktu,
                'type_payment'  => $type_payment,
                'expired'       => $expired,
                'bank'          => $bank,
                'bukti_transfer' => $bukti_tf,
                'status_order'  => $status_proses
            ];
            $this->mydb->update_dt($where, $set, 't_order');

            ($status_proses == 'proses')
                ? notifikasi('Produk Berhasil Dipesan', true)
                : notifikasi('Order produk tertunda, silakan upload bukti pembayaran', false);

            redirect(base_url('user/detail_order/' . $id_order));
        } else {
            notifikasi('Data Order tidak ditemukan', true);
        }
        redirect(base_url("user/pemesanan"));
    }
    public function batal($id_order = null)
    {
        if ($id_order == null) {
            notifikasi('Data Order tidak ditemukan', false);
            redirect(base_url("user/pemesanan"));
        }
        //mencari data
        $where = ['id_order' => $id_order, 'id_user' => $_SESSION['id_user']];
        $cek_order = $this->db->get_where('t_order', $where);
        //mengecek data order
        if ($cek_order->num_rows() > 0) {
            $order = $cek_order->row_array();
            //penambahan stok bunga (karena pesanan dibatalkan)
            $item_bunga = $this->order_model->get_item($order['id_order']);
            foreach ($item_bunga->result_array() as $item) {
                $this->bunga_model->tambah_stok($item['id_bunga'], $item['jumlah_dipesan']);
            }

            //proses menghapus data item dan bunga
            // $this->mydb->del(['id_order' => $id_order], 't_item_order');
            // $this->mydb->del($where, 't_order');

            //proses mengubah status data order
            $status_order = ['status_order' => 'dibatalkan'];
            $this->mydb->update_dt($where, $status_order, 't_order');
            notifikasi('Order dibatalkan', true);
        } else {
            notifikasi('Data Order tidak ditemukan', false);
        }
        redirect(base_url("user/pemesanan"));
    }
    public function hapus_item($id_item = null)
    {
        if ($id_item == null) {
            notifikasi('Data Item tidak ditemukan', false);
            redirect(base_url("user/pemesanan"));
        }
        $item = $this->db->get_where('t_item_order', ['id_item' => $id_item])->row_array();

        $where = ['id_order' => $item['id_order'], 'id_user' => $_SESSION['id_user']];
        $cek_order = $this->db->get_where('t_order', $where);
        //mengecek data order
        if ($cek_order->num_rows() > 0) {
            //penambahan stok bunga
            $this->bunga_model->tambah_stok($item['id_bunga'], $item['jumlah_dipesan']);

            //pengurangan total pembayaran
            $this->order_model->kurangi_total_pembelian($item['id_order'], $item['total_harga']);

            //proses menghapus item 
            $this->mydb->del(['id_item' => $id_item], 't_item_order');

            notifikasi('Item berhasil dihapus', true);
        } else {
            notifikasi('Data Item Tidak Ditemukan', false);
        }

        redirect(base_url("user/detail_order/" . $item['id_order']));
    }
    //REGISTRASI TOKO
    public function buat_toko()
    {
        $cek = $this->mydb->punya_toko($_SESSION['id_user']);
        if ($cek > 0) {
            notifikasi('Anda sudah punya toko', false);
            redirect(base_url('Dashboard'));
        }
        $data['judul'] = "Buat Toko";
        manggil_view('dd/i_toko2', $data);
    }
    public function p_i_toko()
    {
        $cek = $this->mydb->punya_toko($_SESSION['id_user']);
        if ($cek > 0) {
            notifikasi('sudah punya toko', false);
        } else {
            $digit12 = "th";
            $digit34 = date('y');
            $digit_akhir = $this->db->query('SELECT max(id_ins+1) as jml FROM instansi')->row_array()['jml'];
            $nilai = $digit12 . $digit34 . $digit_akhir;
            $up_image = $_FILES['image']['name'];
            // var_dump($up_image);
            if ($up_image) {
                $config['upload_path'] = './toko/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '7000';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $cover = $this->upload->data('file_name');
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './toko/' . $up_image;
                    $config['create_thumb'] = TRUE;
                    $config['maintain_ratio'] = TRUE;
                    $config['width']         = 720;
                    $config['height']       = 360;
                    $this->load->library('image_lib', $config);

                    $this->image_lib->resize();
                    $message = 'REGISTRASI TOKO TELAH BERHASIL, SILAHKAN TUNGGU DI ACC ADMIN';
                } else {
                    notifikasi($this->upload->display_errors(), false);
                    redirect(base_url("user/i_toko2"));
                }
            }

            $data = array(
                'id_user' => $_SESSION['id_user'],
                'nama_instansi' => $this->input->post('nama_instansi'),
                'nama_pemilik' => $this->input->post('pemilik'),
                'alamat_toko' => $this->input->post('alamat'),
                'cover' => $cover,
                'no_telp' => $this->input->post('telp'),
                'email' => $this->input->post('email'),
                'deskripsi' => $this->input->post('deskripsi'),
                'status' => '0'
            );
            $this->mydb->input_dt($data, 'instansi');
            notifikasi($message, true);
        }
        redirect(base_url("dashboard"));
    }
    //EDIT DATA USER
    public function edit_user()
    {
        $id_user = $_SESSION['id_user'];
        $data['judul'] = "Edit User";
        $data['user'] = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        manggil_view('dd/e_user', $data);
    }
    public function p_e_user()
    {
        $id_user = $_SESSION['id_user'];

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telp_user' => $this->input->post('telp'),
            'email_user' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->mydb->update_dt(['id_user' => $id_user], $data, 'user');
        notifikasi('berhasil diedit', true);
        redirect(base_url("dashboard/index/"));
    }
}
