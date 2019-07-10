<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_summary extends CI_Model {
	public function select_all_report() {
		$sql = "SELECT * FROM guest";

		$data = $this->db->query($sql);

		return $data->result();
	}

        public function select_by_idevent($id_event) {
		$sql = "SELECT * FROM event WHERE id = '{$id_event}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_guest($id_event) {
		$sql = " SELECT guest.id AS id, guest.fullname AS guest, guest.phone AS phone, guest.company AS company, guest.email AS email, event.title AS title FROM guest, event WHERE guest.id_event = event.id AND guest.id_event={$id_event}";

		$data = $this->db->query($sql);

		return $data->result();
	}  
        
	public function select_all() {

             $this->db->select("employee.id as id, event.id as id_event, event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
        $this->db->from(" guest, event, employee");
        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
        $this->db->group_by('guest.id_event');
        $data = $this->db->get();
        return $data->result();
      
    }
	
    public function select_by_id($id) {
        $sql = "SELECT event.id as id_event, event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest from guest, event, employee WHERE guest.id_event=event.id AND event.id_employee=employee.id AND event.id = '{$id} group by guest.id_event'";
       
        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_by_guest_event_employee($id) {
		$sql = " SELECT event.id as id_event , guest.id AS id_guest,employee.id, guest.fullname AS fullname,guest.id_event, event.title AS title, guest.company AS company, guest.email AS email,guest.phone AS phone, employee.nik AS nik, employee.name AS name, employee.phone AS phone, employee.email AS email, employee.posisition AS posisition, employee.image AS image, event.date AS date,event.id_employee FROM guest, event, employee WHERE guest.id_event = event.id AND event.id_employee = employee.id AND employee.id={$id}";

		$data = $this->db->query($sql);

		return $data->result();
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
        $sql = "SELECT event.id AS id, event.title AS title FROM EVENT, employee where event.id_employee = employee.id AND employee.id={$id}";

        $data = $this->db->query($sql);

        return $data->result();
    }

	public function check_nama($title) {
		$this->db->where('title', $title);
		$data = $this->db->get('event');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('event');

		return $data->num_rows();
	}
        
        
//        
//       public function select_all_report() {
//        $sql = "SELECT * FROM guest";
//
//        $data = $this->db->query($sql);
//
//        return $data->result();
//    }

//    public function select_all() {
//        $this->db->select("event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest ");
//        $this->db->from(" guest, event, employee");
//        $this->db->where('guest.id_event=event.id AND event.id_employee=employee.id '); //Nama table nya saya asumsikan tanggal_awal yaa gan hehe 
//        $this->db->group_by('guest.id_event');
//        $data = $this->db->get();
//        return $data->result();
//    }

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
        
        
}