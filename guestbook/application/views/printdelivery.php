<html>

<head>
    
	<title>Cetak PDF</title>
	<style  type="text/css">
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
                        
		}
		table td {
                     
			word-wrap:break-word;
			width: 20%;
		}
body {
/*opacity: 0.2;
  filter: alpha(opacity=20);
*/
   background-image:url(../uploads/baru2.jpg);
     background-size: 35%;
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
}
#b{
       background:url(../uploads/baru2.jpg);
background-size: 100%;
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
     
} 
#img{
       background:url(../uploads/baru3.png);
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
     margin-left: auto;
    margin-right: auto;
     width: 100%;

}
	</style>
</head>
<body >
        <div id="img">

      <img  src="../uploads/infomedia.png" /> 
<h1 align="center"> <b><?php echo $ket; ?></b></h1><br /><br />


	<table border="1" cellpadding="8" align="center">
	<tr>
		<th>No</th>
          <!-- <th>Nomor</th> -->
          <th>Id Delivery</th>
          <th>Type Of Delivery</th>
          <th>Sub Type Of Delivery</th>
          <th>No Resi</th>
          <th>NIK</th>
          <th>Jumlah Paket</th>
          <th>Jenis Paket</th>
          <th>Nama Pegawai Front Desk</th>
          <th>Delivery Status</th>
          <th>Id Barang</th>
          <th>Datetime</th>
	</tr>

    <?php
    if( ! empty($reportdelivery2)){
    	$no = 1;
    	foreach($reportdelivery2 as $data){
$date = date('d-m-Y', strtotime($data->date));            
    		echo "<tr>";
//                    		echo "<td>".$date."</td>";

    		echo "<td>".$data->no."</td>";
    		echo "<td>".$data->id_delivery."</td>";
    		echo "<td>".$data->type_deliv."</td>";
    		echo "<td>".$data->sub_type."</td>";
                echo "<td>".$data->no_resi."</td>";
    		echo "<td>".$data->nik_pegawai."</td>";
    		echo "<td>".$data->jmlh_brng."</td>";
                echo "<td>".$data->jenis_barang."</td>";
        echo "<td>".$data->front_desk."</td>";
        echo "<td>".$data->deliv_status."</td>";
                echo "<td>".$data->id_barang."</td>";
        echo "<td>".$date."</td>";
    		
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
<!--<br>-->
<!--    <img  src="../uploads/logo.png" align="right" width="5px" height="5px"/>  -->

    </div>

</body>

</html>
