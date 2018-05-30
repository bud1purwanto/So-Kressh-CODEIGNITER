<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengadaan_Model extends CI_Model {
	public function insertPengadaan()
	{
		$insert = array(
				'namaBahan' => $this->input->post('namaBahan'),
				'jumlah' => $this->input->post('jumlah'),
				'harga' => $this->input->post('harga'),
				'idKualitas' => $this->input->post('idKualitas'),
			);

		$this->db->insert('pengadaan', $insert);
	}

	public function showPengadaan()
	{
		$this->db->select("pengadaan.idPengadaan, pengadaan.namaBahan, pengadaan.jumlah, pengadaan.harga, qualitycontrol.idKualitas, qualitycontrol.kualitasBarang");
		$this->db->join('qualitycontrol', 'qualitycontrol.idKualitas = pengadaan.idKualitas', 'left');
		$this->db->order_by('namaBahan', 'desc');
		$query = $this->db->get('pengadaan');
		return $query->result();
	}

	public function getKualitas()
	{
		$this->db->select("idKualitas, kualitasBarang");
		$query = $this->db->get('qualitycontrol');
		return $query->result();
	}

	public function getPengadaanById($idPengadaan)
	{
		$this->db->select("idPengadaan, namaBahan, jumlah, harga, idKualitas");
		$this->db->where('idPengadaan', $idPengadaan);
		$query = $this->db->get('pengadaan');
		return $query->result();
	}

	public function editPengadaan($idPengadaan)
	{
		$edit = array(
			'namaBahan' => $this->input->post('namaBahan'), 
			'jumlah' => $this->input->post('jumlah'),
			'harga' => $this->input->post('harga'),
			'idKualitas' => $this->input->post('idKualitas'),
		);
		$this->db->where('idPengadaan', $idPengadaan);
		$this->db->update('pengadaan', $edit);
	}
	
	public function deletePengadaan($idPengadaan)
    {
	 	$this->db->where('idPengadaan', $idPengadaan);
	 	$this->db->delete('pengadaan');
	}

	function pengadaanTerdaftar($idPengadaan) {
	    $this->db->select('idPengadaan');
	    $this->db->from('produksi');
	    $this->db->where('idPengadaan', $idPengadaan);
	    $query = $this->db->get();

	    if ($query->num_rows() > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}
}

/* End of file Pengadaan_Model.php */
/* Location: ./application/models/Pengadaan_Model.php */ ?>