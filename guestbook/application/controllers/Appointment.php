<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Appointment extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_appointment');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataAppointment'] = $this->M_appointment->select_all();
        $data['page'] = "appointment";
        $data['judul'] = "Appointment Data";
        $data['deskripsi'] = "Manage Appointment Data";
        $this->template->views('appointment/home', $data);
        
        $ket = 'Semua Data';
        $url_cetak = 'appointment/cetak';
        $appointment = $this->M_appointment->select_all(); 


        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['dataAppointment'] = $appointment;
        $data['option_tahun'] = $this->M_appointment->option_tahun();
    }

    public function tampil() {
        $data['dataAppointment'] = $this->M_appointment->select_all();
        $this->load->view('appointment/list_data', $data);
    }

    public function cetak() {
        $ket = 'Semua Data ';
        $appointment = $this->M_appointment->select_all(); 
        $data['ket'] = $ket;
        $data['appointment'] = $appointment;

        ob_start();
        $this->load->view('printappointment', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Appointment.pdf', 'D');
    }

    public function export() {
        error_reporting(E_ALL);

        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_appointment->select_all();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $rowCount = 2;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Data banyak Guest PerEvent");


        $rowCount = 4;

        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Date");
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "Title");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "Host");
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Jumlah Guest");

        $rowCount++;

        foreach ($data as $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->date);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->title);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value->host);

            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . $rowCount, $value->jumlahguest, PHPExcel_Cell_DataType::TYPE_STRING);

            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('./assets/excel/Data Perhari.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Data Perhari.xlsx', NULL);
    }

}
