<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_wisang_resepsonis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = 'Resepsonis Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();

		$this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_sidebar',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
		$this->load->view('resepsonis/v_wisang_resepsonis',$data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);
	}

	public function Check_kode_booking()
	{
        $data['title'] = 'Resepsonis Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['booking']=$this->db->get_where('booking',['kode_booking'=>$this->input->post('search')])->row_array();
		
		$this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_sidebar',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
		$this->load->view('resepsonis/v_wisang_check_kode_booking',$data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);
	}

	public function data_resepsonis()
	{
        $data['title'] = 'Resepsonis Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('m_wisang_reservasi');
		$data['data_resepsonis'] = $this->m_wisang_reservasi->reservasi()->result_array();
		$this->load->model('m_wisang_reservasi');

		$this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_sidebar',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
		$this->load->view('resepsonis/v_wisang_data_resepsonis',$data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);
	}

	public function data_kamar()
	{
        $data['title'] = 'Resepsonis Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['data_kamar'] = $this->m_wisang_reservasi->data_kamar()->result_array();

		$this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_sidebar',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
		$this->load->view('resepsonis/v_wisang_data_kamar',$data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);
	}
}