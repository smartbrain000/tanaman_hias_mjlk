<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bunga extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['username']) {
            notifikasi('Login terlebih dahulu!', false);
            redirect(base_url('auth'));
        }

        // USER YANG BUKAN LEVEL 2 / bukan instansi maka tidak dapat mengakses controller ini 
        if ($_SESSION['level'] != '2') {
            notifikasi('anda tidak dapat mengakses halaman ini', false);
            redirect(base_url('dashboard'));
        }
    }

    //JENIS BUNGA
    public function jenis_bunga()
    {
        $data['judul'] = "Jenis Bunga";
        $data['tampil'] = $this->db->get_where('bunga', ['id_ins' => $_SESSION['id_instansi']])->result_array();
        manggil_view('bunga/jenis_bunga', $data);
    }

    //TAMBAH BUNGA
    public function i_bunga()
    {
        $data['judul'] = "Tambah Bunga";
        manggil_view('bunga/i_bunga', $data);
    }
    //proses tambah bunga
    public function add_bunga()
    {
        $nama_bunga = $this->input->post('nama_bunga');

        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $nama_file  =  $_SESSION['title'] . '_' . strtolower($nama_bunga) . '_' . date("YmdHis");
            $folder     = './bunga/';
            //proses upload 
            $proses = $this->mydb->uploadImage('image', $nama_file, $folder);
            if ($proses) {
                $foto = $this->upload->data('file_name');
                print_r(json_encode($this->upload->data()));

                $panjang_foto   = $this->upload->data('image_width');
                $lebar_foto     = $this->upload->data('image_height');

                //jika resolusi melebihi yang ditentukan maka akan di Resize
                if (($panjang_foto > 720) && ($lebar_foto > 540)) {
                    $lokasi_file = $folder . $foto;
                    //proses resize 
                    $this->mydb->imageResize('image', $lokasi_file, 720, 540);
                }
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("bunga/i_bunga"));
            }
        } else {
            $foto = NULL;
        }

        $data = array(
            'foto'       => $foto,
            'nama_bunga' => $nama_bunga,
            'jumlah'     => $this->input->post('jumlah'),
            'harga'      => $this->input->post('harga'),
            'deskripsi'  => $this->input->post('body'),
            'id_ins'     => $_SESSION['id_instansi'],
        );
        $this->mydb->input_dt($data, 'bunga');
        notifikasi('Berhasil Menambahkan Bunga ' . $nama_bunga, true);
        redirect(base_url("bunga/jenis_bunga"));
    }

    //EDIT BUNGA
    public function e_bunga($id_bunga)
    {
        $data['judul'] = "Edit Bunga";
        $data['bunga'] = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array();
        manggil_view('bunga/e_bunga', $data);
    }
    //proses edit bunga
    public function p_e_bunga($id_bunga)
    {
        $foto_lama = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array()['foto'];
        $nama_bunga = post_aman('nama_bunga');

        if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
            $nama_file  =  $_SESSION['title'] . '_' . strtolower($nama_bunga) . '_' . date("YmdHis");
            $folder     = './bunga/';
            //proses upload 
            $proses = $this->mydb->uploadImage('image', $nama_file, $folder);
            // print_r(json_encode($this->upload->data()));
            if ($proses) {
                $foto = $this->upload->data('file_name');

                $panjang_foto   = $this->upload->data('image_width');
                $lebar_foto     = $this->upload->data('image_height');

                //jika resolusi melebihi yang ditentukan maka akan di Resize
                if (($panjang_foto > 720) && ($lebar_foto > 540)) {
                    $lokasi_file = $folder . $foto;
                    //proses resize 
                    $this->mydb->imageResize('image', $lokasi_file, 720, 540);
                }
                //proses hapus file foto bunga lama
                unlink(FCPATH . 'bunga/' . $foto_lama);
                //proses ubah foto
                $this->mydb->update_dt(['id_bunga' => $id_bunga], ['foto' => $foto], 'bunga');
            } else {
                notifikasi($this->upload->display_errors(), false);
                redirect(base_url("bunga/e_bunga/" . $id_bunga));
            }
        }

        $data = array(
            'nama_bunga' => $nama_bunga,
            'harga'      => $this->input->post('harga'),
            'jumlah'     => $this->input->post('jumlah'),
            'deskripsi'  => $this->input->post('deskripsi')
        );
        $this->mydb->update_dt(['id_bunga' => $id_bunga], $data, 'bunga');
        notifikasi($nama_bunga . ' berhasil diedit', true);
        redirect(base_url("dashboard/detail_bunga/" . $id_bunga));
    }

    //HAPUS BUNGA
    public function del_bunga($id_bunga)
    {
        $bunga = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array();

        unlink(FCPATH . 'bunga/' . $bunga['foto']);

        $this->mydb->del(['id_bunga' => $id_bunga], 'bunga');
        notifikasi($bunga['nama_bunga'] . " berhasil terhapus", true);
        redirect(base_url("bunga/jenis_bunga"));
    }
}
