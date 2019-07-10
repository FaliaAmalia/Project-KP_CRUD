<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
//	public function update($data, $id) {
//		$this->db->where("id", $id);
//		$this->db->update("admin", $data);
//
//		return $this->db->affected_rows();
//	}
 public function update($data, $id) {
        if ($this->session->userdata('akses') == '1') {
            $this->db->where("id", $id);
            $this->db->update("admin", $data);

            return $this->db->affected_rows();
        }else{
            $this->db->where("id", $id);
            $this->db->update("employee", $data);

            return $this->db->affected_rows();
        }
    }
	public function select($id = '') {
	        if ($this->session->userdata('akses') == '1') {
	
            if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
                }else {
                     if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('employee');

		return $data->row();
                }
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */