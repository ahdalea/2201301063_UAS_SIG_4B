<?php
class apotikmodel extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('apotik', $data);
    }

    public function getdata()
    {
        return $this->db->get('apotik');
    }
    public function getdataid($id)
    {
        $this->db->where('id_apotik', $id);
        return $this->db->get('apotik');
    }
    public function edit($data, $id_apotik)
    {
        $this->db->where('id_apotik', $id_apotik);
        $this->db->update('apotik', $data);

    }
    public function hapus($id)
    {
        $this->db->where('id_apotik', $id);
        $this->db->delete('apotik');
    }

}
?>