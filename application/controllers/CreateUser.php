<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class CreateUser extends CI_Controller {
    
        public function index()
        {
            
           $this->load->view('createUser');
            
        }

        public function createDataUser()
        {
            // idPegawai = 1
            
            $this->load->helper('url','form');  
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'username', 'trim|required|is_unique[user.username]');
            $this->form_validation->set_rules('password', 'password', 'trim|required');     
            $this->load->model('User');    
            if($this->form_validation->run()==FALSE){
                echo '<script type="text/javascript">alert("Anda Gagal Insert Data, Gunakan Username Lain!")</script>';
                $this->load->view('createUser');
            }else{
                    $this->User->insertUser();  
                    echo '<script type="text/javascript">alert("Anda Berhasil Insert User!")</script>';
                    redirect('Login','refresh');
            } 

                 
            
        }
    
    }
    
    /* End of file Controllername.php */
    
?>