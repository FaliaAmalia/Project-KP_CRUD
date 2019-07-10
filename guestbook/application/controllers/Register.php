<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataStaff'] = $this->M_auth->select_all();

        $data['page'] = "register";
                $data['judul'] = "Register";

        $data['modal_tambah_admin'] = show_my_modal('modals/modal_tambah_admin', 'tambah-admin', $data);
        $data['modal_tambah_staff'] = show_my_modal('modals/modal_tambah_staff', 'tambah-staff', $data);

        $this->template->views('account/home', $data);
    }
 public function tampil() {
        if ($this->session->userdata('akses') == '1') {

            $data['dataStaff'] = $this->M_auth->select_all();

            $this->load->view('account/list_data', $data);
        }
    }
    public function prosesTambah() {
        $admin = $this->M_auth;

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');

        $config['upload_path'] = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $_FILES['foto']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());

            $out['status'] = '';
            $out['msg'] = show_err_msg('Data Has Been Added', '20px');
            echo json_encode($out);

            print_r($error);
        } else {

            $foto = $this->upload->data();


            $this->M_auth->insert(array(
                'username' => $username,
                'password' => md5($password),
                'nama' => $nama,
                'foto' => $foto['file_name'],
            ));
            $data = array('upload_data' => $this->upload->data());

            $out['status'] = '';
            $out['msg'] = show_succ_msg('Data Has Been Added', '20px');
            echo json_encode($out);

//            echo"sukses";
        }
    }

    public function prosesTambahstaff() {
        $staff = $this->M_auth;

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $config['upload_path'] = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $_FILES['foto']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());

            $out['status'] = '';
            $out['msg'] = show_err_msg('Data Has Been Added', '20px');
            echo json_encode($out);

            print_r($error);
        } else {

            $foto = $this->upload->data();


            $this->M_auth->insert2(array(
                'username' => $username,
                'password' => md5($password),
                'nama' => $nama,
                'foto' => $foto['file_name'],
            ));
            $data = array('upload_data' => $this->upload->data());

            $out['status'] = '';
            $out['msg'] = show_succ_msg('Data Has Been Added', '20px');
            echo json_encode($out);

//            echo"sukses";
        }
    }

}
