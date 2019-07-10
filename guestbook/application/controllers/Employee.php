<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_employee');
        $this->load->model('M_auth');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataEmployee'] = $this->M_employee->select_all();

        $data['page'] = "employee";
        $data['judul'] = "Data Employee";
        $data['deskripsi'] = "Manage Data Employee";

        $data['modal_tambah_employee'] = show_my_modal('modals/modal_tambah_employee', 'tambah-employee', $data);

        $this->template->views('employee/home', $data);
    }

    public function tampil() {
        if ($this->session->userdata('akses') == '1') {

            $data['dataEmployee'] = $this->M_employee->select_all();

            $this->load->view('employee/list_data', $data);
        }
    }

    public function prosesTambah() {
        $employee = $this->M_employee;

        $department_id = $this->input->post('department_id');
        $nik = $this->input->post('nik');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $posisition = $this->input->post('posisition');
        $status = $this->input->post('status');
        $created = $this->input->post('created');
        $updated = $this->input->post('updated');
        $created_at = $this->input->post('created_at');
        $updated_at = $this->input->post('updated_at');
        $password = $this->input->post('password');




        $config['upload_path'] = '../uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 10000;
        $config['file_name'] = $_FILES['image']['name'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());

            $out['status'] = '';
            $out['msg'] = show_err_msg('Employee Data Has Been Added', '20px');
            echo json_encode($out);

            print_r($error);
        } else {

            $image = $this->upload->data();


            $this->M_employee->insert(array(
                'department_id' => $department_id,
                'nik' => $nik,
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'posisition' => $posisition,
                'status' => $status,
                'image' => $image['file_name'],
                'created' => $created,
                'updated' => $updated,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'password' => md5($password)

                ));
            $data = array('upload_data' => $this->upload->data());

            $out['status'] = '';
            $out['msg'] = show_succ_msg('Employee Data Has Been Added', '20px');
            echo json_encode($out);

//            echo"sukses";
        }
    }

    public function update() {
        $data['userdata'] = $this->userdata;

        $id = trim($_POST['id']);
        $data['dataEmployee'] = $this->M_employee->select_by_id($id);

        echo show_my_modal('modals/modal_update_employee', 'update-employee', $data);
    }

    public function prosesUpdate() {
        $this->form_validation->set_rules('department_id', 'department_id', 'trim|required');
        $this->form_validation->set_rules('nik', 'nik', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('posisition', 'posisition', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('image', 'image', 'trim|required');
        $this->form_validation->set_rules('created', 'created', 'trim|required');
        $this->form_validation->set_rules('updated', 'updated', 'trim|required');
        $this->form_validation->set_rules('created_at', 'created_at', 'trim|required');
        $this->form_validation->set_rules('updated_at', 'updated_at', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        
        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_employee->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Employee Data Has Been Updated', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Employee Data Failed to Update', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

     public function delete() {
        $id = $_POST['id'];
        $result = $this->M_employee->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Employee Data Has Been Deleted', '20px');
        } else {
            echo show_err_msg('Employee Data Failed to Delete', '20px');
        }
    }

}
