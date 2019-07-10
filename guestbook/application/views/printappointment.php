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

<!--       <img  src="../uploads/infomedia.png" />  -->
<h1 align="center"> <b><?php echo $ket; ?></b></h1><br /><br />


	<table border="1" cellpadding="8" align="center">
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
    if( ! empty($reportappointment2)){
    	$no = 1;
    	foreach($reportappointment2 as $data){
$date = date('d-m-Y', strtotime($data->date));            
    		echo "<tr>";
//                    		echo "<td>".$date."</td>";

    		echo "<td>".$data->fullname."</td>";
    		echo "<td>".$data->company."</td>";
    		echo "<td>".$data->id_type."</td>";
    		echo "<td>".$data->id."</td>";
                echo "<td>".$data->host."</td>";
    		echo "<td>".$data->image."</td>";
    		echo "<td>".$data->interest."</td>";
                echo "<td>".$data->datetime."</td>";
    		
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
