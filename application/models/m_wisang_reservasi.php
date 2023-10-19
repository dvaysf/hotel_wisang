<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_wisang_reservasi extends CI_Model {

    public function reservasi()
    {
        $this->db->select('*');
        $this->db->FROM('booking');
        $this->db->JOIN('user','user.id=booking.user_id');
        return $this->db->get();
    }

    public function data_kamar()
    {
        $this->db->select('*');
        $this->db->FROM('ruangan');     
        $this->db->JOIN('tipe_kamar','tipe_kamar.id=ruangan.id_tipe_kamar');
        return $this->db->get();
    }
}