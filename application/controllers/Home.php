<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['siswa'] = $this->Student_model->SemuaData();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('template/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah_data()
    {
        $data['siswa'] = $this->Student_model->SemuaData();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('home/tambah_data', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah_data()
    {
        $this->Student_model->proses_tambah_data();
        redirect('Home');
    }

    public function hapus_data($id)
    {
        $this->Student_model->hapus_data($id);
        redirect('Home');
    }

    public function edit_data($id)
    {
        $data['siswa'] = $this->Student_model->ambil_id_siswa($id);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('home/edit_data', $data);
        $this->load->view('template/footer');
    }

    public function proses_edit_data($id)
    {
        $this->Student_model->proses_edit_data($id);
        redirect('Home');
    }
}
