<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_wisang_home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data['title'] = 'Hotel Gemilang';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();
		$data['user_access'] = $this->db->get('user')->result_array();

		$this->load->view('templates/temp_home/v_wisang_header',$data);
		$this->load->view('home/v_wisang_home',$data);
		$this->load->view('templates/temp_home/v_wisang_footer',$data);
	}

}
