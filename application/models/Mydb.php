<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydb extends CI_model
{
    // INPUT
    public function input_dt($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // UPDATE ATAU EDIT
    public function update_dt($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    //HAPUS
    public function del($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    // TOKO
    public function toko($limit)
    {
        $this->db->order_by('id_ins', 'DESC')->limit(6, $limit);
        return $this->db->get_where('instansi', ['status' => '1'])->result_array();
    }
    public function hitung_toko()
    {
        return $this->db->get_where('instansi', ['status' => '1'])->num_rows();
    }
    function punya_toko($id_user)
    {
        return $this->db->get_where('instansi', ['id_user' => $id_user])->num_rows();
    }
    //PENCARIAN DATA BERDASARKAN NAMA BUNGA
    function find_post($keyword, $limit)
    {
        $this->db->select('a.*, nama_instansi as toko ')->from('bunga a');
        $this->db->join('instansi b', 'a.id_ins = b.id_ins');
        $this->db->like('nama_bunga', $keyword)->order_by('a.id_bunga', 'DESC');
        $this->db->limit(6, $limit);
        return $this->db->get()->result_array();
    }
    function hitung_find($keyword)
    {
        $this->db->select('a.*, nama_instansi as toko ')->from('bunga a');
        $this->db->join('instansi b', 'a.id_ins = b.id_ins')->like('nama_bunga', $keyword);
        return $this->db->get()->num_rows();
    }
    //KOMENTAR
    public function komentar($id_ins)
    {
        $output = [];
        $no = 0;

        $query = $this->db->select('a.*, nama')
            ->from('t_komentar a')
            ->join('user b', 'a.id_user = b.id_user')
            ->where('a.id_ins', $id_ins)
            ->where('id_parent_komentar', '0')
            ->order_by('a.id_komentar', 'ASC')
            ->get();

        $output['num_rows'] = $query->num_rows();

        foreach ($query->result_array() as $row) {
            $col[$no] = [];
            $col[$no]['id_komentar'] = $row["id_komentar"];
            $col[$no]['id_parent_komentar'] = $row["id_parent_komentar"];
            $col[$no]['id_user']    = $row["id_user"];
            $col[$no]['nama']       = $row["nama"];
            $col[$no]['komentar']   = $row["komentar"];
            $col[$no]['waktu']      = $row["waktu"];

            $query2 = $this->db->select('a.*, nama')
                ->from('t_komentar a')
                ->join('user b', 'a.id_user = b.id_user')
                ->where('id_parent_komentar', $row['id_komentar'])
                ->order_by('a.id_komentar', 'ASC')
                ->get();

            $count = $query2->num_rows();
            $no2 = 0;

            if ($count > 0) {
                foreach ($query2->result_array() as $row2) {
                    $col2 = [];
                    $col2['id_komentar'] = $row2["id_komentar"];
                    $col2['id_parent_komentar'] = $row2["id_parent_komentar"];
                    $col2['id_user']    = $row2["id_user"];
                    $col2['nama']       = $row2["nama"];
                    $col2['komentar']   = $row2["komentar"];
                    $col2['waktu']      = $row2["waktu"];

                    $col[$no]['child'][$no2] = $col2;
                    $no2++;
                }
            } else {
                $col[$no]['child'] = 'nothing';
            }
            $output['data'] = $col;
            $no++;
        }
        return $output;
    }
    //UPLOAD & RESIZE IMAGE
    public function uploadImage($fieldname, $filename, $folder, $ext_to_lower = true)
    {
        $config = [
            'upload_path' => $folder,
            'file_name' => $filename,
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 8048,
            'overwrite' => true,    //menindih file yg sudah di upload dgn yg baru
            'file_ext_tolower' => $ext_to_lower,
        ];
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($fieldname)) {
            return $this->upload->data();
        } else {
            // $this->form_validation->add_to_error_array($fieldname, $this->upload->display_errors('', ''));
            return false;
        }
    }
    public function imageResize($fieldname, $source_path, $width, $height)
    {
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'maintain_ratio' => true,
            'width' => $width,
            'height' => $height,
        ];
        $this->load->library('image_lib', $config);
        if ($this->image_lib->resize()) {
            return true;
        } else {
            $this->form_validation->add_to_error_array($fieldname, $this->image_lib->display_errors('', ''));
            return false;
        }
    }
}
