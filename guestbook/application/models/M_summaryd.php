<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_summaryd extends CI_Model {
    public function select_all() {
        // $sql = "SELECT * FROM delivery";
        
        // $data = $this->db->query($sql);
        $data = $this->db->get('delivery');

        return $data->result();

        // $sql = "SELECT delivery.id_delivery as id_delivery, COUNT(delivery.id_delivery) AS jmlhdelivery from delivery where delivery.type_deliv=delivery.type_deliv GROUP BY delivery.type_deliv order by delivery.type_deliv ";
    }

    public function select_by_countype() {
        $sql = " SELECT delivery.id_delivery as id_delivery, delivery.nik_pegawai as nik_pegawai, delivery.jenis_barang as jenis_barang, delivery.jmlh_barang as jmlh_barang, SUM(delivery.jmlh_barang) AS totalkirim FROM delivery WHERE delivery.nik_pegawai = delivery.nik_pegawai GROUP BY delivery.nik_pegawai order BY delivery.id_delivery";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_id() {
        $sql = "SELECT * FROM delivery WHERE id_delivery = '{$idDeliv}' ";

        $data = $this->db->query($sql);

        return $data->row();
    }

    // public function select_by_ideliv() {
    //   $sql = "SELECT delivery.id_delivery as id_delivery, delivery.type_deliv as type_deliv, delivery.sub_type as sub_type, delivery.no_resi as no_resi, delivery.nik_pegawai as nik_pegawai, delivery.jmlh_barang as jmlh_barang, delivery.jenis_barang as jenis_barang, delivery.front_desk as front_desk, delivery.deliv_status as deliv_status, delivery.id_barang as id_barang, delivery.date_time as date_time,  SUM(delivery.jmlh_barang) AS totalkirim from delivery where delivery.nik_pegawai = delivery.nik_pegawai";

    //   $data = $this->db->query($sql);

    //   return $data->result();
    // }     

    public function select_by_view() {
        $nik_pegawai = trim($_GET['nik_pegawai']);
        $sql = "SELECT * FROM delivery where delivery.nik_pegawai = '$nik_pegawai'";
       
        $data = $this->db->query($sql);

        return $data->result();
    }

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