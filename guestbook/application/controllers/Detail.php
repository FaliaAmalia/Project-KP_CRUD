
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summary');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $id = trim($_GET['id']);
        $data['summary'] = $this->M_summary->select_by_id($id);
        $dataSummary=$this->M_summary->select_detail_employee($id);
                $data['dataSummary'] = $dataSummary;

        $data['dataSummaryGuest'] = $this->M_summary->select_detail_guest($id);
        $data['dataEvent'] = $this->M_summary->select_by_event($id);
        $this->load->view('detail',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
