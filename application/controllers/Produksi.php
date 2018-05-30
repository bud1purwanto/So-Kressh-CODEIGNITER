<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Produksi_Model');
	}

	public function index()
	{
		$data['title'] = "Data Produksi";
		$data["namaBarang"] = $this->Produksi_Model->getProduksi();
		$data['data_produksi'] = $this->Produksi_Model->showProduksi();
		$this->load->view('Produksi/header', $data);
		$this->load->view('Produksi/produksi', $data);
		$this->load->view('Produksi/footer', $data);
	}

	public function add()
 	{
 		$data['title'] = "Add Produksi";

 		$this->form_validation->set_rules('namaBarang', 'namaBarang', 'trim|required');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');

		$data["namaBahan"] = $this->Produksi_Model->getProduksi();
		$data['data_produksi'] = $this->Produksi_Model->showProduksi();

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('Produksi/header', $data);
			$this->load->view('Produksi/produksi');
			$this->load->view('Produksi/footer', $data);
		} else { 
			$this->Produksi_Model->insertProduksi();
	    	$this->session->set_flashdata('sudah_input', 'Bahan sudah ditambah!');	
	   		redirect('Produksi','refresh');
		}
	}

	public function edit($idProduksi)
	{
	 	$data['title'] = "Edit Produksi";
		$data['get_produksi']=$this->Produksi_Model->getProduksiById($idProduksi);
		$data["namaBahan"] = $this->Produksi_Model->getProduksi();

		$this->form_validation->set_rules('namaBarang', 'namaBarang', 'trim|required');
 		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
	 
		if($this->form_validation->run()==FALSE){
			$this->load->view('Produksi/header', $data);
			$this->load->view('Produksi/edit_produksi');
			$this->load->view('Produksi/footer', $data);

		}else{
			$this->Produksi_Model->editProduksi($idProduksi);
			redirect('produksi','refresh');
		}
	}

	public function delete($idProduksi)
	{
			$terdaftar=$this->Produksi_Model->produksiTerdaftar($idProduksi);
			if ($terdaftar) {
				$this->session->set_flashdata('fail', 'Tidak dapat menghapus, Pengadaan tersebut telah terdaftar dalam Produksi! Silahkan hapus produksi yang bersangkutan terlebih dahulu.');
				redirect('produksi','refresh');
			} else {
				$this->session->set_flashdata('terhapus', 'Pengadaan Berhasil Dihapus');
				$this->Produksi_Model->deleteProduksi($idProduksi);
				redirect('produksi', 'refresh');
			}
	}
}

/* End of file Pengadaan.php */
/* Location: ./application/controllers/Pengadaan.php */ ?>