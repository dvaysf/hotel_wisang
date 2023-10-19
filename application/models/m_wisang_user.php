<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_wisang_user extends CI_Model {

    public function get_user()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
    }
}