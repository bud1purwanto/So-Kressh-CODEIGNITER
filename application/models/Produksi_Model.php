<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_Model extends CI_Model {
	public function insertProduksi()
	{
		$insert = array(
				'namaBarang' => $this->input->post('namaBarang'),
				'harga' => $this->input->post('harga'),
				'idPengadaan' => $this->input->post('idPengadaan'),
			);

		$this->db->insert('produksi', $insert);
	}

	public function showProduksi()
	{
		$this->db->select("produksi.idProduksi, produksi.namaBarang, produksi.harga, pengadaan.idPengadaan, pengadaan.namaBahan");
		$this->db->join('pengadaan', 'pengadaan.idPengadaan = produksi.idPengadaan', 'left');
		$this->db->order_by('namaBahan', 'desc');
		$query = $this->db->get('produksi');
		return $query->result();
	}

	public function getProduksi()
	{
		$this->db->select("idPengadaan, namaBahan");
		$query = $this->db->get('pengadaan');
		return $query->result();
	}

	public function getProduksiById($idProduksi)
	{
		$this->db->select("idProduksi, namaBarang, harga, idPengadaan");
		$this->db->where('idProduksi', $idProduksi);
		$query = $this->db->get('produksi');
		return $query->result();
	}

	public function editProduksi($idProduksi)
	{
		$edit = array(
				'namaBarang' => $this->input->post('namaBarang'),
				'harga' => $this->input->post('harga'),
				'idPengadaan' => $this->input->post('idPengadaan'),
			);
		$this->db->where('idProduksi', $idProduksi);
		$this->db->update('produksi', $edit);
	}
	
	public function deleteProduksi($idProduksi)
    {
	 	$this->db->where('idProduksi', $idProduksi);
	 	$this->db->delete('produksi');
	}

	function produksiTerdaftar($idPengadaan) {
	    $this->db->select('idPengadaan');
	    $this->db->from('pengadaan');
	    $this->db->where('idPengadaan', $idPengadaan);
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