<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class QualityControl_Model extends CI_Model {
    
        public function insertKualitas()
	    {
		    $insert = array(
				'kualitasBarang' => $this->input->post('kualitasBarang'),
			);
 
		    $this->db->insert('qualitycontrol', $insert);
        }
        
        public function showKualitas()
        {
            $this->db->select("qualitycontrol.idKualitas, qualitycontrol.kualitasBarang");
            $this->db->order_by('kualitasBarang', 'desc');
            $query = $this->db->get('qualitycontrol');
            return $query->result();
        }

        public function getKualitasById($idKualitas)
        {
            $this->db->select("idKualitas, kualitasBarang");
            $this->db->where('idKualitas', $idKualitas);
            $query = $this->db->get('qualitycontrol');
            return $query->result();
        }

        public function editKualitas($idKualitas)
        {
            $edit = array(
                'kualitasBarang' => $this->input->post('kualitasBarang'), 
            );
            $this->db->where('idKualitas', $idKualitas);
            $this->db->update('qualitycontrol', $edit);
        }
	
        public function deleteKualitas($idKualitas)
        {
            $this->db->where('idKualitas', $idKualitas);
            $this->db->delete('qualitycontrol');
        }
        
        function kualitasTerdaftar($idKualitas) {
            $this->db->select('idKualitas');
            $this->db->from('qualitycontrol');
            $this->db->where('idKualitas', $idKualitas);
            $query = $this->db->get();
    
            if ($query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }

    
    }
    
    /* End of file ModelName.php */
    
?>