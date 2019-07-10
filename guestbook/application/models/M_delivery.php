<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_delivery extends CI_Model {

    public function select_all_delivery() {
        $data = $this->db->get('delivery');

        return $data->result();

        // $sql = "SELECT * FROM delivery";

        // $data = $this->db->query($sql);

        // return $data->result();
    }

  //   public function get_data($id) {
  //       $sql = " select DATE(datetime) as date, count(fullname) AS jumlahguest from appointment group by YEAR(datetime),MONTH(datetime),DAY(datetime)";
  //       $data = $this->db->query($sql);

		// return $data->row();
  //   }

    public function select_all() {
        $sql = " SELECT delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik_pegawai AS nik_pegawai, delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.id_barang AS id_barang, delivery.date_time AS date_time, DATE(date_time) AS date FROM delivery WHERE delivery.id_delivery = id_delivery";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_delivery($idDeliv) {
        $sql = "SELECT appointment.no AS no, appointment.fullname AS fullname,appointment.company AS company,appointment.id_type AS id_type,appointment.id AS id_appointment,appointment.id_employee, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime, employee.name AS name FROM appointment, employee WHERE appintment.id_employee = employee.id AND appointment.no = '{$no}'";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_by_id($idDeliv) {
        $sql = "SELECT COUNT(*) AS jmlh FROM delivery WHERE id_delivery = {$idDeliv}";

        $data = $this->db->query($sql);

        return $data->row();
    }

	public function update($data) {
		$sql = "UPDATE delivery SET  id_delivery='" .$data['id_delivery'] ."', type_deliv=" .$data['type_deliv'] .", sub_type='" .$data['sub_type'] ."', no_resi='" .$data['no_resi'] ."', nik_pegawai='" .$data['nik_pegawai'] ."', name='" .$data['name'] ."', jmlh_barang='" .$data['jmlh_barang'] ."', jenis_barang='" .$data['jenis_barang'] ."', front_desk='" .$data['front_desk'] ."', deliv_status='" .$data['deliv_status'] ."', date_time='" .$data['date_time'] ."', id_barang='" .$data['id_barang'] ."' WHERE id_delivery='" .$data['id_delivery'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
//
	public function delete($id) {
		$sql = "DELETE FROM delivery WHERE id_delivery='" .$idDeliv ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
//
	public function insert($data) {
		//$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO delivery VALUES('','" .$data['id_delivery'] ."'," .$data['type_deliv'] .",'" .$data['sub_type'] ."','" .$data['no_resi'] ."','" .$data['nik_pegawai']."','" .$data['name']."','" .$data['jmlh_barang']."','" .$data['jenis_barang']."','" .$data['front_desk']."','" .$data['deliv_status']."','" .$data['date_time']."','" .$data['id_barang']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('delivery', $data);
		
		return $this->db->affected_rows();
	}

    public function check_nama($Name) {
        $this->db->where('name', $Name);
        $data = $this->db->get('delivery');

        return $data->num_rows();
    }

    public function total_rows() {
        $data = $this->db->get('delivery');

        return $data->num_rows();
    }

    public function view_by_date($date) {
        $this->db->select("delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik_pegawai AS nik_pegawai, delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.date_time AS date_time, delivery.id_barang AS id_barang, DATE(date_time) AS date_time");
        $this->db->from("delivery");
        $this->db->where('delivery.id_delivery = id_delivery');
        $this->db->where('date(date_time)', $date);
        $data = $this->db->get();
        return $data->result();


        // $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime ,DATE(datetime) AS date");
        // $this->db->from(" appointment, employee ");
        // $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        // $this->db->where('date(datetime)', $date);
        // $data = $this->db->get();
        // return $data->result();
    }

    public function view_by_month($month, $year) {
        $this->db->select("delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik_pegawai AS nik_pegawai, delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.date_time AS date_time, delivery.id_barang AS id_barang, DATE(date_time) AS date_time");
        $this->db->from("delivery");
        $this->db->where('MONTH(date_time)', $month);
        $this->db->where('YEAR(date_time)', $year);
        // $this->db->where('date(date_time)', $date);
        $this->db->where('delivery.id_delivery = id_delivery');
        $data = $this->db->get();
        return $data->result();


        // $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime,DATE(datetime) AS date ");
        // $this->db->from(" appointment, employee ");
        // $this->db->where('MONTH(datetime)', $month); // Tambahkan where bulan
        // $this->db->where('YEAR(datetime)', $year); // Tambahkan where tahun
        // $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 

        // $data = $this->db->get();
        // return $data->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year) {
        $this->db->select("delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik_pegawai AS nik_pegawai, delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.date_time AS date_time, delivery.id_barang AS id_barang, DATE(date_time) AS date_time");
        $this->db->from("delivery");
        // $this->db->where('MONTH(date_time)', $month);
        $this->db->where('YEAR(date_time)', $year);
        // $this->db->where('date(date_time)', $date);
        $this->db->where('delivery.id_delivery = id_delivery');
        $data = $this->db->get();
        return $data->result();

        // $this->db->select("appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime,DATE(datetime) AS date ");
        // $this->db->from(" appointment, employee ");
        // $this->db->where('YEAR(datetime)', $year); // Tambahkan where tahun
        // $this->db->where('appointment.id_employee = employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 

        // $data = $this->db->get();
        // return $data->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_all() {
        $sql = " SELECT delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik_pegawai AS nik_pegawai, delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.date_time AS date_time, delivery.id_barang AS id_barang FROM delivery WHERE delivery.id_delivery = delivery.id_delivery";

        // $sql = " SELECT appointment.fullname AS fullname, appointment.company AS company, appointment.id_type AS id_type,employee.name AS host, appointment.id AS id, employee.name AS name, appointment.image AS image, appointment.interest AS interest, appointment.datetime AS datetime, DATE(datetime) AS date FROM appointment, employee WHERE appointment.id_employee = employee.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function option_tahun() {
        $this->db->select('YEAR(date_time) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('delivery'); // select ke tabel transaksi
        $this->db->order_by('YEAR(date_time)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date_time)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

}
