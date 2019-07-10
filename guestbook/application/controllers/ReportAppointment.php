<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportAppointment extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('M_appointment');
    }

    public function index() {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'ReportAppointment/cetak?filter=1&tanggal=' . $tgl;
                $reportappointment = $this->M_appointment->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'ReportAppointment/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $reportappointment = $this->M_appointment->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Tahun ' . $tahun;
                $url_cetak = 'ReportAppointment/cetak?filter=3&tahun=' . $tahun;
                $reportappointment = $this->M_appointment->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data ';
            $url_cetak = 'ReportAppointment/cetak';
            $reportappointment = $this->M_appointment->view_all();
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['reportappointment'] = $reportappointment;
        $data['option_tahun'] = $this->M_appointment->option_tahun();
        $this->load->view('viewappointment', $data);
    }

    // public function cetak() {
    //     if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
    //         $filter = $_GET['filter']; // Ambil data filder yang dipilih user

    //         if ($filter == '1') { // Jika filter nya 1 (per tanggal)
    //             $tgl = $_GET['tanggal'];

    //             $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
    //             $reportappointment = $this->M_appointment->view_by_date($tgl);
    //         } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
    //             $bulan = $_GET['bulan'];
    //             $tahun = $_GET['tahun'];
    //             $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    //             $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
    //             $reportappointment = $this->M_appointment->view_by_month($bulan, $tahun);
    //         } else { // Jika filter nya 3 (per tahun)
    //             $tahun = $_GET['tahun'];

    //             $ket = 'DataTahun ' . $tahun;
    //             $reportappointment = $this->M_appointment->view_by_year($tahun);
    //         }
    //     } else { // Jika user tidak mengklik tombol tampilkan
    //         $ket = 'Semua Data';
    //         $reportappointment = $this->M_appointment->select_all();
    //     }

    //     $data['ket'] = $ket;
    //     $data['reportappointment'] = $reportappointment;

    //     ob_start();
    //     $this->load->view('printappointment', $data);

    //     $html = ob_get_clean();
    //     ob_end_clean();

    //     require_once('./assets/html2pdf/html2pdf.class.php');
    //     $pdf = new HTML2PDF('L', 'A4', 'en', false, 'ISO-8859-15', array(10, 10, 10, 10));
    //     $pdf->WriteHTML($html);
    //     $pdf->Output('Data Appointment22.pdf', 'D');
    // }

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
