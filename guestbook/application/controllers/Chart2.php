<?php
class Chart2 extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load chart_model dari model
      $this->load->model('M_chart2');
    }
 
    function index(){
    
      $data = $this->M_chart2->get_data()->result();
      $data['data'] = json_encode($data);
      $this->load->view('chart_view2',$data);
      
      
      
      
      
      

        }
}