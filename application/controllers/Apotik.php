<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Apotik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('apotikmodel');
    }

    public function index()
    {
        $data['data'] = $this->apotikmodel->getdata()->result();
        // var_dump($data);exit;

        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('apotik', $data);
        $this->load->view('t_admin/footer', $data);
    }
    public function peta()
    {
        $data['data'] = $this->apotikmodel->getdata()->result();
        // var_dump($data);exit;

        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('peta', $data);
        $this->load->view('t_admin/footer', $data);
    }

    public function tambah()
    {

        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('tambah_apotik');
        $this->load->view('t_admin/footer');
    }

    public function proses_tambah_data()
    {
        $id_apotik = $this->input->post('id_apotik');
        $nama_apotik = $this->input->post('nama_apotik');
        $alamat = $this->input->post('alamat');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');

        $nama_file = $_FILES['foto']['name'];
        $tmp_file = $_FILES['foto']['tmp_name'];
        $path = "./file/" . $nama_file;
        move_uploaded_file($tmp_file, $path);

        $data = array(
            'id_apotik' => $id_apotik,
            'nama_apotik' => $nama_apotik,
            'alamat' => $alamat,
            'lat' => $lat,
            'lng' => $lng,
            'foto' => $nama_file
        );

        $this->apotikmodel->tambah($data);
        redirect('apotik');
    }

    public function edit($id_apotik)
    {
        $data['data'] = $this->apotikmodel->getdataid($id_apotik)->row();

        $this->load->view('t_admin/header');
        $this->load->view('t_admin/nav');
        $this->load->view('edit_apotik', $data);
        $this->load->view('t_admin/footer');
    }

    public function proses_edit_data()
    {
        $id_apotik = $this->input->post('id_apotik');
        $nama_apotik = $this->input->post('nama_apotik');
        $alamat = $this->input->post('alamat');
        $lat = $this->input->post('lat');
        $lng = $this->input->post('lng');

        $data = array(
            'nama_apotik' => $nama_apotik,
            'alamat' => $alamat,
            'lat' => $lat,
            'lng' => $lng
        );

        if (!empty($_FILES['foto']['name'])) {
            $nama_file = $_FILES['foto']['name'];
            $tmp_file = $_FILES['foto']['tmp_name'];
            $path = "./file/" . $nama_file;
            move_uploaded_file($tmp_file, $path);
            $data['foto'] = $nama_file;
        }

        $this->apotikmodel->edit($data, $id_apotik);
        redirect('apotik');
    }

    public function hapus($id)
    {
        $this->apotikmodel->hapus($id);
        redirect('apotik');


    }

}