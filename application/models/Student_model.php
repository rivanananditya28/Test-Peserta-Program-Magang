<?php
class Student_model extends CI_Model
{

    public function SemuaData()
    {
        return $this->db->get('siswa')->result_array();
    }

    public function proses_tambah_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nisn" => $this->input->post('nisn'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "foto" => $this->input->post('foto'),
        ];
        $this->db->insert('siswa', $data);
    }

    public function hapus_data($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('siswa');
    }

    public function ambil_id_siswa($id)
    {
        return $this->db->get_where('siswa', ['id'=>$id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "nama" => $this->input->post('nama'),
            "nisn" => $this->input->post('nisn'),
            "tempat_lahir" => $this->input->post('tempat_lahir'),
            "tanggal_lahir" => $this->input->post('tanggal_lahir'),
            "foto" => $this->input->post('foto'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('siswa', $data);
    }
}
