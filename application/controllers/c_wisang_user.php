<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_wisang_user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = 'User Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();

		$this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
		$this->load->view('user/v_wisang_user',$data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);
	}

    public function tipe_kamar($id)
	{
        $data['title'] = 'User Page';   
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['fasilitas_kamar'] = $this->db->get_where('tipe_kamar',['id'=>$id])->row_array();
        $data['tipe_kamar'] = $this->db->get_where('tipe_kamar',['id'=>$id])->row_array();
	}

    public function booking()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');
        $ruangan = $this->input->post('ruangan');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $kode_booking = $user['id'].rand(10,10000000);
		$this->session->set_userdata('kode_booking',$kode_booking);
        $data = array(
            'username' => $username,
            'email' => $email,
            'user_id'=>$user['id'],
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
            'ruangan' => $ruangan,
            'jumlah_orang' => $jumlah_orang,
            'data_masuk' => date("Y-m-d H:i:s"),
            'kode_booking' => $kode_booking,
        );
        $this->db->insert('booking', $data);
        redirect('c_wisang_user/hasil_booking');
    }

    public function hasil_booking()
	{
        $data['title'] = 'User Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();	
        $data['detail']=$this->db->get_where('booking',array('kode_booking' => $this->session->userdata('kode_booking')))->result_array();
        $this->session->userdata('kode_booking');

        $this->load->view('templates/temp_admin/v_wisang_header',$data);
		$this->load->view('templates/temp_admin/v_wisang_topbar',$data);
        $this->load->view('user/v_wisang_hasil_booking', $data);
		$this->load->view('templates/temp_admin/v_wisang_footer',$data);

	}

    public function print()
    {
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['print'] = $this->db->get('booking')->result_array();
        $this->load->model('m_wisang_reservasi');
		$data['data_resepsonis'] = $this->m_wisang_reservasi->reservasi()->result_array();
		$this->load->model('m_wisang_reservasi');

        $this->load->view('v_print_data',$data);

    }

    public function laporan_pdf(){

        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $data['booking']=$this->db->get_where('booking',array('kode_booking' => $this->session->userdata('kode_booking')))->result_array();
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);
    
    
    }
}