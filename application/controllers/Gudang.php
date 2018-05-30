<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gudang_Model');
	}

	public function index()
	{
		$data['title'] = "Data Gudang";
		$data['data_gudang'] = $this->Gudang_Model->showGudang();
		$data["produksi"] = $this->Gudang_Model->getGudang();
		$data["kualitas"] = $this->Gudang_Model->getKualitas();
		$this->load->view('gudang/header', $data);
		$this->load->view('gudang/gudang', $data);
		$this->load->view('gudang/footer', $data);
	}

	public function add()
 	{
 		$data['title'] = "Add Data Gudang";

 		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

		$data["kualitas"] = $this->Gudang_Model->getGudang();
		$data['data_gudang'] = $this->Gudang_Model->showGudang();

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('gudang/header', $data);
			$this->load->view('gudang/gudang');
			$this->load->view('gudang/footer', $data);
		} else { 
			$this->Gudang_Model->insertGudang();
	    	$this->session->set_flashdata('sudah_input', 'Bahan sudah ditambah!');	
	   		redirect('Gudang','refresh');
		}
	}
 
	public function edit($idGudangBahanJadi)
	{
	 	$data['title'] = "Edit Data Gudang";
		$data['get_gudang']=$this->Gudang_Model->getGudangById($idGudangBahanJadi);
		$data["produksi"] = $this->Gudang_Model->getGudang();
		$data["kualitas"] = $this->Gudang_Model->getKualitas();

		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
	 
		if($this->form_validation->run()==FALSE){
			$this->load->view('gudang/header', $data);
			$this->load->view('gudang/edit_gudang', $data);
			$this->load->view('gudang/footer');
		}else{
			$this->Gudang_Model->editGudang($idGudangBahanJadi);
			redirect('gudang','refresh');
		}
	}

	public function delete($idGudangBahanJadi)
	{
			$terdaftar=$this->Gudang_Model->gudangTerdaftar($idGudangBahanJadi);
			if (!$terdaftar) {
				$this->session->set_flashdata('fail', 'Tidak dapat menghapus, Pengadaan tersebut telah terdaftar dalam Produksi! Silahkan hapus produksi yang bersangkutan terlebih dahulu.');
				redirect('gudang','refresh');
			} else {
				$this->session->set_flashdata('terhapus', 'Pengadaan Berhasil Dihapus');
				$this->Gudang_Model->deleteGudang($idGudangBahanJadi);
				redirect('gudang', 'refresh');
			}
	}
}

/* End of file Pengadaan.php */
/* Location: ./application/controllers/Pengadaan.php */ ?>