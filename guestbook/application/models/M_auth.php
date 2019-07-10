<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
    public function login_employee($user, $pass) {
		$this->db->select('*');
		$this->db->from('employee');
		$this->db->where('nik', $user);
		$this->db->where('password', md5($pass));

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
    
	public function login($user, $pass) {
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('nik', $user);
		$this->db->where('password', md5($pass));


		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
//        public function login_staff($user, $pass) {
//		$this->db->select('*');
//		$this->db->from('staff');
//		$this->db->where('username', $user);
//		$this->db->where('password', md5($pass));
//
//		$data = $this->db->get();
//
//		if ($data->num_rows() == 1) {
//			return $data->row();
//		} else {
//			return false;
//		}
//	}
//      
        public function insert($data) {
        $sql = "INSERT INTO admin VALUES('','" . $data['username'] . "','" . $data['password'] . "','" . $data['nama'] . "','" . $data['foto'] . "')";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function insert_batch($data) {
        $this->db->insert_batch('admin', $data);

        return $this->db->affected_rows();
    }
     public function insert2($data) {
        $sql = "INSERT INTO staff VALUES('','" . $data['username'] . "','" . $data['password'] . "','" . $data['nama'] . "','" . $data['foto'] . "')";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function insert_batch2($data) {
        $this->db->insert_batch('staff', $data);

        return $this->db->affected_rows();
    }   
       public function select_by_id($id) {
		$sql = " SELECT id, staff.nama, staff.foto from staff where id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
     public function select_all() {
        $sql = " SELECT staff.id, staff.nama, staff.foto from staff";

        $data = $this->db->query($sql);

        return $data->result();
    }   
//     public function select_by_id($id) {
//        $sql = "SELECT * FROM staff WHERE id = '{$id}'";
//
//        $data = $this->db->query($sql);
//        
//        
//        return $data->row();
//    }
        public function delete($id) {
        $sql = "DELETE FROM staff WHERE id='" . $id . "'";
        $this->_deleteImage($id);

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    private function _deleteImage($id) {
        $product = $this->select_by_id($id);
        if ($product->foto != "default.jpg") {
            $filename = explode(".", $product->foto)[0];
            return array_map('unlink', glob(FCPATH . "../uploads/$filename.*"));
        }
    }
}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */