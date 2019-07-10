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
       background:url(../uploads/baru2.jpg);
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
     margin-left: auto;
    margin-right: auto;
     
}
	</style>
</head>
<body >
        <div id="img">

       <img  src="../uploads/infomedia.png" />  
<h1 align="center"> <b><?php echo $ket; ?></b></h1><br /><br />

<div >

	<table border="1" cellpadding="8" align="center">
	<tr align="left">
		<th>Tanggal</th>
		<th>Title</th>
		<th>Host</th>
		<th>Jumlah Guest</th>
	</tr>

    <?php 
    if( ! empty($reportsummary)){
    	$no = 1;
    	foreach($reportsummary as $data){
$date = date('d-m-Y', strtotime($data->date));            
    		echo "<tr >";
    		echo "<td>".$date."</td>";
    		echo "<td>".$data->title."</td>";
    		echo "<td>".$data->host."</td>";
    		echo "<td>".$data->jumlahguest."</td>";
    		
    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
	</table>
    
    <div align="right">
        <p>     , </p>
    </div>
</div>
    </div>
    
</body>
</html>
