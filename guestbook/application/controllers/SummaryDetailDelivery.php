<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryDetailDelivery extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryd');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $nik_pegawai = trim($_GET['nik_pegawai']);
        // $idDeliv = trim($_GET['id_delivery']);
        
        		$data['dataSummaryDeliveri'] = $this->M_summaryd->select_by_view();
        		//$data['dataSummaryDeliveri'] = $this->M_summaryd->select_by_countype();
        // $data['dataSummaryeventid'] = $this->M_summaryemployee->select_all_eventid($id);

        $this->load->view('summarydetaildelivery',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
