<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataStaff'] = $this->M_auth->select_all();

        $data['page'] = "staff";
        $data['judul'] = "Data Staff";
        $data['deskripsi'] = "Manage Data Staff";

//        $data['modal_tambah_employee'] = show_my_modal('modals/modal_tambah_employee', 'tambah-employee', $data);

        $this->template->views('staff/home', $data);
    }

    public function tampil() {
        if ($this->session->userdata('akses') == '1') {

            $data['dataStaff'] = $this->M_auth->select_all();

            $this->load->view('staff/list_data', $data);
        }
    }

    public function delete() {
        $id = $_POST['id'];
        $result = $this->M_auth->delete($id);

        if ($result > 0) {
            echo show_succ_msg(' Data Has Been Deleted', '20px');
        } else {
            echo show_err_msg(' Data Failed to Delete', '20px');
        }
    }
    

}
