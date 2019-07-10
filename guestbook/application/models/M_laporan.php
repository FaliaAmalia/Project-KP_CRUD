<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

    public function select_all_employee() {
        $sql = "SELECT employee.id AS id, employee.name AS name, employee.nik AS nik, employee.posisition AS posisition from employee";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_id($id) {
        $sql = "SELECT * FROM employee WHERE id = '{$id}'";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_detail_employee($id) {
        $sql = "SELECT employee.id AS id, employee.name AS name, employee.nik AS nik, employee.posisition AS posisition, employee.image AS image from employee WHERE employee.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_detail_guest($id) {
        $sql = "SELECT guest.id AS id, guest.fullname AS fullname, event.title AS event, guest.company AS company, guest.email AS email, guest.phone AS phone from guest, event, employee WHERE guest.id_event = event.id AND event.id_employee = employee.id AND employee.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_event($id) {
        $sql = "SELECT event.id AS id, event.title AS title FROM event, employee where event.id_employee = employee.id AND employee.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_filter_guest($id, $id2) {
        $sql = "SELECT guest.id AS id, guest.fullname AS fullname, event.title AS event, guest.company AS company, guest.email AS email, guest.phone AS phone from guest, event, employee WHERE guest.id_event = event.id AND event.id_employee = employee.id AND employee.id={$id} AND event.id={$id2}";

        $data = $this->db->query($sql);

        return $data->result();
    }


}
