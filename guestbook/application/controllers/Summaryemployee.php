<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Summaryemployee extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_summaryemployee');
//        $this->load->model('M_employee');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataSummaryevent'] = $this->M_summaryemployee->select_all_event();
                $data['dataSummaryguest'] = $this->M_summaryemployee->select_all_guest();

//        $data['dataEmployee'] = $this->M_employee->select_all();

        $data['page'] = "summaryemployee";
        $data['judul'] = "Summary Data";
        $data['deskripsi'] = "Manage Summary Data";

//        $data['modal_tambah_guest'] = show_my_modal('modals/modal_tambah_guest', 'tambah-guest', $data);

        $this->template->views('summaryemployee/home', $data);

        //report berdasarkan tanggal bulan tahun
        // Jika user tidak mengklik tombol tampilkan
        $ket = 'Semua Data Event';
        $url_cetak = 'summary/cetak';
        $summaryevent = $this->M_summaryemployee->select_all_event();
$summaryguest = $this->M_summaryemployee->select_all_event();


        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['summaryevent'] = $summaryevent;
        $data['summaryguest'] = $summaryguest;
//        $data['option_tahun'] = $this->M_summary->option_tahun();
//		$this->load->view('summary/home', $data);





//        $data['modal_detail_summary'] = show_my_modal('modals/modal_detail_summary', 'detail-summary', $data);
    }

    public function tampil() {
        $data['dataSummaryevent'] = $this->M_summaryemployee->select_all_event();
        $data['dataSummaryguest'] = $this->M_summaryemployee->select_all_guest();
        
        $this->load->view('summaryemployee/list_data', $data);
    }
public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
//        $data['summaryemployee'] = $this->M_summaryemployee->select_by_idguest($id);
		$data['dataSummaryemployee'] = $this->M_summaryemployee->select_by_idguest($id);

		echo show_my_modal('modals/modal_detail_summaryemployee', 'detail-summaryemployee', $data, 'lg');
	}
//    public function detail() {
//        $data['userdata'] = $this->userdata;
//
//        $id = trim($_POST['id']);
//       $data['summary'] = $this->M_summary->select_by_id($id);
//		$data['dataSummary'] = $this->M_summary->select_by_guest_event_employee($id);
//
//        echo show_my_modal('modals/modal_detail_summary', 'detail-summary', $data, 'lg');
//    }
//
//    public function cetak() {
//
//        $ket = 'Semua Data ';
//
//        $summary = $this->M_summary->select_all();
//
//
//        $data['ket'] = $ket;
//        $data['summary'] = $summary;
//
//        ob_start();
//        $this->load->view('printsummary', $data);
//        $html = ob_get_contents();
//        ob_end_clean();
//
//        require_once('./assets/html2pdf/html2pdf.class.php');
//        $pdf = new HTML2PDF('P', 'A4', 'en');
//        $pdf->WriteHTML($html);
//        $pdf->Output('Data Summary.pdf', 'D');
//    }
//
//    public function export() {
//        error_reporting(E_ALL);
//
//        include_once './assets/phpexcel/Classes/PHPExcel.php';
//        $objPHPExcel = new PHPExcel();
//
//        $data = $this->M_summary->select_all();
//
//
//
//
//        $objPHPExcel = new PHPExcel();
//        $objPHPExcel->setActiveSheetIndex(0);
//
//        $rowCount = 2;
//        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Data banyak Guest PerEvent");
//
//
//        $rowCount = 4;
//
//        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Date");
//        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "Title");
//        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "Host");
//        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "Jumlah Guest");
//
//        $rowCount++;
//
//        foreach ($data as $value) {
//            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->date);
//            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->title);
//            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value->host);
//
//            $objPHPExcel->getActiveSheet()->setCellValueExplicit('E' . $rowCount, $value->jumlahguest, PHPExcel_Cell_DataType::TYPE_STRING);
//
//            $rowCount++;
//        }
//
//        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
//        $objWriter->save('./assets/excel/Data Perevent.xlsx');
//
//        $this->load->helper('download');
//        force_download('./assets/excel/Data Perevent.xlsx', NULL);
//    }

}
