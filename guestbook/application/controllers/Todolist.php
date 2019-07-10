<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Todolist extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_todolist');
        $this->load->model('M_auth');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataTodolist'] = $this->M_todolist->select_all();
        $data['page'] = "todolist";
        $data['judul'] = "To Do List";
        $data['deskripsi'] = "To Do List Data";
         //$x['hitungAppointment'] = $this->M_todolist->hitungJumlahAsset();
        $this->template->views('todolist/home', $data);

    }

    public function tampil() {
        $data['dataTodolist'] = $this->M_todolist->select_all();
        $this->load->view('todolist/list_data', $data);
    }
    // public function hitung(){
    //     $data['hitungAppointment'] = $this->M_todolist->hitungJumlahAsset();
    //     $this->template->
    // }

    public function reschedule() {
        $id = trim($_POST['id']);

        $data['dataTodolist'] = $this->M_todolist->select_by_id($id);
        $data['userdata'] = $this->userdata;

        echo show_my_modal('modals/modal_reschedule_todolist', 'reschedule-todolist', $data);
//        echo json_encode($data);
    }

    public function prosesReschedule() {
        $this->form_validation->set_rules('datetime', 'Datetime', 'trim|required');

        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_todolist->reschedule($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Reschedule Has Been Updated', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Reschedule Failed to Update', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function updateStatusAppointment() {
        $id = $_POST['id'];
        $result = $this->M_todolist->accept_appointment($id);

        if ($result > 0) {
            echo show_succ_msg('Appointment Has Been Accepted', '20px');
        } else {
            echo show_err_msg('Appointment Data Failed to Accept', '20px');
        }
    }

    public function updateReschedule() {
        $id = $_POST['id'];
        $result = $this->M_todolist->reschedule_appointment($id);
    }

    public function updateStatusReject() {
        $id = $_POST['id'];
        $result = $this->M_todolist->reject($id);

        if ($result > 0) {
            echo show_succ_msg('Appointment Has Been Rejected', '20px');
        } else {
            echo show_err_msg('Appointment Failed to Reject', '20px');
        }
    }


}
