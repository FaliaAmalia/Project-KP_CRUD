<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DeliveryMenu extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_deliverymenu');
        $this->load->helper('url');
        $this->load->model('M_auth');
    }
    
    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataDeliveri'] = $this->M_deliverymenu->select_all_delivery();

        $data['page'] = "delivery";
        $data['judul'] = "Data Delivery";
        $data['deskripsi'] = "Manage Data Delivery";

        $ket = 'Semua Data';
        $url_cetak = 'delivery/cetak';
        $data['modal_tambah_pengiriman'] = show_my_modal('modals/modal_tambah_pengiriman', 'tambah-pengiriman', $data);

        $this->template->views('delivery/home', $data);

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/' . $url_cetak);
    }

    // public function tampil() {
    //     if ($this->session->userdata('akses') == '1') {

    //         // $data['dataDeliveri'] = $this->M_deliverymenu->select_all_delivery();

    //         $this->load->view('delivery/list_data', $data);
    //     }
    // }


    public function save()
    {

        $post = $this->input->post();
        $this->id_delivery = uniqid();
        $this->type_deliv = $post["type_deliv"];
        $this->sub_type = $post["no_resi"];
        $this->nik = $post["nik"];
        $this->jmlh_barang = $post["jmlh_barang"];
        $this->jenis_barang = $post["jenis_barang"];
        $this->front_desk = $post["front_desk"];
        $this->deliv_status = $post["deliv_status"];
        $this->date_time = $post["date_time"];
        $this->id_barang = $post["id_barang"];
        $this->db->insert($this->delivery, $this);
    }

    // public function prosesTambah()
    // {
    //     $delivery = $this->M_deliverymenu;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($product->rules());

    //     if ($validation->run()) {
    //         $delivery->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("modals/modal_tambah_pengiriman");
    // }

    // public function update($id_delivery = null)
    // {
    //     if (!isset($id)) redirect('admin/products');
       
    //     $delivery = $this->M_deliverymenu;
    //     $validation = $this->form_validation;
    //     $validation->set_rules($delivery->rules());

    //     if ($validation->run()) {
    //         $delivery->update();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $data["delivery"] = $delivery->getById($id);
    //     if (!$data["delivery"]) show_404();
        
    //     $this->load->view("modals/modal_update_pengiriman", $data);
    // }

    // public function delete($id=null)
    // {
    //     if (!isset($id_delivery)) show_404();
        
    //     if ($this->M_deliverymenu->delete($id_delivery)) {
    //         redirect(site_url('DeliveryMenu'));
    //     }
    // }

    public function prosesTambah() {
        $delivery = $this->M_deliverymenu;

        // $no= $this->input->post('');
        $id_delivery = uniqid('INF');
        $type_deliv = $this->input->post('type_deliv', true);
        $sub_type = $this->input->post('sub_type', true);
        $no_resi = $this->input->post('no_resi', true);
        $nik = $this->input->post('nik', true);
        // $Name = $this->input->post('name');
        $jmlh_barang = $this->input->post('jmlh_barang', true);
        $jenis_barang = $this->input->post('jenis_barang', true);
        $front_desk = $this->input->post('front_desk', true);
        $deliv_status = $this->input->post('deliv_status', true);
        $date_time = $this->input->post('date_time', true);
        $id_barang = $this->input->post('id_barang', true);


            $data = array(
            // $this->M_deliverymenu->insertd(array(
               'id_delivery' => $id_delivery,
               'type_deliv' => $type_deliv,
               'sub_type' => $sub_type,
               'no_resi' => $no_resi,
               'nik' => $nik,
               'jmlh_barang' => $jmlh_barang,
               'jenis_barang' => $jenis_barang,
               'front_desk' => $front_desk,
               'deliv_status' => $deliv_status,
               'date_time' => $date_time,
               'id_barang' => $id_barang,
                // 'password' => md5($password)

            
            );
            // $data = array('upload_data' => $this->upload->data());

            // $out['status'] = '';
            $result = $this->M_deliverymenu->insertd($data);
            // $out['msg'] = show_succ_msg('Delivery Data Has Been Added', '20px');
            echo json_encode($result);
            // echo json_encode($out);
            

            //echo"sukses";
        
    }

    public function update() {
        $data['userdata'] = $this->userdata;

        $idDeliv = trim($_POST['id_delivery']);
        $data['dataDeliveri'] = $this->M_deliverymenu->select_by_id($idDeliv);

        echo show_my_modal('modals/modal_update_pengiriman', 'update-pengiriman', $data);
    }

    public function prosesUpdate() {
        $this->form_validation->set_rules('id_delivery', 'id_delivery', 'trim|required');
        $this->form_validation->set_rules('type_deliv', 'type_deliv', 'trim|required');
        $this->form_validation->set_rules('sub_type', 'sub_type', 'trim|required');
        $this->form_validation->set_rules('no_resi', 'no_resi', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        // $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('jmlh_barang', 'jmlh_barang', 'trim|required');
        $this->form_validation->set_rules('jenis_barang', 'jenis_barang', 'trim|required');
        $this->form_validation->set_rules('front_desk', 'front_desk', 'trim|required');
        $this->form_validation->set_rules('deliv_status', 'deliv_status', 'trim|required');
        $this->form_validation->set_rules('date_time', 'date_time', 'trim|required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required');

        
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_deliverymenu->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Delivery Data Has Been Updated', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Delivery Data Failed to Update', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function deleteDeliv() {
        $idDeliv = $_POST['id_delivery'];
        $result = $this->M_deliverymenu->deleteDeliv($idDeliv);

        if ($result > 0) {
            echo show_succ_msg('Delivery Data Has Been Deleted', '20px');
        } else {
            echo show_err_msg('Delivery Data Failed to Delete', '20px');
        }
    }    

    // public function detail() {
    //     $data['userdata'] = $this->userdata;

    //     $id = trim($_POST['id']);
    //    $data['summary'] = $this->M_summary->select_by_id($id);
    //     $data['dataSummary'] = $this->M_summary->select_by_guest_event_employee($id);

    //     echo show_my_modal('modals/modal_detail_summary', 'detail-summary', $data, 'lg');
    // }

    // public function cetak() {

    //     $ket = 'Semua Data ';

    //     $delivery = $this->M_deliverymenu->select_all_delivery();


    //     $data['ket'] = $ket;
    //     $data['dataDeliveri'] = $delivery;

    //     ob_start();
    //     $this->load->view('printdelivery', $data);
    //     $html = ob_get_contents();
    //     ob_end_clean();

    //     require_once('./assets/html2pdf/html2pdf.class.php');
    //     $pdf = new HTML2PDF('P', 'A4', 'en');
    //     $pdf->WriteHTML($html);
    //     $pdf->Output('Data Delivery.pdf', 'D');
    // }

    public function export() {
        error_reporting(E_ALL);

        include_once './assets/phpexcel/Classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $data = $this->M_deliverymenu->select_all_delivery();




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
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $value->nik);
            $objPHPExcel->getActiveSheet()->setCellValueExplicit('G' . $rowCount, $value->jmlh_barang, PHPExcel_Cell_DataType::TYPE_STRING);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $value->jenis_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $value->front_desk);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $value->deliv_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $value->id_barang);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $value->date_time);
            

            $rowCount++;
        }

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('./assets/excel/Data Delivery.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Data Delivery.xlsx', NULL);
    }

}
