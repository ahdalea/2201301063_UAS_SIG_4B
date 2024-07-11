<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun');
    }

    public function index()
    {
        $data['data'] = $this->Akun->getdata()->result();
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('akun', $data);
        $this->load->view('t_admin/footer');
    }

    public function tambah()
    {
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('tambah_akun');
        $this->load->view('t_admin/footer');
    }

    public function proses_tambah_akun()
    {
        $id_login = $_POST['id_login'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $data = array(
            'id_login' => $id_login,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );

        $this->Akun->tambah($data);
        redirect('akun');
    }

    public function edit($id)
    {
        $data['data'] = $this->Akun->getdataid($id)->row();
        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('edit_akun', $data);
        $this->load->view('t_admin/footer');
    }

    public function proses_edit_akun()
    {
        $id_login = $_POST['id_login'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $data = array(
            'id_login' => $id_login,
            'username' => $username,
            'password' => $password,
            'level' => $level,
        );

        $this->Akun->edit($data, $id_login);
        redirect('akun');
    }

    public function hapus($id)
    {
        $this->Akun->hapus($id);
        redirect('akun');
    }
}
