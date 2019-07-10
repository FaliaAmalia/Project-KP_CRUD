<?php
class M_chart3 extends CI_Model{
    //pertanggal
//     function get_data(){
//      $this->db->select('id,title,date,jumlahguest');
//      $result = $this->db->get('event');
//      return $result;
//  }
    function get_data(){
// $sql = "  select DATE(datetime) as date, employee.name as host, count(appointment.id_employee ) AS jumlahguest from appointment,employee WHERE appointment.id_employee=employee.id group by MONTH(datetime),DAY(datetime),  id_employee order by MONTH(datetime)=3";
 $sql="select DATE(datetime) as date, employee.name as host, count(appointment.id_employee ) AS jumlahguest from appointment,employee WHERE appointment.id_employee=employee.id AND MONTH(datetime)=3 group by MONTH(datetime),DAY(datetime), id_employee";
 $result = $this->db->query($sql);

      return $result;
 
    }
  
  }

