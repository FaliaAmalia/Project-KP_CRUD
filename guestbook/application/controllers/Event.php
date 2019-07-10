<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_event');
        $this->load->model('M_employee');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataEvent'] = $this->M_event->select_all();
        $data['dataEmployee'] = $this->M_employee->select_all();

        $data['page'] = "event";
        $data['judul'] = "Event Data";
        $data['deskripsi'] = "Manage Data event";

        $data['modal_tambah_event'] = show_my_modal('modals/modal_tambah_event', 'tambah-event', $data);

        $this->template->views('event/home', $data);
    }

    public function tampil() {
        $data['dataEvent'] = $this->M_event->select_all();
        $this->load->view('event/list_data', $data);
    }

    public function prosesTambah() {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('firsttime', 'firsttime', 'trim|required');
        $this->form_validation->set_rules('endtime', 'endtime', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');

        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_event->insert($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Event Data Has Been Added', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Event Data Failed to Add', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function update() {
        $id = trim($_POST['id']);

        $data['dataEvent'] = $this->M_event->select_by_id($id);
        $data['dataEmployee'] = $this->M_employee->select_all();
        $data['userdata'] = $this->userdata;

        echo show_my_modal('modals/modal_update_event', 'update-event', $data);
    }

    public function prosesUpdate() {
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('firsttime', 'firsttime', 'trim|required');
        $this->form_validation->set_rules('endtime', 'endtime', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_event->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Event Data Has Been Updated', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Event Data Failed to Update', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function delete() {
        $id = $_POST['id'];
        $result = $this->M_event->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Event Data Has Been Deleted', '20px');
        } else {
            echo show_err_msg('Event Data Failed to Delete', '20px');
        }
    }

    public function cetak() {

        $ket = 'Semua Data ';

        $event = $this->M_event->select_all();


        $data['ket'] = $ket;
        $data['event'] = $event;

        ob_start();
        $this->load->view('printevent', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Event.pdf', 'D');
    }

}
