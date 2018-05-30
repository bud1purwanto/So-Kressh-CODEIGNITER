<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengadaan_Model');
	}

	public function index()
	{
		$data['title'] = "Data Pengadaan";
		$data["kualitas"] = $this->Pengadaan_Model->getKualitas();
		$data['data_pengadaan'] = $this->Pengadaan_Model->showPengadaan();
		$this->load->view('pengadaan/header', $data);
		$this->load->view('pengadaan/pengadaan', $data);
		$this->load->view('pengadaan/footer', $data);
	}

	public function add()
 	{
 		$data['title'] = "Add Pengadaan";

 		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

		$data["kualitas"] = $this->Pengadaan_Model->getKualitas();
		$data['data_pengadaan'] = $this->Pengadaan_Model->showPengadaan();
 
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('pengadaan/header', $data);
			$this->load->view('pengadaan/pengadaan');
			$this->load->view('pengadaan/footer', $data);
		} else { 
			$this->Pengadaan_Model->insertPengadaan();
	    	$this->session->set_flashdata('sudah_input', 'Bahan sudah ditambah!');	
	   		redirect('pengadaan','refresh');
		}
	}

	public function edit($idPengadaan)
	{
	 	$data['title'] = "Edit Pengadaan";
		$data['get_pengadaan']=$this->Pengadaan_Model->getPengadaanById($idPengadaan);
		$data["kualitas"] = $this->Pengadaan_Model->getKualitas();

		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
	 
		if($this->form_validation->run()==FALSE){
			$this->load->view('pengadaan/header', $data);
			$this->load->view('pengadaan/edit_pengadaan');
			$this->load->view('pengadaan/footer', $data);

		}else{
			$this->Pengadaan_Model->editPengadaan($idPengadaan);
			redirect('pengadaan','refresh');
		}
	}

	public function delete($idPengadaan)
	{
			$terdaftar=$this->Pengadaan_Model->pengadaanTerdaftar($idPengadaan);
			if ($terdaftar) {
				$this->session->set_flashdata('fail', 'Tidak dapat menghapus, Pengadaan tersebut telah terdaftar dalam Produksi! Silahkan hapus produksi yang bersangkutan terlebih dahulu.');
				redirect('pengadaan','refresh');
			} else {
				$this->session->set_flashdata('terhapus', 'Pengadaan Berhasil Dihapus');
				$this->Pengadaan_Model->deletePengadaan($idPengadaan);
				redirect('pengadaan', 'refresh');
			}
	}
}

/* End of file Pengadaan.php */
/* Location: ./application/controllers/Pengadaan.php */ ?>