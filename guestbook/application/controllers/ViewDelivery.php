
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryd');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $idDeliv = trim($_GET['id_delivery']);
        $data['summarydelivery'] = $this->M_summaryd->select_by_id($id);
        $dataSummary=$this->M_summaryd->select_detail_employee($id);
                $data['dataSummary'] = $dataSummary;

        $data['dataSummaryGuest'] = $this->M_summary->select_detail_guest($id);
        $data['dataEvent'] = $this->M_summary->select_by_event($id);
        $this->load->view('detail',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
