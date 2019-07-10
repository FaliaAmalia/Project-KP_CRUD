<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryDetailEco extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryeco');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $sub_type = trim($_GET['sub_type']);
        // $idDeliv = trim($_GET['id_delivery']);
        
        		$data['dataSummaryEco'] = $this->M_summaryeco->select_by_view();
        		//$data['dataSummaryDeliveri'] = $this->M_summaryd->select_by_countype();
        // $data['dataSummaryeventid'] = $this->M_summaryemployee->select_all_eventid($id);

        $this->load->view('summarydetaileco',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
