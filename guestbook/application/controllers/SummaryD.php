<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SummaryD extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryd');
//        $this->load->model('M_employee');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataSummaryDeliveri'] = $this->M_summaryd->select_by_countype();

//        $data['dataEmployee'] = $this->M_employee->select_all();

        $data['page'] = "summarydelivery";
        $data['judul'] = "Summary Data Delivery";
        $data['deskripsi'] = "Manage Summary Data Delivery";

//        $data['modal_tambah_guest'] = show_my_modal('modals/modal_tambah_guest', 'tambah-guest', $data);

        $this->template->views('summarydelivery/home', $data);

        //report berdasarkan tanggal bulan tahun
        // Jika user tidak mengklik tombol tampilkan
        $ket = 'Semua Data Delivery';
        $url_cetak = 'SummaryD/cetak';
        // $summarydelivery = $this->M_deliverymenu->select_by_countype();


//         $data['ket'] = $ket;
//         $data['url_cetak'] = base_url('index.php/' . $url_cetak);
//         $data['summarydelivery'] = $summarydelivery;
// //        $data['option_tahun'] = $this->M_summary->option_tahun();
//         $this->load->view('summarydelivery/home', $data);

// //        $data['modal_detail_summary'] = show_my_modal('modals/modal_detail_summary', 'detail-summary', $data);
    }

    public function tampil() {
        $data['dataSummaryDeliveri'] = $this->M_summaryd->select_all();
        
        $this->load->view('summarydelivery/list', $data);
    }

    public function detail() {
      $data['userdata']   = $this->userdata;

      $idDeliv        = trim($_POST['id_delivery']);
  //        $data['summaryemployee'] = $this->M_summaryemployee->select_by_idguest($id);
      $data['dataSummaryDeliveri'] = $this->M_summaryd->select_by_id($idDeliv);

      echo show_my_modal('modals/modal_detail_summaryemployee', 'detail-summaryemployee', $data, 'lg');
    }

    //TAMBAHIN JANGAN LUPA //

//    public function cetak() {
// //
//        $ket = 'Semua Data ';

//        $summary = $this->M_summaryd->select_all();


//        $data['ket'] = $ket;
//        $data['summarydelivery'] = $summarydelivery;

//        ob_start();
//        $this->load->view('printsummary', $data);
//        $html = ob_get_contents();
//        ob_end_clean();

//        require_once('./assets/html2pdf/html2pdf.class.php');
//        $pdf = new HTML2PDF('P', 'A4', 'en');
//        $pdf->WriteHTML($html);
//        $pdf->Output('Data Summary Delivery.pdf', 'D');
//    }
//
    public function export() {
        error_reporting(E_ALL);

        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_summaryd->select_all();




        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $rowCount = 2;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Data banyak Delivery");


        $rowCount = 4;

        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Date");
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "NIK");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "Jenis Paket");
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Jumlah Paket");

        $rowCount++;

        foreach ($data as $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->date_time);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->nik_pegawai);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value->jenis_barang);

            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . $rowCount, $value->jmlh_barang, PHPExcel_Cell_DataType::TYPE_STRING);

            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('./assets/excel/Data Summary Delivery.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Data Summary Delivery.xlsx', NULL);
    }

}
