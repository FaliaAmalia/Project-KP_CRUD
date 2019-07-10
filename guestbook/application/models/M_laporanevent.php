<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporanevent extends CI_Model {

    public function select_all_event() {
        $sql = "SELECT event.id AS id, event.title AS title, event.date AS date, employee.name AS employee from event, employee WHERE event.id_employee = employee.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_id($id) {
        $sql = "SELECT * FROM event WHERE id = '{$id}'";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_detail_event($id) {
        $sql = "SELECT event.id AS id, event.title AS title, event.date AS date, employee.name AS employee from event, employee WHERE event.id_employee = employee.id AND event.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_detail_guest($id) {
        $sql = "SELECT guest.id AS id, guest.fullname AS fullname, event.title AS event, guest.company AS company, guest.email AS email, guest.phone AS phone from guest, event, employee WHERE guest.id_event = event.id AND event.id_employee = employee.id AND event.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_employee($id) {
        $sql = "SELECT COUNT(*) AS jml FROM event WHERE id_employee = {$id}";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_filter_guest($id, $id2) {
        $sql = "SELECT guest.id AS id, guest.fullname AS fullname, event.title AS event, guest.company AS company, guest.email AS email, guest.phone AS phone from guest, event, employee WHERE guest.id_event = event.id AND event.id_employee = employee.id AND employee.id={$id} AND event.id={$id2}";

        $data = $this->db->query($sql);

        return $data->result();
    }

}
