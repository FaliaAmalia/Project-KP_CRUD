<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_event');
        $this->load->model('M_guest');
        $this->load->model('M_employee');
        $this->load->model('M_appointment');

        $this->load->model('M_deliverymenu');
        $this->load->model('M_chart'); 

        $this->load->model('M_chart2');
    }

    public function index() {
        $data['jml_guest'] = $this->M_guest->total_rows();
        
        $data['jml_event'] = $this->M_event->total_rows();
        $data['jml_employee'] = $this->M_employee->total_rows();
        $data['jml_appointment'] = $this->M_appointment->total_rows();

        $data['jml_pengiriman'] = $this->M_deliverymenu->total_rows();
        $data['userdata'] = $this->userdata;

        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

        $delivery = $this->M_deliverymenu->select_all_delivery();
        $index = 0;
        foreach ($delivery as $value) {
            $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

            $get_by_pengiriman = $this->M_deliverymenu->select_by_jmlh($value->id_delivery);

            $data_pengiriman[$index]['value'] = $get_by_pengiriman->jmlh;
            $data_pengiriman[$index]['color'] = $color;
            $data_pengiriman[$index]['highlight'] = $color;

            $data_pengiriman[$index]['totalsub'] = $value->id_delivery;

            $index++;
        }

        // $delivery = $this->M_deliverymenu->select_alld();
        // $index = 0;
        // foreach ($delivery as $value) {
        //     $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

        //     $get_by_delivery = $this->M_deliverymenu->select_by_counttype($value->sub_type);

        //     $data_delivery[$index]['value'] = $get_by_delivery->totalsub;
        //     $data_delivery[$index]['color'] = $color;
        //     $data_delivery[$index]['highlight'] = $color;

        //     $data_delivery[$index]['totalsub'] = $value->sub_type;

        //     $index++;
        // }

        $event = $this->M_event->select_all();
        $index = 0;
        foreach ($event as $value) {
            $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

            $guest_by_event = $this->M_guest->select_by_event($value->id);

            $data_event[$index]['value'] = $guest_by_event->jml;
            $data_event[$index]['color'] = $color;
            $data_event[$index]['highlight'] = $color;
            $data_event[$index]['label'] = $value->title;

            $index++;
        }

        $employee = $this->M_employee->select_all();
        $index = 0;
        foreach ($employee as $value) {
            $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

            $guest_by_employee = $this->M_guest->select_by_employee($value->id);

            $data_employee[$index]['value'] = $guest_by_employee->jml;
            $data_employee[$index]['color'] = $color;
            $data_employee[$index]['highlight'] = $color;
            $data_employee[$index]['label'] = $value->name;

            $index++;
        }

        $appointment = $this->M_appointment->select_all();
        $index = 0;
        foreach ($appointment as $value) {
            $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

            $get_data = $this->M_appointment->get_data($value->id);

            $data_appointment[$index]['value'] = $get_data->jumlahguest;
            $data_appointment[$index]['color'] = $color;
            $data_appointment[$index]['highlight'] = $color;

            $data_appointment[$index]['host'] = $value->id;

            $index++;
        }

        isset($data_event)?$data['data_event'] = json_encode($data_event):'';
        //$data['data_event'] = json_encode($data_event);
        isset($data_employee)?$data['data_employee'] = json_encode($data_employee):'';
        //$data['data_employee'] = json_encode($data_employee);
        isset($data_appointment)?$data['data_appointment'] = json_encode($data_appointment):'';
        //$data['data_appointment'] = json_encode($data_appointment);
        isset($data_pengiriman)?$data['data_pengiriman'] = json_encode($data_pengiriman):'';
        //$data['data_pengiriman'] = json_encode($data_appointment);


        $data['page'] = "home";
        $data['judul'] = "Home";
        $data['deskripsi'] = "Manage Data CRUD";
        $this->template->views('home', $data);
//                $dataemployee= $this->M_guest->select_by_employee($value->id);
//            

        $data = $this->M_chart2->get_data()->result();
        $data['data'] = json_encode($data);
        $this->load->view('chart_view2', $data);
    }

    public function tampil() {
        $data['dataApp'] = $this->M_chart->get_data();
        $this->load->view('home', $data);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */