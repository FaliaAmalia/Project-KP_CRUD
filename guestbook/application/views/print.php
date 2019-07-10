<html>
<head>
	<title>Cetak PDF</title>
<img src="../uploads/download.jpg">
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
/*                          background-image:url(../uploads/infomedia.png);
  background-image:url(../uploads/infomedia.png);
     background-size: 100%;
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;*/
		}
		table td {
                     
			word-wrap:break-word;
			width: 20%;
		}
                body {

/*opacity: 0.2;
  filter: alpha(opacity=20);
*/
 
  
}
	</style>
</head>
<body>
       <img  src="../uploads/infomedia.png" />
<h1 align="center"> <b><?php echo $ket; ?></b></h1><br /><br />
    
	<table border="1" cellpadding="8">
	<tr>
		<th>Fullname</th>
        <th>Company</th>
        <th>Id Type</th>
        <th>Id</th>
        <th>Nama Host</th>
        <th>Image</th>
        <th>Interest</th>
        <th>Date Time</th>
	</tr>

     <?php
    if( ! empty($reportappointment)){
    	$no = 1;
    	foreach($reportappointment as $data){
//            $tgl = date('d-m-Y', strtotime($data->tgl));
            
    		echo "<tr>";
//    		echo "<td>".$tgl."</td>";
    		echo "<td>".$data->fullname."</td>";
    		echo "<td>".$data->company."</td>";
    		echo "<td>".$data->id_type."</td>";
    		echo "<td>".$data->id."</td>";
                echo "<td>".$data->id_employee."</td>";
    		echo "<td>".$data->image."</td>";
    		echo "<td>".$data->interest."</td>";
                echo "<td>".$data->datetime."</td>";
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
</body>
</html>
