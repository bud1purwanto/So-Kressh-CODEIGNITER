<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_Model extends CI_Model {
	public function insertGudang()
	{
		$insert = $this->input->post();
		$this->db->insert('gudangBahanJadi', $insert);
	}
 
	public function showGudang()
	{
		$this->db->select("gudangBahanJadi.idGudangBahanJadi, gudangBahanJadi.namaProduk, gudangBahanJadi.jumlah, gudangBahanJadi.harga, produksi.idProduksi,produksi.namaBarang, qualitycontrol.idKualitas, qualitycontrol.kualitasBarang");
		$this->db->join('produksi', 'produksi.idProduksi = gudangBahanJadi.idProduksi', 'left');
		$this->db->join('qualitycontrol','qualitycontrol.idKualitas = gudangBahanJadi.idKualitas', 'left');
		$this->db->order_by('namaProduk', 'desc');
		$query = $this->db->get('gudangBahanJadi');
		return $query->result();
	}
 
	public function getGudang()
	{
		$query = $this->db->get('produksi');
		return $query->result();
	}
	public function getKualitas()
	{
		$query = $this->db->get('qualitycontrol');
		return $query->result();
	}

	public function getGudangById($idGudangBahanJadi)
	{
		$this->db->select("idGudangBahanJadi, namaProduk, jumlah, harga, idProduksi, idKualitas");
		$this->db->where('idGudangBahanJadi', $idGudangBahanJadi);
		$query = $this->db->get('gudangBahanJadi');
		return $query->result();
	}

	public function editGudang($idGudangBahanJadi)
	{
		// $edit = array(

		// 		'namaBarang' => $this->input->post('namaBarang'),
		// 		'harga' => $this->input->post('harga'),
		// 		'idPengadaan' => $this->input->post('idPengadaan'),
		// 	);
		$edit = $this->input->post();
		$this->db->where('idGudangBahanJadi', $idGudangBahanJadi);
		$this->db->update('gudangBahanJadi', $edit);
	}
	
	public function deleteGudang($idGudangBahanJadi)
    {
	 	$this->db->where('idGudangBahanJadi', $idGudangBahanJadi);
	 	$this->db->delete('gudangBahanJadi');
	}

	function gudangTerdaftar($idGudangBahanJadi) {
	    $this->db->select('idGudangBahanJadi');
	    $this->db->from('gudangBahanJadi');
	    $this->db->where('idGudangBahanJadi', $idGudangBahanJadi);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}

/* End of file Gudang_Model.php */
/* Location: ./application/models/Gudang_Model.php */ ?>	