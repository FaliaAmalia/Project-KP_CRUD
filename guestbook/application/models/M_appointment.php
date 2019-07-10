<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_appointment extends CI_Model {

    public function select_all_appointment() {
        $sql = "SELECT * FROM appointment";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function get_data($id) {
//      $sql = "  select event.date, count(guest.id_event) AS jumlahguest from event , guest where event.id=guest.id_event group by event.date
//";
        $sql = " select DATE(datetime) as date, count(fullname) AS jumlahguest from appointment group by YEAR(datetime),MONTH(datetime),DAY(datetime)";

//        $result = $this->db->query($sql);
//
//        return $result;
        $data = $this->db->query($sql);

		return $data->row();
    }

    public function select_all() {
        $sql = " SELECT appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime,DATE(datetime) AS date FROM appointment, employee WHERE appointment.id_employee = employee.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_id($no) {
        $sql = "SELECT appointment.no AS no, appointment.fullname AS fullname,appointment.company AS company,appointment.id_type AS id_type,appointment.id AS id_appointment,appointment.id_employee, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime, employee.name AS name FROM appointment, employee WHERE appintment.id_employee = employee.id AND appointment.no = '{$no}'";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_by_employee($id) {
        $sql = "SELECT COUNT(*) AS jml FROM appointment WHERE id_employee = {$id}";

        $data = $this->db->query($sql);

        return $data->row();
    }

//	public function update($data) {
//		$sql = "UPDATE guest SET  fullname='" .$data['fullname'] ."', id_event=" .$data['event'] .", company='" .$data['company'] ."', email='" .$data['email'] ."', phone='" .$data['phone'] ."' WHERE id='" .$data['id'] ."'";
//
//		$this->db->query($sql);
//
//		return $this->db->affected_rows();
//	}
//
//	public function delete($id) {
//		$sql = "DELETE FROM guest WHERE id='" .$id ."'";
//
//		$this->db->query($sql);
//
//		return $this->db->affected_rows();
//	}
//
//	public function insert($data) {
//		//$id = md5(DATE('ymdhms').rand());
//		$sql = "INSERT INTO guest VALUES('','" .$data['fullname'] ."'," .$data['event'] .",'" .$data['company'] ."','" .$data['email'] ."','" .$data['phone']."')";
//
//		$this->db->query($sql);
//
//		return $this->db->affected_rows();
//	}
//
//	public function insert_batch($data) {
//		$this->db->insert_batch('guest', $data);
//		
//		return $this->db->affected_rows();
//	}

    public function check_nama($fullname) {
        $this->db->where('fullname', $fullname);
        $data = $this->db->get('appointment');

        return $data->num_rows();
    }

    public function total_rows() {
        $data = $this->db->get('appointment');

        return $data->num_rows();
    }

    public function view_by_date($date) {

        $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime ,DATE(datetime) AS date");
        $this->db->from(" appointment, employee ");
        $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->where('date(datetime)', $date);
        $data = $this->db->get();
        return $data->result();
    }

    public function view_by_month($month, $year) {

        $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime,DATE(datetime) AS date ");
        $this->db->from(" appointment, employee ");
        $this->db->where('MONTH(datetime)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(datetime)', $year); // Tambahkan where tahun
        $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 

        $data = $this->db->get();
        return $data->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year) {
        $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime,DATE(datetime) AS date ");
        $this->db->from(" appointment, employee ");
        $this->db->where('YEAR(datetime)', $year); // Tambahkan where tahun
        $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 

        $data = $this->db->get();
        return $data->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_all() {
        $sql = " SELECT appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime, DATE(datetime) AS date FROM appointment, employee WHERE appointment.id_employee = employee.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function option_tahun() {
        $this->db->select('YEAR(datetime) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('appointment'); // select ke tabel transaksi
        $this->db->order_by('YEAR(datetime)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(datetime)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

}
