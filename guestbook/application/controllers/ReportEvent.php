<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportEvent extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporanevent');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $id = trim($_GET['id']);
        $data['laporanevent'] = $this->M_laporanevent->select_by_id($id);
        $data['dataLaporanevent'] = $this->M_laporanevent->select_detail_event($id);
        $data['dataLaporanGuest'] = $this->M_laporanevent->select_detail_guest($id);
        $data['dataEmployee'] = $this->M_laporanevent->select_by_employee($id);
        $this->load->view('reportevent',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
