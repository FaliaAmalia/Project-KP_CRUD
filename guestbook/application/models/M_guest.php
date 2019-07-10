<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guest extends CI_Model {
	public function select_all_guest() {
		$sql = "SELECT * FROM guest";

		$data = $this->db->query($sql);

		return $data->result();
	}
        
        
        
        public function search_guest($phone){
        $this->db->like('phone', $phone , 'both');
        $this->db->order_by('phone', 'ASC');
        $this->db->limit(10);
        return $this->db->get('guest')->result();
    }

	public function select_all() {
		$sql = " SELECT guest.id AS id, guest.fullname AS guest, event.title AS event, guest.company AS company, guest.email AS email, guest.phone AS phone FROM guest, event WHERE guest.id_event = event.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT guest.id AS id_guest, guest.fullname AS fullname_guest,guest.id_event, guest.company AS company, guest.email AS email, guest.phone AS phone, event.title AS event FROM guest, event WHERE guest.id_event = event.id AND guest.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_event($id) {
		$sql = "SELECT COUNT(*) AS jml FROM guest WHERE id_event = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}
	
        public function select_by_employee($id) {
		$sql = "SELECT COUNT(*) AS jml FROM event WHERE id_employee = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE guest SET  fullname='" .$data['fullname'] ."', id_event=" .$data['event'] .", company='" .$data['company'] ."', email='" .$data['email'] ."', phone='" .$data['phone'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM guest WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($phone, $fullname, $event,$company,$email) {
		//$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO guest VALUES('','" .$fullname ."'," .$event .",'" .$company ."','" .$email ."','" .$phone ."','Not present','')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('guest', $data);
		
		return $this->db->affected_rows();
	}
//         public function insert_batch($data){
//    return $this->db->insert_batch('guest', $data);
//  }

	public function check_nama($fullname) {
		$this->db->where('fullname', $fullname);
		$data = $this->db->get('guest');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('guest');

		return $data->num_rows();
	}
}
