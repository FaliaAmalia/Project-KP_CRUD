<?php
class M_chart2 extends CI_Model{
    //pertanggal
//     function get_data(){
//      $this->db->select('id,title,date,jumlahguest');
//      $result = $this->db->get('event');
//      return $result;
//  }
    function get_data(){
//      $sql = "  select event.date, count(guest.id_event) AS jumlahguest from event , guest where event.id=guest.id_event group by event.date
//";
$sql=" select DATE(datetime) as date, count(fullname) AS jumlahguest from appointment group by YEAR(datetime),MONTH(datetime),DAY(datetime)";
     
            $result = $this->db->query($sql);

      return $result;
 
    }
  
  }
  
