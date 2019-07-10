<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_summaryeco extends CI_Model {
    public function select_all() {
        // $sql = "SELECT * FROM delivery";
        
        // $data = $this->db->query($sql);
        $data = $this->db->get('delivery');

        return $data->result();

        // $sql = "SELECT delivery.id_delivery as id_delivery, COUNT(delivery.id_delivery) AS jmlhdelivery from delivery where delivery.type_deliv=delivery.type_deliv GROUP BY delivery.type_deliv order by delivery.type_deliv ";
    }

    public function select_by_countype() {
        $sql = " SELECT delivery.id_delivery AS id_delivery, delivery.sub_type AS sub_type, COUNT(delivery.sub_type) AS totalsub,  delivery.jenis_barang AS jenis_barang, delivery.jmlh_barang AS jmlh_barang, delivery.date_time AS date_time FROM delivery WHERE delivery.nik_pegawai = delivery.nik_pegawai GROUP BY delivery.sub_type order BY delivery.id_delivery";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_eco() {
        $sql = "SELECT delivery.type_vendor as type_delivv, delivery.subtype_vendor as sub_typev, delivery.date_time as date_time, count(delivery.subtype_vendor) as totalsub FROM delivery, subtype_delivery, type_delivery WHERE delivery.id_subtype_vendor = subtype_delivery.id_subtype_vendor , subtype_delivery.id_type_vendor = type_delivery.id_type_vendor AND delivery.type_vendor = 'E-Commerce'";
    }

    public function select_by_id() {
        $sql = "SELECT * FROM delivery WHERE id_delivery = '{$idDeliv}' ";

        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_by_view() {
        $sub_type = trim($_GET['sub_type']);
        $sql = "SELECT * FROM delivery where delivery.sub_type = '$sub_type'";
       
        $data = $this->db->query($sql);

        return $data->result();
    }

    // public function select_by_id($id) {
    //     $sql = "SELECT event.id as id_event, event.date as date, event.title as title, employee.name as host , count(guest.id_event ) AS jumlahguest from guest, event, employee WHERE guest.id_event=event.id AND event.id_employee=employee.id AND event.id = '{$id} group by guest.id_event'";
       
    //     $data = $this->db->query($sql);

    //     return $data->row();
    // }

    //     public function select_all_eventid($id) {
    //     $sql = "select employee.id as id,employee.image as image, employee.name as host, COUNT(event.id_employee) AS jumlahevent from employee, event where event.id_employee=employee.id AND employee.id={$id} GROUP BY employee.id order by employee.id";

    //     $data = $this->db->query($sql);

    //     return $data->result();
    // }

   //  public function select_all_guest() {
   //      $sql = "select COUNT(guest.id_event) AS totalguest from employee, guest,event where guest.id_event=event.id AND event.id_employee=employee.id GROUP BY employee.id ";

   //      $data = $this->db->query($sql);

   //      return $data->result();
   //  }

   // public function select_by_idguest($id) {
   //      $sql = "select event.title as title, employee.id AS id, COUNT(guest.id_event) AS totalguest from employee, guest,event where guest.id_event=event.id AND event.id_employee=employee.id AND employee.id={$id} GROUP BY employee.id";

   //      $data = $this->db->query($sql);

   //      return $data->result();
   //  }     
    
    // public function select_by_idevent($id) {
    //     $sql = "select event.date as date, event.title as title , count(guest.id_event) as jumlahguest from event, guest,employee where guest.id_event=event.id AND employee.id=event.id_employee AND employee.id='{$id}' group BY event.id";
    //     $data = $this->db->query($sql);

    //     return $data->result();
    // } 
    
}