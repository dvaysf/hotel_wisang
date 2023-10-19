<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_wisang_admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
    }

    public function index()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();

        $this->load->view('templates/temp_admin/v_wisang_header', $data);
        $this->load->view('templates/temp_admin/v_wisang_sidebar', $data);
        $this->load->view('templates/temp_admin/v_wisang_topbar', $data);
        $this->load->view('admin/v_wisang_admin', $data);
        $this->load->view('templates/temp_admin/v_wisang_footer', $data);
    }

    public function pencarian()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $keyword = $this->input->get('cari');

        if($keyword){
            // $data['booking'] = $this->db->get_where('booking' , ['username' => $keyword])->result_array();
            $this->db->select('*');
            $this->db->from('booking');
            $this->db->like('username',$keyword);
            $this->db->or_like('ruangan',$keyword);
            $this->db->or_like('kode_booking',$keyword);

            $data['booking'] = $this->db->get()->result_array();
        }else{
            $data['booking'] = $this->db->get('booking')->result_array();
        }

        $this->load->view('templates/temp_admin/v_wisang_header', $data);
        $this->load->view('templates/temp_admin/v_wisang_sidebar', $data);
        $this->load->view('templates/temp_admin/v_wisang_topbar', $data);
        $this->load->view('admin/v_wisang_pencarian', $data);
        $this->load->view('templates/temp_admin/v_wisang_footer', $data);
    }

    public function listkamar($kamar)
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();
        $data['tipe'] = $kamar;
        $this->load->model('m_wisang_admin');
        $data['list_kamar'] = $this->m_wisang_admin->tipekamar($kamar)->result_array();

        $this->load->view('templates/temp_admin/v_wisang_header', $data);
        $this->load->view('templates/temp_admin/v_wisang_sidebar', $data);
        $this->load->view('templates/temp_admin/v_wisang_topbar', $data);
        $this->load->view('tipe_kamar/v_wisang_kamar', $data);
        $this->load->view('templates/temp_admin/v_wisang_footer', $data);
    }

    public function statusruangan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $tipe_kamar = $this->input->post('tipe_kamar');
        $nomor_ruangan = $this->input->post('nomor_ruangan');
        $status = $this->input->post('status');

        $add = array(
            'id_tipe_kamar' => $tipe_kamar,
            'nomor_ruangan' => $nomor_ruangan,
            'status' => $status,
        );

        $tipe_redirect = $this->db->get_where('tipe_kamar', ['id' => $tipe_kamar])->row_array();
        $this->db->insert('ruangan', $add);
        redirect('c_wisang_admin/listkamar/' . $tipe_redirect['nama_kamar']);
    }

    public function masterdata()
    {
        $data['title'] = 'Admin Page';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_access'] = $this->db->get('user')->result_array();
        $data['tipe_kamar'] = $this->db->get('tipe_kamar')->result_array();

        $this->load->view('templates/temp_admin/v_wisang_header', $data);
        $this->load->view('templates/temp_admin/v_wisang_sidebar', $data);
        $this->load->view('templates/temp_admin/v_wisang_topbar', $data);
        $this->load->view('admin/v_wisang_masterdata', $data);
        $this->load->view('templates/temp_admin/v_wisang_footer');
    }

    public function tambahtipekamar()
    {
        $nama_kamar = $this->input->post('nama_kamar');
        $fasilitas_kamar = $this->input->post('fasilitas_kamar');
        $tipe_harga = $this->input->post('tipe_harga');

        $config['upload_path']          =  './upload/img/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->upload->initialize($config);

        $this->upload->do_upload('img');
        $upload_img = $this->upload->data('file_name');

        $data = array(
            'nama_kamar' =>  $nama_kamar,
            'fasilitas_kamar' =>  $fasilitas_kamar,
            'tipe_harga' =>  $tipe_harga,
            'img' => $upload_img
        );

        $this->db->insert('tipe_kamar', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Congratulation! your data has been added.</div>');
        redirect('c_wisang_admin/masterdata');
    }

    public function edittipekamar()
    {
        $edit_id = $this->input->post('edit_id');
        $edit_nk = $this->input->post('edit_nk');
        $edit_fk = $this->input->post('edit_fk');
        $edit_th = $this->input->post('edit_th');

        $config['upload_path']          =  './upload/img/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->upload->initialize($config);

        $this->upload->do_upload('img');
        $upload_img = $this->upload->data('file_name');

        $data = array(
            'nama_kamar' =>  $edit_nk,
            'fasilitas_kamar' =>  $edit_fk,
            'tipe_harga' =>  $edit_th,
            'img' => $upload_img
        );
        $this->db->where('id', $edit_id);
        $this->db->update('tipe_kamar', $data);
        redirect('c_wisang_admin/masterdata');
    }

    public function deletetipekamar($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tipe_kamar');
        redirect('c_wisang_admin/masterdata');
    }


    public function useraccess_update()
    {
        $edit_id = $this->input->post('edit_id');
        $edit_nama = $this->input->post('edit_nama');
        $edit_level = $this->input->post('edit_level');

        $update = array(
            'nama' =>  $edit_nama,
            'level' =>  $edit_level,
        );
        $this->db->where('id', $edit_id);
        $this->db->update('user', $update);
        redirect('c_wisang_admin/masterdata');
    }

    public function useracces_delete($id)
    {
        $data['title'] = 'User Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user_access'] = $this->db->get('user')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('user');
        redirect('c_wisang_admin/masterdata');
    }
}
