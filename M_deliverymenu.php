<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_deliverymenu extends CI_Model {

    private $_table = "delivery";
    public $id_delivery;
    public $type_deliv;
    public $sub_type;
    public $no_resi;
    public $nik;
    public $jmlh_barang;
    public $jenis_barang;
    public $front_desk;
    public $deliv_status;
    public $date_time;
    public $id_barang;

    public function rules()
    {
        return [
            [ 'id_delivery', 'id_delivery', 'required'],
            [ 'type_deliv', 'type_deliv', 'required'],
            [ 'sub_type', 'sub_type', 'required'],
            [ 'no_resi', 'no_resi', 'required'],
            [ 'nik', 'nik', 'required'],
            [ 'jmlh_barang', 'jmlh_barang', 'required'],
            [ 'jenis_barang', 'jenis_barang', 'required'],
            [ 'front_desk', 'front_desk', 'required'],
            [ 'deliv_status', 'deliv_status', 'required'],
            [ 'date_time', 'date_time', 'required'],
            [ 'id_barang', 'id_barang', 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id_delivery)
    {
        return $this->db->get_where($this->_table, ["id_delivery" => $id_delivery])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_delivery = uniqid();
        $this->type_deliv = $post["type_deliv"];
        $this->sub_type = $post["no_resi"];
        $this->nik = $post["nik"];
        $this->jmlh_barang = $post["jmlh_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->front_desk = $post["front_desk"];
        $this->deliv_status = $post["deliv_status"];
        $this->date_time = $post["date_time"];
        $this->id_barang = $post["id_barang"];
        $this->db->insert($this->delivery, $this);
    }

    // public function update()
    // {
    //     $post = $this->input->post();
    //     $this->id_delivery = $post["id_delivery"];
    //     $this->type_deliv = $post["type_deliv"];
    //     $this->sub_type = $post["no_resi"];
    //     $this->nik = $post["nik"];
    //     $this->jmlh_barang = $post["jmlh_barang"];
    //     $this->jenis_barang = $post["jenis_barang"];
    //     $this->front_desk = $post["front_desk"];
    //     $this->deliv_status = $post["deliv_status"];
    //     $this->date_time = $post["date_time"];
    //     $this->id_barang = $post["id_barang"];
    //     $this->db->update($this->_table, $this, array('id_delivery' => $post['id_delivery']));
    // }

    // public function delete($id_delivery)
    // {
    //     return $this->db->delete($this->_table, array("id_delivery" => $id_delivery));
    // }

    public function select_all_delivery() {
        $data = $this->db->get('delivery');

        return $data->result();
    }

    // public function get_data($idDeliv) {
    //     $sql = " select DATE(date_time) as date, count(name) AS jmlh from delivery group by YEAR(date_time), MONTH(date_time),DAY(date_time)";
    //     $data = $this->db->query($sql);

    //     return $data->row();
    // }

    public function select_by_id($id) {
        $sql = "SELECT * FROM delivery WHERE id_delivery = '{$idDeliv}'";

        $data = $this->db->query($sql);
        
        
        return $data->row();
    }

    public function select_by_jmlh($idDeliv) {
        $sql = "SELECT COUNT(*) AS jmlh FROM delivery WHERE id_delivery = {$idDeliv}";
        // $sql = "SELECT * FROM delivery WHERE id_delivery = {$idDeliv}";
        $data = $this->db->query($sql);

        return $data->row();
    }

    public function select_by_type() {
        $sql = "SELECT * FROM delivery WHERE delivery.type_deliv = 'Online Shop'  ";
        // $sql = "SELECT * FROM delivery WHERE id_delivery = {$idDeliv}";
        $data = $this->db->query($sql);

        return $data->result();
    }

     public function select_by_frontd() {
        $sql = "SELECT * FROM delivery WHERE delivery.front_desk= 'Mega'  ";
        // $sql = "SELECT * FROM delivery WHERE id_delivery = {$idDeliv}";
        $data = $this->db->query($sql);

        return $data->result();
    }

    public function insertd($data) {
        // $sql = "INSERT INTO delivery VALUES('','" . $data['id_delivery'] . "','" . $data['type_deliv'] . "','" . $data['sub_type'] . "','" . $data['no_resi'] . "','" . $data['nik'] . "','" . $data['jmlh_barang'] . "','" . $data['jenis_barang'] . "','" . $data['front_desk'] . "','" . $data['deliv_status'] . "','" . $data['date_time'] . "','" . $data['id_barang'] . "')";
        // $sql = "INSERT INTO `delivery` (`id_delivery`, `type_deliv`, `sub_type`, `no_resi`, `nik`, `jmlh_barang`, `jenis_barang`, `front_desk`, `deliv_status`, `date_time`, `id_barang`) VALUES (NULL, 'E-commerce', 'Shopee', '12345', '09876', '4', 'pakaian', 'mega', 'Belum Diambil', '2019-07-01 09:38:23', '33');"

        // $this->db->query($sql);

        return $this->db->insert('delivery', $data);
    }

    // public function insert_batch($data) {
    //     $this->db->insert_batch('delivery', $data);

    //     return $this->db->affected_rows();
    // }

    public function select_all() {
        $sql = " SELECT delivery.id_delivery AS id_delivery, delivery.type_deliv AS type_deliv, delivery.sub_type AS sub_type, delivery.no_resi AS no_resi, delivery.nik AS nik , delivery.jmlh_barang AS jmlh_barang, delivery.jenis_barang AS jenis_barang, delivery.front_desk AS front_desk, delivery.deliv_status AS deliv_status, delivery.date_time AS date_time, delivery.id_barang AS id_barang, DATE(date_time) AS date FROM delivery WHERE delivery.id_delivery = delivery.id_delivery";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function select_by_countype() {
        $sql = " SELECT delivery.id_delivery as id_delivery, delivery.date_time as date_time, delivery.nik as nik, delivery.jenis_barang as jenis_barang, delivery.jmlh_barang as jmlh_barang, SUM(delivery.jmlh_barang) AS totalkirim, delivery.type_deliv as type_deliv, delivery.sub_type as sub_type, FROM delivery WHERE delivery.nik = delivery.nik GROUP BY delivery.jmlh_barang order BY delivery.id_delivery";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function update($data) {
        $sql = "UPDATE delivery SET  id_delivery='" .$data['id_delivery'] ."', type_deliv=" .$data['type_deliv'] .", sub_type='" .$data['sub_type'] ."', no_resi='" .$data['no_resi'] ."', nik='" .$data['nik'] ."', jmlh_barang='" .$data['jmlh_barang'] ."', jenis_barang='" .$data['jenis_barang'] ."', front_desk='" .$data['front_desk'] ."', deliv_status='" .$data['deliv_status'] ."', date_time='" .$data['date_time'] ."', id_barang='" .$data['id_barang'] ."' WHERE id_delivery='" .$data['id_delivery'] ."'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }
//
    public function deleteDeliv($idDeliv) {
        $sql = "DELETE FROM delivery WHERE id_delivery='" .$idDeliv ."'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function check_status($StatusD) {
        $this->db->where('deliv_status', $StatusD);
        $data = $this->db->get('delivery');

        return $data->num_rows();
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

    // //belum selesai//
    // public function updateDeliv($data) {
    //     // $sql = "UPDATE delivery SET id_delivery='" . $data['id_delivery'] . "',type_deliv='" . $data['type_deliv'] . "', sub_type='" . $data['sub_type'] . "', no_resi='" . $data['no_resi'] . "', nik='" . $data['nik'] . "', name='" . $data['name'] . "', jmlh_barang='" . $data['jmlh_barang'] . "',jenis_barang='" . $data['jenis_barang'] . "',front_desk='" . $data['front_desk'] . "', deliv_status='" . $data['deliv_status'] . "', date_time='" . $data['date_time'] . "', created_at='" . $data['created_at'] . "', updated_at='" . $data['updated_at'] . "', id_barang='" . $data['id_barang'] . "' WHERE id_delivery='" . $data['id_delivery'] . "'";

    //     $sql = "UPDATE delivery SET id_delivery='" . $data['id_delivery'] . "',type_deliv='" . $data['type_deliv'] . "', sub_type='" . $data['sub_type'] . "', no_resi='" . $data['no_resi'] . "', nik='" . $data['nik'] . "', name='" . $data['name'] . "', jmlh_barang='" . $data['jmlh_barang'] . "',jenis_barang='" . $data['jenis_barang'] . "',front_desk='" . $data['front_desk'] . "', deliv_status='" . $data['deliv_status'] . "', date_time='" . $data['date_time'] . "' WHERE id_delivery='" . $data['id_delivery'] . "'";

    //     $this->db->query($sql);

    //     return $this->db->affected_rows();
    // }

    // public function deleteDeliv($idDeliv) {
    //     $sql = "DELETE FROM delivery WHERE id_delivery='" . $id_delivery . "'";
    //     // $this->_deleteImage($id);

    //     $this->db->query($sql);

    //     return $this->db->affected_rows();
    // }

}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */

