<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {
	public function select_all_event() {
		$sql = "SELECT ev.*, emp.name as name  FROM event ev, employee emp WHERE ev.id_employee = emp.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		if ($this->session->userdata('akses')=='1'){
			$sql = " SELECT event.id AS id, event.title AS title, event.date AS date, event.address AS address,event.description AS description,event.firsttime AS firsttime,event.endtime AS endtime , employee.name AS name FROM event, employee WHERE event.id_employee = employee.id";

			$data = $this->db->query($sql);
		} else {
			$nik = $this->session->userdata('nik');
			$sql = " SELECT event.id AS id, event.title AS title, event.date AS date, event.address AS address,event.description AS description,event.firsttime AS firsttime,event.endtime AS endtime , employee.name AS name FROM event, employee WHERE event.id_employee = employee.id AND employee.nik = '$nik'";

			$data = $this->db->query($sql);
		}
		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT event.id AS id, event.title AS title, event.date AS date,event.address AS address,event.description AS description, event.firsttime AS firsttime, event.endtime AS endtime,event.id_employee, employee.name AS name FROM event, employee WHERE event.id_employee = employee.id AND event.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_employee($id) {
		$sql = "SELECT COUNT(*) AS jml FROM event WHERE id_employee = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE event SET title='" .$data['title'] ."', date='" .$data['date'] ."', address='" .$data['address'] ."', description='" .$data['description'] ."', firsttime='" .$data['firsttime'] ."',endtime='" .$data['endtime'] ."', id_employee='" .$data['name']."' WHERE id='" .$data['id'] ."'";
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM event WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
//		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO event VALUES('','" .$data['title'] ."','" .$data['date'] ."','" .$data['address'] ."','" .$data['description'] ."','" .$data['firsttime'] ."','" .$data['endtime'] ."','" .$data['name'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('event', $data);
		
		return $this->db->affected_rows();
	}

//	public function check_nama($nama) {
//		$this->db->where('nama', $nama);
//		$data = $this->db->get('pegawai');
//
//		return $data->num_rows();
//	}

	public function total_rows() {
		$data = $this->db->get('event');

		return $data->num_rows();
	}
        
        
        
        
        
        
        
        public function view_by_date($date) {
        // Tambahkan where tanggal nya
        $this->db->select("event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
        $this->db->from(" guest, event, employee");
        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->where('event.date', $date);
        $this->db->group_by('guest.id_event');
        $data = $this->db->get();
        return $data->result();
    }

    public function view_by_month($month, $year) {

        $this->db->select("event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
        $this->db->from(" guest, event, employee");
        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->where('MONTH(event.date)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(event.date)', $year);
        $this->db->group_by('guest.id_event');
        $data = $this->db->get();
        return $data->result();
    }

    public function view_by_year($year) {
        $this->db->select("event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
        $this->db->from(" guest, event, employee");
        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->where('YEAR(event.date)', $year);
        $this->db->group_by('guest.id_event');
        $data = $this->db->get();
        return $data->result();
    }

    public function view_all() {
        $this->db->select("event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
        $this->db->from(" guest, event, employee");
        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->group_by('guest.id_event');
        $data = $this->db->get();
        return $data->result();
    }

    public function option_tahun() {
        $this->db->select('YEAR(date) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('event'); // select ke tabel transaksi
        $this->db->order_by('YEAR(date)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date)'); // Group berdasarkan tahun pada field tgl

        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
    
    public function select_by_id_employee($id) {
		$sql = "SELECT employee.id AS id, event.title AS title, event.date AS date,event.address AS address,event.description AS description, event.firsttime AS firsttime, event.endtime AS endtime,event.id_employee, employee.name AS name FROM event, employee WHERE event.id_employee = employee.id AND employee.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}
    
}
