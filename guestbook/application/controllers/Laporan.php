<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan');
        $this->load->library('pdf');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataLaporan'] = $this->M_laporan->select_all_employee();
        $data['page'] = "laporan";
        $data['judul'] = "Data Laporan";
        $data['deskripsi'] = "Manage Data Laporan";

        //$data['modal_tambah_employee'] = show_my_modal('modals/modal_tambah_employee', 'tambah-employee', $data);

        $this->template->views('laporan/home', $data);
        

    }

    public function tampil() {
        $data['dataLaporan'] = $this->M_laporan->select_all_employee();
        $this->load->view('laporan/list_data', $data);
    }

    public function detail() {
        $data['userdata'] = $this->userdata;

        $id = trim($_POST['id']);
        //$id2                            = trim($_POST['id']);
        $data['laporan'] = $this->M_laporan->select_by_id($id);
        $data['dataLaporan'] = $this->M_laporan->select_detail_employee($id);
        $data['dataLaporanGuest'] = $this->M_laporan->select_detail_guest($id);
        $data['dataEvent'] = $this->M_laporan->select_by_event($id);

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
