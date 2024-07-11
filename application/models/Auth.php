<?php
class Auth extends CI_Model
{
    public function cek_pengguna($where)
    {
        return $this->db->get_where("login", $where);
    }

    public function cek_akun($where)
    {
        return $this->db->get_where("login",$where);
    }
}
?>