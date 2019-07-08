<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('M_todolist');
    }

    public function index() {
        $session = $this->session->userdata('status');
        if ($session == '') {
            $this->load->view('login');
        } else {
            redirect('Home');
        }
    }

    public function login() {
//        $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('nik', 'Nik', 'required|min_length[4]|max_length[15]');

        $username = htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $cek_admin = $this->M_auth->login($username, $password);

        if ($cek_admin) { //jika login sebagai admin
            if ($this->form_validation->run() == TRUE) {
                $username = trim($_POST['nik']);
                $password = trim($_POST['password']);

                $data = $this->M_auth->login($username, $password);
                $this->session->set_userdata('masuk', TRUE);
                $this->session->set_userdata('akses', '1');
                $this->session->set_userdata('nik', $username);
                $session = [
                    'userdata' => $data,
                    'status' => "Loged in",
                        //'hitung' => $this->M_todolist->hitungJumlahAsset();
                ];
                $this->session->set_userdata($session);
                redirect('Home');
            } else {
                $this->session->set_flashdata('error_msg', validation_errors());
                redirect('Auth');
            }
        } else {

             $cek_staff = $this->M_auth->login_employee($username, $password);

            if ($cek_staff) { //jika login sebagai staff
                if ($this->form_validation->run() == TRUE) {
                    $username = trim($_POST['nik']);
                    $password = trim($_POST['password']);

                    $data = $this->M_auth->login_employee($username, $password);
                    $this->session->set_userdata('masuk', TRUE);
                    $this->session->set_userdata('akses', '2');
                    $this->session->set_userdata('nik', $username);
                    $session = [
                        'userdata' => $data,
                        'status' => "Loged in",
                        //'hitung' => $this->M_todolist->hitungJumlahAsset();
                    ];
                    $this->session->set_userdata($session);
                    redirect('Home');
                } else {
                    $this->session->set_flashdata('error_msg', validation_errors());
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Nik / Password Anda Salah.');

                redirect('Auth');
            }
//            $cek_staff = $this->M_auth->login_staff($username, $password);
//
//            if ($cek_staff) { //jika login sebagai staff
//                if ($this->form_validation->run() == TRUE) {
//                    $username = trim($_POST['username']);
//                    $password = trim($_POST['password']);
//
//                    $data = $this->M_auth->login_staff($username, $password);
//                    $this->session->set_userdata('masuk', TRUE);
//                    $this->session->set_userdata('akses', '2');
//                    $session = [
//                        'userdata' => $data,
//                        'status' => "Loged in"
//                    ];
//                    $this->session->set_userdata($session);
//                    redirect('Home');
//                } else {
//                    $this->session->set_flashdata('error_msg', validation_errors());
//                    redirect('Auth');
//                }
//            } else {
//                $this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
//
//                redirect('Auth');
//            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Auth');
    }

}
