<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Login terlebih dahulu', false);
            redirect(base_url('auth'));
        }
        if ($_SESSION['level'] != '1') {
            notifikasi('anda tidak bisa mengakses halaman ini', false);
            redirect(base_url('dashboard'));
        }
    }
    //LIST TOKO
    public function Toko()
    {
        $data['judul'] = "Daftar Toko";
        $data['tampil'] = $this->db->get('instansi')->result_array();
        manggil_view('dd/Toko', $data);
    }
    //TAMBAH TOKO OLEH ADMIN
    public function i_toko()
    {
        $data['judul'] = "Tambah Toko";
        manggil_view('dd/i_toko', $data);
    }
    public function p_i_toko()
    {
        $thn_dibuat = date('y');
        $digit_akhir = $this->db->get('instansi')->num_rows() + 1;
        $nilai = 'th' . $thn_dibuat . $digit_akhir;

        $nama_instansi = $this->input->post('nama_instansi');
        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $nama_file  =  strtolower($nama_instansi) . '_' . date("YmdHis");
            $folder     = './toko/';
            //proses upload 
            $proses = $this->mydb->uploadImage('image', $nama_file, $folder);
            if ($proses) {
                $cover = $this->upload->data('file_name');
                print_r(json_encode($this->upload->data()));

                $panjang_foto   = $this->upload->data('image_width');
                $lebar_foto     = $this->upload->data('image_height');

                //jika resolusi melebihi yang ditentukan maka akan di Resize
                if (($panjang_foto > 720) && ($lebar_foto > 540)) {
                    $lokasi_file = $folder . $cover;
                    //proses resize 
                    $this->mydb->imageResize('image', $lokasi_file, 720, 540);
                }
                $message = 'BERHASIL';
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("admin/i_toko"));
            }
        } else {
            $cover = NULL;
        }
        $data1 = array(
            'username' => $nilai,
            'password' => md5($nilai),
            'level' => '2'
        );
        $this->mydb->input_dt($data1, 'user');
        $data = array(
            'id_user'       => $this->db->insert_id(),
            'nama_instansi' => $nama_instansi,
            'nama_pemilik'  => $this->input->post('pemilik'),
            'alamat_toko'   => $this->input->post('alamat'),
            'cover'     => $cover,
            'no_telp'   => $this->input->post('telp'),
            'email'     => $this->input->post('email'),
            'deskripsi' => $this->input->post('deskripsi'),
            'status'    => '1'
        );
        $this->mydb->input_dt($data, 'instansi');
        notifikasi($message, true);
        redirect(base_url("admin/toko"));
    }
    //ACC TOKO
    public function acc_toko($id_ins)
    {
        $where          = ['id_ins' => $id_ins];
        $data_update    = ['status' => '1'];
        $this->mydb->update_dt($where, $data_update, 'instansi');

        $instansi   = $this->db->get_where('instansi', $where)->row_array();
        $id_user    = $instansi['id_user'];
        $data_level = ['level' => '2'];
        $this->mydb->update_dt(['id_user' => $id_user], $data_level, 'user');

        notifikasi('Toko ' . $instansi['nama_instansi'] . ' Berhasil di Acc', true);
        redirect(base_url("admin/toko"));
    }
    //HAPUS TOKO
    public function del_toko($id_ins)
    {
        $toko = $this->db->get_where('instansi', ['id_ins' => $id_ins])->row_array();
        $data2 = $this->db->get_where('bunga', ['id_ins' => $id_ins])->result_array();
        foreach ($data2 as $t) {
            unlink(FCPATH . 'bunga/' . $t['foto']);
        }
        unlink(FCPATH . 'toko/' . $toko['cover']);

        //UBAH LEVEL USER
        $where      = ['id_user' => $toko['id_user']];
        $data_level = ['level' => '3'];
        $this->mydb->update_dt($where, $data_level, 'user');

        $this->mydb->del(['id_ins' => $id_ins], 'instansi');
        notifikasi('berhasil terhapus', true);
        redirect(base_url("admin/toko"));
    }
    //EDIT TOKO
    public function e_toko($id_ins)
    {
        $data['judul'] = "Edit Toko";
        $data['toko'] = $this->db->get_where('instansi', ['id_ins' => $id_ins])->row_array();
        manggil_view('dd/e_toko', $data);
    }
    public function p_e_toko($id_ins)
    {
        $up_image = $_FILES['image']['name'];
        if ($up_image) {
            $config['upload_path'] = './toko/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']     = '8048';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $cover = $this->upload->data('file_name');
                $message = 'BERHASIL';
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("admin/i_toko"));
            }
        }
        $data = array(
            'nama_instansi' => $this->input->post('nama_instansi'),
            'nama_pemilik' => $this->input->post('pemilik'),
            'alamat_toko' => $this->input->post('alamat'),
            'cover' => $cover,
            'no_telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->mydb->update_dt(['id_ins' => $id_ins], $data, 'instansi');
        notifikasi($message, true);
        redirect(base_url("admin/toko"));
    }
    public function detail($id_ins)
    {
        $data['judul']    = "Informasi Toko";
        $data['toko']     = $this->db->get_where('instansi', ['id_ins' => $id_ins])->row_array();
        $data['username'] = $this->db->get_where('user', ['id_user' => $data['toko']['id_user']])->row_array()['username'];
        $data['tampil']   = $this->db->get_where('bunga', ['id_ins' => $id_ins])->result_array();
        manggil_view('dd/detail_toko', $data);
    }
    public function add_bunga()
    {
        $id_ins = $this->input->post('id_ins');
        $nama_bunga = $this->input->post('nama_bunga');
        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $nama_file  =  $_SESSION['title'] . '_' . strtolower($nama_bunga) . '_' . date("YmdHis");
            $folder     = './bunga/';
            //proses upload 
            $proses = $this->mydb->uploadImage('image', $nama_file, $folder);
            if ($proses) {
                $foto = $this->upload->data('file_name');
                // print_r(json_encode($this->upload->data()));

                $panjang_foto   = $this->upload->data('image_width');
                $lebar_foto     = $this->upload->data('image_height');

                //jika resolusi melebihi yang ditentukan maka akan di Resize
                if (($panjang_foto > 720) && ($lebar_foto > 540)) {
                    $lokasi_file = $folder . $foto;
                    //proses resize 
                    $this->mydb->imageResize('image', $lokasi_file, 720, 540);
                }
                $message = 'Bunga berhasil ditambahkan';
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("Dashboard/detail/" . $id_ins));
            }
        } else {
            $foto = NULL;
        }
        $data = array(
            'nama_bunga' => $nama_bunga,
            'harga'      => $_POST['harga'],
            'jumlah'     => '0',
            'foto'       => $foto,
            'id_ins'     => $id_ins
        );
        $this->mydb->input_dt($data, 'bunga');
        notifikasi($message, true);
        redirect(base_url("admin/detail/" . $id_ins));
    }
}
