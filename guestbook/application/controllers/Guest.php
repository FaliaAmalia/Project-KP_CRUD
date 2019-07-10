<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends AUTH_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_guest');
        $this->load->model('M_event');
    }

    public function index() {
        $data['userdata'] = $this->userdata;
        $data['dataGuest'] = $this->M_guest->select_all();
        $data['dataEvent'] = $this->M_event->select_all_event();

        $data['page'] = "guest";
        $data['judul'] = "Guest Data";
        $data['deskripsi'] = "Manage Guest Data";

        $data['modal_tambah_guest'] = show_my_modal('modals/modal_tambah_guest', 'tambah-guest', $data);

        $this->template->views('guest/home', $data);
    }

    public function tampil() {
        $data['dataGuest'] = $this->M_guest->select_all();
        $this->load->view('guest/list_data', $data);
    }

    public function get_autocomplete() {
        if (isset($_GET['term'])) {
            $result = $this->M_guest->search_guest($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->phone,
                        'fullname' => $row->fullname,
                        'company' => $row->company,
                        'email' => $row->email,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function prosesTambah() {

//         $phone = $_POST['phone']; // Ambil data nis dan masukkan ke variabel nis
//    $fullname = $_POST['fullname']; // Ambil data nama dan masukkan ke variabel nama
//    $event = $_POST['event']; // Ambil data telp dan masukkan ke variabel telp
//    $company = $_POST['company']; // Ambil data alamat dan masukkan ke variabel alamat
//    $email = $_POST['email']; // Ambil data alamat dan masukkan ke variabel alamat
//
//    $data = array();
//    
//    $index = 0; // Set index array awal dengan 0
//    foreach($fullname as $datanis){ // Kita buat perulangan berdasarkan nis sampai data terakhir
//      array_push($data, array(
//        'fullname'=>$datanis,
//        'phone'=>$phone[$index],  // Ambil dan set data nama sesuai index array dari $index
//        'event'=>$event[$index],  // Ambil dan set data telepon sesuai index array dari $index
//        'company'=>$company[$index],  // Ambil dan set data alamat sesuai index array dari $index
//        'email'=>$email[$index],  // Ambil dan set data alamat sesuai index array dari $index
//
//          ));
//      
//      $index++;
//    }
//    
//    $sql = $this->M_guest->insert_batch($data); // Panggil fungsi save_batch yang ada di model siswa (SiswaModel.php)
//    
//    // Cek apakah query insert nya sukses atau gagal
//    if($sql){ // Jika sukses
//      echo "<script>alert('Data berhasil disimpan');window.location = '".base_url('index.php/guest')."';</script>";
//    }else{ // Jika gagal
//      echo "<script>alert('Data gagal disimpan');window.location = '".base_url('index.php/guest')."';</script>";
//   
//    }
//        
        $this->form_validation->set_rules('phone[]', 'Phone', 'trim|required');
        $this->form_validation->set_rules('fullname[]', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('event[]', 'Title', 'trim|required');
        $this->form_validation->set_rules('company[]', 'Company', 'trim|required');
        $this->form_validation->set_rules('email[]', 'Email', 'trim|required');
        $email = $this->input->post('email[]', true);
        $title = $this->input->post('title[]', true);
        $date = $this->input->post('date[]', true);
        $address = $this->input->post('address[]', true);
        $firsttime = $this->input->post('firsttime[]', true);
        $endtime = $this->input->post('endtime[]', true);
        $name = $this->input->post('name[]', true);
        $fullname = $this->input->post('fullname[]', true);
        $phone = $this->input->post('phone[]', true);
        $event = $this->input->post('event[]', true);
        $company = $this->input->post('company[]', true);
        $email = $this->input->post('email[]', true);

        $data = $this->input->post();
        // print_r($phone);
        $count = count($phone);
        $count = $count - 1;
//        print_r($count);
//                  var_dump($count);

        //print_r($data);
        for ($i = 0; $i <= $count; $i++) {

            $phone_ins = $phone[$i];
            $fullname_ins = $fullname[$i];
            $event_ins = $event[$i];
            $company_ins = $company[$i];
            $email_ins = $email[$i];
            $title_ins = $title[$i];
            $date_ins = $date[$i];
            $address_ins = $address[$i];
            $firsttime_ins = $firsttime[$i];
            $endtime_ins = $endtime[$i];
            $name_ins = $name[$i];
//           echo $phone_ins.'-';


            $insert = $this->M_guest->insert( $phone_ins, $fullname_ins, $event_ins, $company_ins, $email_ins);

                if ($insert) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Guest Data Has Been Added', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_err_msg('Guest Data Failed to Add', '20px');
            }
                    $this->send_mail($title_ins, $date_ins, $address_ins, $firsttime_ins, $endtime_ins, $name_ins,$phone_ins, $fullname_ins, $event_ins,$company_ins,$email_ins);

        }

        echo json_encode($out);
//
        /* if ($this->form_validation->run() == TRUE) {
          //            $result = $this->M_guest->insert($data);

          $phone = $this->input->post('phone');
          $result = array();
          foreach($phone AS $key => $val){
          $result[] = array(
          "fullname"  => $_POST['fullname'][$key],
          "phone"  => $_POST['phone'][$key],
          "event"  => $_POST['event'][$key],
          "company"  => $_POST['company'][$key],
          "email"  => $_POST['email'][$key]
          );
          var_dump($result);
          //     $string = implode(', ', $result);
          }

          ////    $test= $this->db->insert_batch('user', $result); // fungsi  untuk menyimpan multi array ke database
          $result = $this->M_guest->insert_batch($data);



          if ($result > 0) {
          $out['status'] = '';
          $out['msg'] = show_succ_msg('Guest Data Has Been Added', '20px');
          } else {
          $out['status'] = '';
          $out['msg'] = show_err_msg('Guest Data Failed to Add', '20px');
          }
          } else {
          $out['status'] = 'form';
          $out['msg'] = show_err_msg(validation_errors());
          }

          echo json_encode($out);
          $this->send_mail($email,$title,$date,$address,$firsttime,$endtime,$name,$fullname); */
    }

    public function update() {
        $id = trim($_POST['id']);

        $data['dataGuest'] = $this->M_guest->select_by_id($id);
        $data['dataEvent'] = $this->M_event->select_all_event();
        $data['userdata'] = $this->userdata;

        echo show_my_modal('modals/modal_update_guest', 'update-guest', $data);
    }

    public function prosesUpdate() {
        $this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
        $this->form_validation->set_rules('event', 'Title', 'trim|required');
        $this->form_validation->set_rules('company', 'Company', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');

        $data = $this->input->post();
        if ($this->form_validation->run() == TRUE) {
            $result = $this->M_guest->update($data);

            if ($result > 0) {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Guest Data Has Been Updated', '20px');
            } else {
                $out['status'] = '';
                $out['msg'] = show_succ_msg('Guest Data Failed to Update', '20px');
            }
        } else {
            $out['status'] = 'form';
            $out['msg'] = show_err_msg(validation_errors());
        }

        echo json_encode($out);
    }

    public function delete() {
        $id = $_POST['id'];
        $result = $this->M_guest->delete($id);

        if ($result > 0) {
            echo show_succ_msg('Guest Data Has Been Deleted', '20px');
        } else {
            echo show_err_msg('Guest Data Failed to Delete', '20px');
        }
    }

    public function send_mail($title_ins, $date_ins, $address_ins, $firsttime_ins, $endtime_ins, $name_ins,$phone_ins, $fullname_ins, $event_ins,$company_ins,$email_ins) {

        $from_email = "rioandroid1@gmail.com";
        $to_email = $email_ins;
        //$to_email2 = "riopambudhi51@gmail.com";
        $src_gbr = 'https://cdn-assets-1.urbanhire.com/companies/logo/79c99d184f27d3b91aeb4ade2aacefcbf4bd0a5e.png';
        $isi_email = '<head>
		<style>
			body{
				color: #000;
			}
			.table-line {
				width: 100%;
				border-collapse: collapse;
			}
			
			.table-line th {
				background: #e04648;
				color: #FFFFFF;
				padding: 1em;
				text-align: left;
				text-transform: uppercase;
			}
			
			.table-line td {
				border-bottom: 1px solid #DDDDDD;
				color: #666666;
				padding: 1em;
			}
			.button {
				display: inline-block;
				border-radius: 5px;
				background-color: #f45154;
				border: none;
				color: #FFFFFF;
				text-align: center;
				font-size: 14px;
				padding: 10px;
				width: 100px;
				transition: all 0.5s;
				cursor: pointer;
				margin: 3px;
			  }
			  
			.button span {
				cursor: pointer;
				display: inline-block;
				position: relative;
				transition: 0.5s;
			  }
			  
			.button span:after {
				position: absolute;
				opacity: 0;
				top: 0;
				right: -20px;
				transition: 0.5s;
			  }
		</style>
		</head>
		<body>
		<img src="' . $src_gbr . '" alt="logoinf" width="125px;" height="70px;"></><br/><br/>
		
		<br/>
                <p> Dear ' . $fullname_ins . ' <br/>
               
                <p> You have been invited to this event :</p>
		<table class="table-line" align="center">
			<thead>
				<tr>
					<th>Event Name</th>
					<th>Date</th>
					<th>Place</th>
					<th>Firsttime</th>
                                        <th>Endtime</th>
                                        <th>Host</th>
				</tr>
			</thead>
			<tbody>
<td>'.$title_ins.'</td>
					<td>'.$date_ins.'</td>
					<td>'.$address_ins.'</td>
                    <td>'.$firsttime_ins.'</td>
                    <td>'.$endtime_ins.'</td>
                    <td>'.$name_ins.'</td>

			</tbody>
		</table>
                
		</body>';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $from_email,
            'smtp_pass' => '90anakpadang',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($from_email, 'GuestApp Infomedia');
        $this->email->to($to_email);
        $this->email->subject('Information');
        $this->email->message($isi_email);
        $this->email->send();
        //Send mail 
        // if($this->email->send()){
        // 	  echo 'terkirim';
        // }else {
        // 	   echo 'gagal mengirim';
        // } 
    }

}
