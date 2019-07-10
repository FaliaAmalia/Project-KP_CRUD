<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportappointment2 extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
                $this->load->model('M_appointment');

    }

    public function index() {
        $data['userdata'] = $this->userdata;
     
        $data['page'] = "reportappointment2";
        $data['judul'] = "Report Appointment";
        
        $ket = 'All Data';
        $url_cetak = 'reportappointment2/cetak';
        $reportappointment2 = $this->M_appointment->select_all(); 


        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['dataAppointment'] = $reportappointment2;
        $data['option_tahun'] = $this->M_appointment->option_tahun();

		
        $reportappointment2 = $this->M_appointment->select_all(); 
        $data['ket'] = $ket;
        $data['reportappointment2'] = $reportappointment2;

        ob_start();
        $this->load->view('printappointment', $data);
        $html = ob_get_contents();
        ob_end_clean();

		
		
		
		
if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                $url_cetak = 'reportappointment2/cetak?filter=1&tanggal=' . $tgl;
                $reportappointment2 = $this->M_appointment->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $url_cetak = 'reportappointment2/cetak?filter=2&bulan=' . $bulan . '&tahun=' . $tahun;
                $reportappointment2 = $this->M_appointment->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Tahun ' . $tahun;
                $url_cetak = 'reportappointment2/cetak?filter=3&tahun=' . $tahun;
                $reportappointment2 = $this->M_appointment->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'All Data';
            $url_cetak = 'reportappointment2/cetak';
            $reportappointment2 = $this->M_appointment->view_all();
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
        $data['reportappointment2'] = $reportappointment2;
        $data['option_tahun'] = $this->M_appointment->option_tahun();
       // $this->load->view('reportappointment2/home', $data);
	   
	           $this->template->views('reportappointment2/home', $data);

    }

   public function cetak() {
        if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Tanggal ' . date('d-m-y', strtotime($tgl));
                $reportappointment2 = $this->M_appointment->view_by_date($tgl);
            } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

                $ket = 'Data Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
                $reportappointment2 = $this->M_appointment->view_by_month($bulan, $tahun);
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'DataTahun ' . $tahun;
                $reportappointment2 = $this->M_appointment->view_by_year($tahun);
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data';
            $reportappointment2 = $this->M_appointment->select_all();
        }

        $data['ket'] = $ket;
        $data['reportappointment2'] = $reportappointment2;

        ob_start();
        $this->load->view('printappointment', $data);

        $html = ob_get_clean();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L', 'A4', 'en', false, 'ISO-8859-15', array(10, 10, 10, 10));
        $pdf->WriteHTML($html);
        $pdf->Output('Data Appointment22.pdf', 'D');
    }
   
 
}
