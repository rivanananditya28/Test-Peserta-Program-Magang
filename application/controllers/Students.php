<?php
class Students extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['students'] = $this->student_model->get_students();
        $this->load->view('students_view', $data);
    }

    public function add_student()
    {
        $this->load->model('student_model');
        $nama = $this->input->post('nama');
        $nisn = $this->input->post('nisn');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $foto = $this->input->post('foto');
        $student = array(
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'foto' => $this->input->post('foto')
        );
        $this->student_model->insert_student($student);
        redirect('students');
    }
}
