<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$_SESSION['username']) {
			notifikasi('Login terlebih dahulu!', false);
			redirect(base_url('auth'));
		}
		$this->load->model('bunga_model');
	}
	public function index()
	{
		$data['judul'] = "Home";
		$data['user'] = $this->db->get_where('user', ['id_user' => $_SESSION['id_user']])->row_array();
		manggil_view('dd/index', $data);
	}
	public function detail_bunga($id_bunga)
	{
		$data['judul'] = "Detail Bunga";
		$data['bunga'] = $this->bunga_model->s_bunga($id_bunga);
		manggil_view('bunga/detail_bunga', $data);
	}
	public function ubah_password()
	{
		$user['user'] = $this->db->get_where('user', ['username' => $_SESSION['username']])->row_array();
		$data['judul'] = "Ubah Password";
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', [
			'required' => 'Password Lama masih kosong'
		]);
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[6]', [
			'min_length' => 'Password Baru telalu pendek',
			'required' => 'Password Baru masih kosong'
		]);
		$this->form_validation->set_rules('kpnfirmasi', 'Konfirmasi', 'required|trim|min_length[6]|matches[password_baru]', [
			'min_length' => 'Konfirmasi Password terlalu pendek',
			'required' => 'Konfirmasi Password masih kosong',
			'matches' => 'Password Baru tidak sama denga Konfirmasi Password'
		]);

		if ($this->form_validation->run() == false) {
			manggil_view('dd/ubah_password', $data);
		} else {
			$current = md5($this->input->post('password_lama'));
			$new = md5($this->input->post('password_baru'));
			if ($current == $user['user']['password']) {
				notifikasi('Password lama salah!', false);
			} else {
				if ($current == $new) {
					notifikasi('Password baru tidak sama dengan password lama!', false);
				} else {
					$this->db->set('password', $new);
					$this->db->where('username', $_SESSION['username']);
					$this->db->update('user');
					notifikasi('Password berhasil di ubah!', true);
				}
			}
			redirect(base_url("Dashboard/ubah_password"));
		}
	}
	public function regis_toko()
	{
		$this->form_validation->set_rules('nama_toko', 'nama_toko', 'required|trim', [
			'required' => 'nama toko tidak boleh kosong'
		]);
		$this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'required|trim', [
			'required' => 'nama pemilik tidak boleh kosong'
		]);
		$this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim', [
			'required' => 'no telpon tidak boleh kosong'
		]);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|trim', [
			'required' => 'deskripsi tidak boleh kosong'
		]);

		$namaInstansi = post_aman('nama_toko');
		if (!empty($_FILES) && $_FILES['image']['size'] > 0) {
			$namaImageBaru = date('YmdHis') . '_' . $namaInstansi;
			$upload = $this->mydb->uploadImage('image', $namaImageBaru);
			if ($upload) {
				$fileUpload = $this->upload->data('file_name');
				$source_path = "./toko/$fileUpload";
				$this->mydb->imageResize('image', $source_path, 720, 360);
			}
		} else {
			$fileUpload = NULL;
		}

		$kolom = [
			'id_user' => $_SESSION['id_user'],
			'nama_instansi' => $namaInstansi,
			'nama_pemilik' => post_aman('nama_pemilik'),
			'email' => post_aman('email'),
			'alamat_toko' => post_aman('alamat'),
			'no_telp' => post_aman('no_telp'),
			'deskripsi' => post_aman('deskripsi'),
			'status' => '0',
			'cover' => $fileUpload
		];
		$this->mydb->input_dt($kolom, 'instansi');
		notifikasi('Registrasi toko telah berhasil, tunggu di setujui Admin !', true);
		redirect(base_url("dashboard"));
	}
}
