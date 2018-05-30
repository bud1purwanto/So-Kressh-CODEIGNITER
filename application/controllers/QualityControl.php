<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class QualityControl extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('QualityControl_Model');
            
        } 

        public function index()
        {
            $data['title'] = "Data Quality Control";
            $data['data_kualitas'] = $this->QualityControl_Model->showKualitas();
            $this->load->view('qualitycontrol/header', $data);
            $this->load->view('qualitycontrol/qualitycontrol', $data);
            $this->load->view('qualitycontrol/footer', $data);
        }
         
        public function add()
        {
            $data['title'] = "Add Quality Control";

            $this->form_validation->set_rules('kualitasBarang', 'kualitasBarang', 'trim|required');

            $data['data_kualitas'] = $this->QualityControl_Model->showKualitas();

            if ($this->form_validation->run()==FALSE) {
                $this->load->view('qualitycontrol/header', $data);
                $this->load->view('qualitycontrol/qualitycontrol');
                $this->load->view('qualitycontrol/footer', $data);
            } else { 
                $this->QualityControl_Model->insertKualitas();
                $this->session->set_flashdata('sudah_input', 'Kualitas sudah ditambah!');	
                redirect('QualityControl','refresh');
            }
        }

        public function edit($idKualitas)
        {
            $data['title'] = "Edit Quality Control";
            $data['get_kualitas']=$this->QualityControl_Model->getKualitasById($idKualitas);

            $this->form_validation->set_rules('kualitasBarang', 'kualitasBarang', 'trim|required');
        
            if($this->form_validation->run()==FALSE){
                $this->load->view('qualitycontrol/header', $data);
                $this->load->view('qualitycontrol/edit_qualitycontrol');
                $this->load->view('qualitycontrol/footer', $data);

            }else{
                $this->QualityControl_Model->editKualitas($idKualitas);
                redirect('QualityControl','refresh');
            }
        }

        public function delete($idKualitas)
        {
                $terdaftar=$this->QualityControl_Model->kualitasTerdaftar($idKualitas);
                if ($terdaftar) {
                    $this->session->set_flashdata('fail', 'Tidak dapat menghapus, Kualitas tersebut telah terdaftar dalam pengadaan dan gudang! Silahkan hapus yang bersangkutan terlebih dahulu.');
                    redirect('QualityControl','refresh');
                } else {
                    $this->session->set_flashdata('terhapus', 'Kualitas Berhasil Dihapus');
                    $this->QualityControl_Model->deleteKualitas($idKualitas);
                    redirect('QualityControl', 'refresh');
                }
        }
    }
    
    /* End of file QualityControl.php */
    
?>