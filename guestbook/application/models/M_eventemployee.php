<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_eventemployee extends CI_Model {

public function select_eventemployee($id) {
		$sql = "SELECT event.id AS id, event.title AS title, event.date AS date, event.address AS address,event.description AS description,event.firsttime AS firsttime,event.endtime AS endtime , employee.name AS name FROM event, employee WHERE event.id_employee = employee.id AND employee.id={$id}";

		$data = $this->db->query($sql);

		return $data->result();

                
}
}