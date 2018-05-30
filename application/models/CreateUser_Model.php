<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class CreateUser_Model extends CI_Model {
    
        public function insertUser()
        {
            $password = $this->input->post('password');
            $object = array(
                    'username' => $this->input->post('username'),
                    'password' => md5($password)
                    );
            $this->db->insert('user', $object);
            //$this->db->insert('user', $data);
        }
    
    }
    
    /* End of file CreateUser_Model.php */
    
?>