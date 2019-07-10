<?php
class M_chart extends CI_Model{
  
    
    //perevent
     function get_data(){
      $sql = "select event.title, count(guest.id) AS jumlahguest from event , guest where event.id=guest.id_event group by event.title ";

            $result = $this->db->query($sql);

      return $result;
      
  
  }
  

  
//   function get_data(){
////      $this->db->select('id,date,jumlahguest,title');
//      $result = $this->db->select('       select event.title, count(guest.id) as jumlahguest from event,guest where event.id=guest.id_event group by event.title');
//       if($result->num_rows() >= 0){
//            foreach($result->result() as $data){
//                $result[] = $data;
//            }
//            return $result;
//        }


       
//       $result = $this->db->query("
//   
//  select
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=1)AND (YEAR(date)=2019))),0) AS 'Januari',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=2)AND (YEAR(date)=2019))),0) AS 'Februari',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=3)AND (YEAR(date)=2019))),0) AS 'Maret',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=4)AND (YEAR(date)=2019))),0) AS 'April',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=5)AND (YEAR(date)=2019))),0) AS 'Mei',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=6)AND (YEAR(date)=2019))),0) AS 'Juni',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=7)AND (YEAR(date)=2019))),0) AS 'Juli',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=8)AND (YEAR(date)=2019))),0) AS 'Agustus',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=9)AND (YEAR(date)=2019))),0) AS 'September',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=10)AND (YEAR(date)=2019))),0) AS 'Oktober',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=11)AND (YEAR(date)=2019))),0) AS 'November',
//  ifnull((SELECT sum(jumlahguest) FROM (event)WHERE((Month(date)=12)AND (YEAR(date)=2019))),0) AS 'Desember',
//  id,title
// from event GROUP BY YEAR(date) 
//   
//  ");
//   
//  return $result;
  }
  
