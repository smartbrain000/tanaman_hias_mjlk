<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bunga_model');
        $this->load->model('order_model');
    }
    public function index()
    {
        redirect(base_url('post/home'));
    }
    public function cari()
    {
        $keyword = $this->input->post('search');
        $post = $this->mydb->hitung_find($keyword);
        if ($post > 0) {

            $data['judul'] = "Pencarian : " . $keyword;
            $jml = $post;
            halaman(base_url('post/cari'), $jml);
            $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['bunga_terbaru'] = $this->mydb->find_post($keyword, $data['page']);
            $data['pagination'] = $this->pagination->create_links();
            $data['file'] = 'bunga';
        } else {
            $data['judul'] = "Pencarian Tidak Ditemukan !!!";
            $data['file'] = 'notfound';
        }

        $this->load->view('guest/index', $data);
    }
    public function home()
    {
        $jml = $this->mydb->hitung_toko();
        halaman(site_url('post/home'), $jml);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['instansi'] = $this->mydb->toko($data['page']);
        $data['pagination'] = $this->pagination->create_links();

        $data['judul'] = 'Home';
        $data['file'] = 'home';
        $data['bunga_terbaru'] = $this->bunga_model->bunga_terbaru();
        $this->load->view('guest/index', $data);
    }
    public function bunga()
    {
        $jml = $this->bunga_model->bunga();
        halaman(site_url('post/bunga'), $jml);
        $limit = ($this->uri->segment(3)) ? $this->uri->segment(3) : 1;
        $data['bunga_terbaru'] = $this->bunga_model->bunga($limit);
        $data['pagination'] = $this->pagination->create_links();

        $data['judul'] = 'bunga';
        $data['file'] = 'bunga';
        $this->load->view('guest/index', $data);
    }
    public function detail($id_instansi) //detail toko
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = sha1('komentar');
            $_SESSION['username'] = '';
            $_SESSION['level'] = '2';
        }
        $data['judul'] = 'Detail';
        $data['toko'] = $this->db->get_where('instansi', ['id_ins' => $id_instansi])->row_array();
        $data['tampil'] = $this->db->get_where('bunga', ['id_ins' => $id_instansi])->result_array();
        $data['komen'] = $this->mydb->komentar($id_instansi);
        $data['file'] = 'detail_toko';
        $this->load->view('guest/index', $data);
    }
    public function detail_bunga($id)
    {
        $data['judul'] = 'Detail';
        $data['file'] = 'detail_bunga';
        $data['bunga'] = $this->bunga_model->s_bunga($id);
        $this->load->view('guest/index', $data);
    }
    public function i_komentar()
    {
        function anti($text)
        {
            return stripslashes(strip_tags(htmlspecialchars($text, ENT_QUOTES)));
        }
        $id_user    = anti($_SESSION["id_user"]);
        $komen      = anti($_POST["komen"]);
        $id_komen   = anti($_POST["id_komentar"]);
        $id_ins     = anti($_POST["id_ins"]);
        if (empty($_SESSION['username'])) {
            notifikasi('Gagal!', true);
        } else {
            $data = [
                'id_parent_komentar' => $id_komen,
                'id_ins' => $id_ins,
                'komentar' => $komen,
                'id_user' => $id_user
            ];
            $this->mydb->input_dt($data, 't_komentar');
            notifikasi('Data berhasil di simpan!', true);
        }
        redirect(base_url('post/detail/' . $id_ins));
    }
    public function order_bunga()
    {
        function anti2($text)
        {
            return stripslashes(strip_tags(htmlspecialchars($text, ENT_QUOTES)));
        }
        if (empty($_SESSION['id_user'])) {
            notifikasi('Gagal order bunga, harap login terlebih dahulu!', true);
            redirect(base_url('auth'));
        } else {
            $id_user     = $_SESSION["id_user"];
            $id_ins      = anti2($_POST["id_ins"]);
            $id_bunga    = anti2($_POST["id_bunga"]);
            $jml_dipesan = anti2($_POST["jml_dipesan"]);
            $total_harga = anti2($_POST["total_harga"]);
            $total_pembayaran = anti2($_POST["total_pembayaran"]);

            //cek sudah order belum
            $cek_order = $this->order_model->order_bunga($id_user, $id_ins);
            $waktu   = date("Y-m-d H:i:s");
            $expired = $this->order_model->update_expired($waktu);

            if ($cek_order->num_rows() < 1) {
                //jika belum, maka input order
                $data_order = [
                    'waktu_order'   => $waktu,
                    'id_ins'        => $id_ins,
                    'id_user'        => $id_user,
                    'total_pembayaran' => $total_pembayaran,
                    'expired'        => $expired
                ];
                $this->mydb->input_dt($data_order, 't_order');
                $id_order = $this->db->insert_id();
            } else {
                $order = $cek_order->row_array();
                $id_order = $order['id_order'];

                //update total_pembayaran
                $data_baru = [
                    'waktu_order' => $waktu,
                    'total_pembayaran' => $total_pembayaran,
                    'expired' => $expired
                ];
                $where = ['id_order' => $id_order];
                $this->mydb->update_dt($where, $data_baru, 't_order');
            }

            //proses kurangi stok bunga
            $this->bunga_model->kurangi_stok($id_bunga, $jml_dipesan);

            //proses input item
            $data_item = [
                'id_order'       => $id_order,
                'id_bunga'       => $id_bunga,
                'jumlah_dipesan' => $jml_dipesan,
                'total_harga'    => $total_harga
            ];
            $this->mydb->input_dt($data_item, 't_item_order');

            notifikasi('Bunga berhasil di simpan ke dalam keranjang !!', true);
            redirect(base_url('post/detail_bunga/' . $id_bunga));
        }
    }
}
