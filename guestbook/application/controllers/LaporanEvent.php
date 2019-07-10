<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanEvent extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporanevent');
       $this->load->library('Pdf');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataLaporanevent'] = $this->M_laporanevent->select_all_event();
        $data['page'] = "laporanevent";
        $data['judul'] = "Data Laporan Event";
        $data['deskripsi'] = "Manage Data Laporan Event";

        //$data['modal_tambah_employee'] = show_my_modal('modals/modal_tambah_employee', 'tambah-employee', $data);

        $this->template->views('laporanevent/home', $data);
        

    }

    public function tampil() {
        $data['dataLaporanevent'] = $this->M_laporanevent->select_all_event();
        $this->load->view('laporanevent/list_data', $data);
    }

    public function detail() {
        $data['userdata'] = $this->userdata;

        $id = trim($_POST['id']);
        //$id2                            = trim($_POST['id']);
        $data['laporanevent'] = $this->M_laporanevent->select_by_id($id);
        $data['dataLaporanevent'] = $this->M_laporanevent->select_detail_event($id);
        $data['dataLaporanGuest'] = $this->M_laporanevent->select_detail_guest($id);
        $data['dataEmployee'] = $this->M_laporanevent->select_by_employee($id);

        echo show_my_modal('modals/modal_detail_laporan', 'detail-laporan', $data, 'lg');
        //$this->load->view('laporan/report', $data);
    }

    public function downloadpdf() {
        //PDF

        $pdf = new FPDF('l', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        $pdf->Image('assets/img/logo.png', 25, 8, 20, 20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'Infomedia Nusantara', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Guest Data', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'Full Name', 1, 0);
        $pdf->Cell(50, 6, 'Company', 1, 0);
        $pdf->Cell(55, 6, 'Email', 1, 0);
        $pdf->Cell(45, 6, 'Phone', 1, 1);
        $pdf->SetFont('Arial', '', 10);
        $guest = $this->db->get('guest')->result();
        foreach ($guest as $row) {
            $pdf->Cell(40, 6, $row->fullname, 1, 0);
            $pdf->Cell(50, 6, $row->company, 1, 0);
            $pdf->Cell(55, 6, $row->email, 1, 0);
            $pdf->Cell(45, 6, $row->phone, 1, 1);
        }
        $pdf->Output();
    }

}
