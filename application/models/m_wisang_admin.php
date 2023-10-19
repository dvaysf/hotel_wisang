<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_wisang_admin extends CI_Model
{
    public function tipekamar($ruangan)
    {
        $this->db->select("*");
        $this->db->from('ruangan');
        $this->db->join('tipe_kamar', 'tipe_kamar.id = ruangan.id_tipe_kamar');
        $this->db->where('tipe_kamar.nama_kamar', $ruangan);
        return $this->db->get();
    }
}
