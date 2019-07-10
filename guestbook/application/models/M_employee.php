<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_employee extends CI_Model {

    public function select_all() {
        
        $data = $this->db->get('employee');

        return $data->result();
    }

    public function select_by_id($id) {
        $sql = "SELECT * FROM employee WHERE id = '{$id}'";

        $data = $this->db->query($sql);
        
        
        return $data->row();
    }

    public function select_by_event($id) {
        $sql = " SELECT event.id AS id, event.title AS title, event.date AS date, event.address AS address,event.description AS description,event.firsttime AS firsttime,event.endtime AS endtime , guest.fullname AS fullname, employee.name AS name FROM event,guest, employee WHERE event.id_guest = guest.id AND event.id_employee = employee.id";

        $data = $this->db->query($sql);

        return $data->result();
    }

    public function insert($data) {
        $sql = "INSERT INTO employee VALUES('','" . $data['department_id'] . "','" . $data['nik'] . "','" . $data['name'] . "','" . $data['phone'] . "','" . $data['email'] . "','" . $data['posisition'] . "','" . $data['status'] . "','" . $data['image'] . "','" . $data['created'] . "','" . $data['updated'] . "','" . $data['created_at'] . "','" . $data['updated_at'] . "','" . $data['password'] . "')";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function insert_batch($data) {
        $this->db->insert_batch('employee', $data);

        return $this->db->affected_rows();
    }

    public function update($data) {
        $sql = "UPDATE employee SET department_id='" . $data['department_id'] . "',nik='" . $data['nik'] . "', name='" . $data['name'] . "',phone='" . $data['phone'] . "', email='" . $data['email'] . "',posisition='" . $data['posisition'] . "',status='" . $data['status'] . "',image='" . $data['image'] . "',created='" . $data['created'] . "',updated='" . $data['updated'] . "',created_at='" . $data['created_at'] . "',updated_at='" . $data['updated_at'] . "',password='" . $data['password'] . "' WHERE id='" . $data['id'] . "'";

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function delete($id) {
        $sql = "DELETE FROM employee WHERE id='" . $id . "'";
        $this->_deleteImage($id);

        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    private function _deleteImage($id) {
        $product = $this->select_by_id($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH . "../uploads/$filename.*"));
        }
    }

    public function check_nama($name) {
        $this->db->where('name', $name);
        $data = $this->db->get('employee');

        return $data->num_rows();
    }

    public function total_rows() {
        $data = $this->db->get('employee');

        return $data->num_rows();
    }

//         private function _uploadImage() {
//        $config['upload_path'] = './assets/picture/';
//        $config['allowed_types'] = 'gif|jpg|png';
//        $config['file_name'] = $this->id;
//        $config['overwrite'] = true;
//        $config['max_size'] = 1024; // 1MB
//        // $config['max_width']            = 1024;
//        // $config['max_height']           = 768;
//
//        $this->load->library('upload', $config);
//
//        if ($this->upload->do_upload('image')) {
//            return $this->upload->data("file_name");
//        }
//
//        return "default.jpg";
//    }
}

/* End of file M_kota.php */
/* Location: ./application/models/M_kota.php */