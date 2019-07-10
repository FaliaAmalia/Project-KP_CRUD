<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportSummary extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('M_summary');
    }

    public function index() {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Event Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'ReportSummary/cetak?filter=1&tanggal=' . $tgl;
                $reportsummary = $this->M_summary->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Event Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'ReportSummary/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $reportsummary = $this->M_summary->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Event Tahun ' . $tahun;
                $url_cetak = 'ReportSummary/cetak?filter=3&tahun=' . $tahun;
                $reportsummary = $this->M_summary->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Event';
            $url_cetak = 'ReportSummary/cetak';
            $reportsummary = $this->M_summary->view_all();
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['reportsummary'] = $reportsummary;
        $data['option_tahun'] = $this->M_summary->option_tahun();
        $this->load->view('viewsummary', $data);
    }

    public function cetak() {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                $reportsummary = $this->M_summary->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $reportsummary = $this->M_summary->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'DataTahun ' . $tahun;
                $reportsummary = $this->M_summary->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data';
            $reportsummary = $this->M_summary->view_all();
        }

        $data['ket'] = $ket;
        $data['reportsummary'] = $reportsummary;

        ob_start();
        $this->load->view('printsummary', $data);

        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Summary.pdf', 'D');
    }

}
