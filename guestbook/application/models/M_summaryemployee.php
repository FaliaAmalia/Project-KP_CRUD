<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_summaryemployee extends CI_Model {
	public function select_all_event() {
		$sql = "select employee.id as id,employee.image as image, employee.name as host,employee.posisition as posisition, COUNT(event.id_employee) AS jumlahevent from employee, event where event.id_employee=employee.id GROUP BY employee.id order by employee.id";

		$data = $this->db->query($sql);

		return $data->result();
	}
        public function select_all_eventid($id) {
		$sql = "select employee.id as id,employee.image as image, employee.name as host, COUNT(event.id_employee) AS jumlahevent from employee, event where event.id_employee=employee.id AND employee.id={$id} GROUP BY employee.id order by employee.id";

		$data = $this->db->query($sql);

		return $data->result();
	}
public function select_all_guest() {
		$sql = "select  COUNT(guest.id_event) AS totalguest from employee, guest,event where guest.id_event=event.id AND event.id_employee=employee.id GROUP BY employee.id ";

		$data = $this->db->query($sql);

		return $data->result();
	}
   public function select_by_idguest($id) {
		$sql = "select event.title as title, employee.id AS id, COUNT(guest.id_event) AS totalguest from employee, guest,event where guest.id_event=event.id AND event.id_employee=employee.id AND employee.id={$id} GROUP BY employee.id";

		$data = $this->db->query($sql);

		return $data->result();
	}     
     public function select_by_id($id) {
        $sql = "SELECT * FROM event WHERE id = '{$id}'";

        $data = $this->db->query($sql);

        return $data->row();
    }
    
    public function select_by_idevent($id) {
		$sql = "select event.date as date, event.title as title , count(guest.id_event) as jumlahguest from event, guest,employee where guest.id_event=event.id AND employee.id=event.id_employee AND employee.id='{$id}' group BY event.id";
		$data = $this->db->query($sql);

		return $data->result();
	} 
    
}