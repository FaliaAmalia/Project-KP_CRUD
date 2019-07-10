<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function index() {

        $data['userdata'] = $this->userdata;

        $id = trim($_GET['id']);
        $data['laporan'] = $this->M_laporan->select_by_id($id);
        $data['dataLaporan'] = $this->M_laporan->select_detail_employee($id);
        $data['dataLaporanGuest'] = $this->M_laporan->select_detail_guest($id);
        $data['dataEvent'] = $this->M_laporan->select_by_event($id);
        $this->load->view('report', $data);
        //$this->load->library('mypdf');
        //$this->mypdf->generate('report', $data);
    }

    public function export() {
        error_reporting(E_ALL);
        
        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_laporan->select_detail_guest($id);

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 1;

        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, "Nama");
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Nomor Telepon");
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "ID Kota");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "ID Kelamin");
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "ID Kelamin");
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, "ID Kelamin");
        $rowCount++;

        foreach ($data as $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $value->id);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->fullname);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $rowCount, $value->event);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value->company);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $value->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $value->phone);
            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel207($objPHPExcel);
        $objWriter->save('./assets/excel/Report.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Report.xlsx', NULL);
    }

}
