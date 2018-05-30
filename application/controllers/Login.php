<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
    

        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->helper('url','form');
            $this->load->library('form_validation');
            $this->load->model('User'); 
        }
        

        public function index()
        {
            $this->load->view('login');
            
        }

        public function cekLogin()
        {
            $this->load->library('form_validation');
		    $this->form_validation->set_rules('username', 'Username', 'trim|required');
		    $this->form_validation->set_rules('pass', 'Password', 'trim|required|callback_cekDb');
		    if ($this->form_validation->run() == FALSE) {
			    $this->load->view('login');
		    } else {
			    redirect('Home','refresh');
		    }
        }
 
        public function cekDb($password)
        {
            $username = $this->input->post('username');
		    $result = $this->User->login($username, $password);
		    if ($result) {
			    $sess_array = array();
			    foreach ($result as $row) {
				    $sess_array = array(
					    'idUser' =>$row->idUser,
					    'username' => $row->username,
					    // 'role' => $row->role
				    );
				
				    $this->session->set_userdata( 'logged_in',$sess_array );
			    }
			    return true;
		    }else {
			    $this->form_validation->set_message("cekDb", "Login Gagal Username dan Password tidak valid");
			    return false;
		    }
        }

        

        public function logout()
        {
            $this->session->unset_userdata('logged_in');
		    $this->session->sess_destroy();
		    redirect('Login','refresh');
        }
    
    }
    
    /* End of file Controllername.php */
    
?>