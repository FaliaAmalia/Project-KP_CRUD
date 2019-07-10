<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ReportDelivery2 extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
                $this->load->model('M_delivery');

    }

    public function index() {
        $data['userdata'] = $this->userdata;
     
        $data['page'] = "reportdelivery2";
        $data['judul'] = "Report Delivery";
        
        $ket = 'All Data';
        $url_cetak = 'reportdelivery2/cetak';
        $reportdelivery2 = $this->M_delivery->select_all_delivery(); 


        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['dataDeliveri'] = $reportdelivery2;
        $data['option_tahun'] = $this->M_delivery->option_tahun();

        
        $reportdelivery2 = $this->M_delivery->select_all_delivery(); 
        $data['ket'] = $ket;
        $data['reportdelivery2'] = $reportdelivery2;

        ob_start();
        $this->load->view('printdelivery', $data);
        $html = ob_get_contents();
        ob_end_clean();

        
        
        
        
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
                    $filter = $_GET['filter']; // Ambil data filder yang dipilih user

                    if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                        $tgl = $_GET['tanggal'];

                        $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                        $url_cetak = 'reportdelivery2/cetak?filter=1&tanggal=' . $tgl;
                        $reportdelivery2 = $this->M_delivery->view_by_date($tgl);
                    } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                        $bulan = $_GET['bulan'];
                        $tahun = $_GET['tahun'];
                        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                        $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                        $url_cetak = 'reportdelivery2/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                        $reportdelivery2 = $this->M_delivery->view_by_month($bulan, $tahun);
                    } else { // Jika filter nya 3 (per tahun)
                        $tahun = $_GET['tahun'];

                        $ket = 'Data Tahun ' . $tahun;
                        $url_cetak = 'reportdelivery2/cetak?filter=3&tahun=' . $tahun;
                        $reportdelivery2 = $this->M_delivery->view_by_year($tahun);
                    }
                } else { // Jika user tidak mengklik tombol tampilkan
                    $ket = 'All Data';
                    $url_cetak = 'reportdelivery2/cetak';
                    $reportdelivery2 = $this->M_delivery->view_all();
                }

                $data['ket'] = $ket;
                $data['url_cetak'] = base_url('index.php/' . $url_cetak);
                $data['reportdelivery2'] = $reportdelivery2;
                $data['option_tahun'] = $this->M_delivery->option_tahun();
                //$this->load->view('reportappointment2/home', $data);
               
                       $this->template->views('reportdelivery2/home', $data);

        }


   public function cetak() {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                $reportdelivery2 = $this->M_delivery->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $reportdelivery2 = $this->M_delivery->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'DataTahun ' . $tahun;
                $reportdelivery2 = $this->M_delivery->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data';
            $reportdelivery2 = $this->M_delivery->select_all();
        }

        $data['ket'] = $ket;
        //$data['reportdelivery2'] = $reportdelivery2;

        ob_start();
        $this->load->view('printdelivery', $data);

        $html = ob_get_clean();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L', 'A4', 'en', false, 'ISO-8859-15', array(10, 10, 10, 10));
        $pdf->WriteHTML($html);
        $pdf->Output('Data Report Delivery2.pdf', 'D');
    }

    public function export() {
        error_reporting(E_ALL);

        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_delivery->select_all_delivery();




        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        $rowCount = 2;
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Data banyak Delivery");


        $rowCount = 4;

        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, "Id Delivery");
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, "Type of Delivery");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, "Sub Type of Delivery");
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, "No Resi");
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, "NIK");
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, "Amount of Packages");
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, "Packages Type");
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, "Name of Front Desk Employee");
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, "Delivery Status");
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, "Item ID");
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, "Datetime");




        $rowCount++;

        foreach ($data as $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->id_delivery);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $value->type_deliv);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $value->sub_type);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $value->no_resi);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $value->nik_pegawai);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('G' . $rowCount, $value->jmlh_barang, PHPExcel_Cell_DataType::TYPE_STRING);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $value->jenis_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $value->front_desk);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $value->deliv_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $value->id_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $value->date_time);
            

            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('./assets/excel/Data Report Delivery.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Data Report Delivery.xlsx', NULL);
    }

}