<?php
defined('BASEPATH') or exit('No direct script access allowed');

function manggil_view($file, $data)
{
    $ieu = get_instance();
    $ieu->load->view('template/header', $data);
    $ieu->load->view($file, $data);
    $ieu->load->view('template/footer');
}
function post_aman($data)
{
    $ieu = get_instance();
    return htmlspecialchars($ieu->input->post($data));
}
function post_input($data)
{
    $ieu = get_instance();
    return $ieu->input->post($data);
}
function notifikasi($text, $type)
{
    $ieu = get_instance();
    if ($type == true) {
        $warna = 'success';
    } else {
        $warna = 'danger';
    }
    $ieu->session->set_flashdata('message', '<div class="alert alert-' . $warna . '"role="alert">' . $text . '</div>');
}
function halaman($base_url, $total_data)
{
    $ieu = get_instance();
    $config['base_url'] = $base_url;        //site url
    $config['total_rows'] = $total_data;    //total data
    $config['per_page'] = 6;                //total data yang tampil dalam satu halaman
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);
    //konfigurasi tampilan pagination
    $config['full_tag_open'] = '<nav> <ul class="pagination">';
    $config['full_tag_close'] = '</ul></nav>';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';
    $config['last_link'] = '';
    $config['las_tag_open'] = '<li class="page-item">';
    $config['las_tag_close'] = '</li>';
    $config['prev_link'] = 'sebelumnya';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = 'selanjutnya';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close'] = '</span></li>';
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    //kirim hasil konfigurasi
    $ieu->pagination->initialize($config);
}

function status_order($status)
{
    if ($status == 'berhasil') {
        $warna = 'success';
    }
    if ($status == 'proses') {
        $warna = 'primary';
    }
    if ($status == 'pending') {
        $warna = 'warning';
    }
    if ($status == 'dibatalkan') {
        $warna = 'danger';
    }
    if ($status == null) {
        $warna = 'danger';
    }

    return '<b class="text-' . $warna . '">' . ucfirst($status) . '</b>';
}
