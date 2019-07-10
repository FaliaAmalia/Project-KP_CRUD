<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Eventemployee extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_eventemployee');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $id = trim($_GET['id']);
        
        		$data['dataeventemployee'] = $this->M_eventemployee->select_eventemployee($id);

        $this->load->view('eventemployee',$data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

}
