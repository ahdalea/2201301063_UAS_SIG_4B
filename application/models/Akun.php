<?php
class Akun extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('login', $data);
    }

    public function getdata()
    {
        return $this->db->get('login');
    }
    public function getdataid($id_login)
    {
        $this->db->where('id_login', $id_login);
        return $this->db->get('login');
    }
    public function edit($data, $id_login)
    {
        $this->db->where('id_login', $id_login);
        $this->db->update('login', $data);

    }
    public function hapus($id_login)
    {
        $this->db->where('id_login', $id_login);
        $this->db->delete('login');
    }


}
?>