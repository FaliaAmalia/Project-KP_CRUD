<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Summaryeventemployee extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryemployee');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $id = trim($_GET['id']);
        
        		$data['dataSummaryemployee'] = $this->M_summaryemployee->select_by_idguest($id);
        		$data['dataSummaryevent'] = $this->M_summaryemployee->select_by_idevent($id);
        $data['dataSummaryeventid'] = $this->M_summaryemployee->select_all_eventid($id);

        $this->load->view('summaryeventemployee',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
