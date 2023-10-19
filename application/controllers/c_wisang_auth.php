<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_wisang_auth extends CI_Controller 
{ 
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password','trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login User';
            $this->load->view('templates/temp_auth/v_wisang_header',$data);
            $this->load->view('auth/v_wisang_login');
            $this->load->view('templates/temp_auth/v_wisang_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if($user['is_active'] == 1) {
                // cek password
                if(password_verify($password,$user['password'])) {
                    $data = [
                        'email'=> $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    
                    // kondisi
                    $this->session->set_userdata($data);
                    if ($user['level'] == 1){
                        redirect('c_wisang_admin'); //admin
                    } else if ($user['level'] == 2){
                        redirect('c_wisang_resepsonis'); //resepsonis
                    } else if ($user['level'] == 3){
                        redirect('c_wisang_user');//user
                    }

                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong password! </div>');
                    redirect('c_wisang_auth');
                }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
            redirect('c_wisang_auth');
        }

        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Email is not register </div>');
            redirect('c_wisang_auth');
        }
    }

    
    public function registration()
    { 
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('tempat_lahir','Tempat_lahir','required|trim');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal_lahir','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        $this->form_validation->set_rules('no_telepon','No_telepon','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2','password','required|trim|matches[password1]',);


        
       if ($this->form_validation->run() == false) {
           $data['title'] = 'Registration';
           $this->load->view('templates/temp_auth/v_wisang_header',$data);
           $this->load->view('auth/v_wisang_registration');
           $this->load->view('templates/temp_auth/v_wisang_footer');
        } else {
           $data = [
               'nama' => htmlspecialchars ($this->input->post('nama',true)),
               'username' => htmlspecialchars ($this->input->post('username',true)),
               'email' => htmlspecialchars ($this->input->post('email',true)),
               'tempat_lahir' => htmlspecialchars ($this->input->post('tempat_lahir',true)),
               'tanggal_lahir' => htmlspecialchars ($this->input->post('tanggal_lahir',true)),
               'alamat' => htmlspecialchars ($this->input->post('alamat',true)),
               'status' => htmlspecialchars ($this->input->post('status',true)),
               'no_telepon' => htmlspecialchars ($this->input->post('no_telepon',true)),
               'password' => password_hash($this->input->post('password1'),
               PASSWORD_DEFAULT),
               'image' => 'default.jpg',
               'level' => 3,
               'is_active' => 1,
               'data_created' =>time(),
           ];

           $this->db->insert('user',$data);
           $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
           Congratulation! your account has been created. Please Login</div>');
           redirect('c_wisang_auth');
       }
        
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        log out</div>');
        redirect('c_wisang_auth');
    }

    // login admin
    public function login_admin()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password','trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Admin';
            $this->load->view('templates/temp_auth/v_wisang_header',$data);
            $this->load->view('auth/v_wisang_login_admin');
            $this->load->view('templates/temp_auth/v_wisang_footer');
        } else {
            // validasinya success
            $this->_login_admin();
        }
    }


    private function _login_admin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if($user['is_active'] == 1) {
                // cek password
                if(password_verify($password,$user['password'])) {
                    $data = [
                        'email'=> $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    
                    // kondisi
                    $this->session->set_userdata($data);
                    if ($user['level'] == 1){
                        redirect('c_wisang_admin'); //admin
                    } else if ($user['level'] == 2){
                        redirect('c_wisang_admin'); //resepsonis
                    } else if ($user['level'] == 3){
                        redirect('c_wisang_user');//user
                    }

                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Wrong password! </div>');
                    redirect('c_wisang_auth');
                }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
            redirect('c_wisang_auth');
        }

        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Email is not register </div>');
            redirect('c_wisang_auth');
        }
    }

    
    public function registration_admin()
    { 
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('tempat_lahir','Tempat_lahir','required|trim');
        $this->form_validation->set_rules('tanggal_lahir','Tanggal_lahir','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        $this->form_validation->set_rules('no_telepon','No_telepon','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2','password','required|trim|matches[password1]',);


        
       if ($this->form_validation->run() == false) {
           $data['title'] = 'Admin Registration';
           $this->load->view('templates/temp_auth/v_wisang_header',$data);
           $this->load->view('auth/v_wisang_registration_admin');
           $this->load->view('templates/temp_auth/v_wisang_footer');
        } else {
           $data = [
               'nama' => htmlspecialchars ($this->input->post('nama',true)),
               'username' => htmlspecialchars ($this->input->post('username',true)),
               'email' => htmlspecialchars ($this->input->post('email',true)),
               'tempat_lahir' => htmlspecialchars ($this->input->post('tempat_lahir',true)),
               'tanggal_lahir' => htmlspecialchars ($this->input->post('tanggal_lahir',true)),
               'alamat' => htmlspecialchars ($this->input->post('alamat',true)),
               'status' => htmlspecialchars ($this->input->post('status',true)),
               'no_telepon' => htmlspecialchars ($this->input->post('no_telepon',true)),
               'password' => password_hash($this->input->post('password1'),
               PASSWORD_DEFAULT),
               'image' => 'default.jpg',
               'level' => 1,
               'is_active' => 1,
               'data_created' =>time(),
           ];

           $this->db->insert('user',$data);
           $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
           Congratulation! your account has been created. Please Login</div>');
           redirect('c_wisang_auth/login_admin');
       }
        
    }

}