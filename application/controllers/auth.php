<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/index');
    }
    function register()
    {
        $data['judul'] = "Registrasi";
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[user.email_user]', [
            'required' => 'email tidak boleh kosong',
            'is_unique' => 'email sudah digunakan',
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
            'required' => 'nama lengkap tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password telalu pendek',
            'required' => 'Password masih kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/regis');
        } else {
            $data1 = array(
                'username' => post_aman('email'),
                'password' => md5(post_aman('password')),
                'level' => '3',
                'email_user' => post_aman('email'),
                'nama' => post_aman('nama'),
                'alamat' => post_aman('alamat'),
            );
            $this->mydb->input_dt($data1, 'user');

            notifikasi('Registrasi Telah Berhasil, Silakan login', true);
            redirect(base_url("auth"));
        }
    }
    function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //CEK DATA USER AYA EUWEUH
        $cek_user = $this->db->get_where('user', ['username' => $username, 'password' => md5($password)]);
        if ($cek_user->num_rows() > 0) {
            $user = $cek_user->row_array();
            $_SESSION['username']   = $user['username'];
            $_SESSION['title']      = 'Admin';
            $_SESSION['level']      = $user['level'];
            $_SESSION['id_user']    = $user['id_user'];
            $_SESSION['csrf_token'] = sha1('komentar');
            if ($user['level'] == "3") {
                $_SESSION['title']  = $user['nama'];
            }
            if ($user['level'] == "2") {
                $toko = $this->db->get_where('instansi', ['id_user' => $user['id_user']])->row_array();
                $_SESSION['id_instansi'] = $toko['id_ins'];
                $_SESSION['title'] = $toko['nama_instansi'];
            }

            //cek expired order
            $this->load->model('order_model', 'order');
            $this->order->cek_expired($user['id_user']);

            redirect(base_url('Dashboard'));
        } else {
            notifikasi('username / password salah', false);
            redirect(base_url('auth'));
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('title');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_instansi');
        $this->session->unset_userdata('csrf_token');
        notifikasi('BERHASIL LOGOUT', true);
        redirect(base_url('auth/index'));
    }
}
