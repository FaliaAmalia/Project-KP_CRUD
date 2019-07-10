<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
    <div class="box-header">

        <div class="col-md-2" style="padding: 0;">
            <a href="<?php echo $url_cetak; ?>">  
                <button class="form-control btn btn-danger" ><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;Cetak PDF</button></a>
        </div>

        <div class="col-md-3" style="padding: 0;">
            <a href="<?php echo base_url('ReportDelivery2/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
        </div>

    </div>  

    <head>
	<title>PDF</title>
    <style type="text/css">

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
    .btn-default{
        margin-left: 20px;
        background: #dddddd;
    }
   /* .btn-github{
        margin-left: 10px;
    }*/
    #report{
        margin-left: 10px; 
    }
 
</style>
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
</head>
<body>
   
<div id=report>
    <form method="get" action="" >
        <label>Filter By</label><br>
        <select name="filter" id="filter" class="form-control" style='width:300px;'>
            <option value="">Pilih</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
            
        </select>
        <br /><br />

        <div id="form-tanggal">
            <label>Date</label><br>
            <input type="text" name="tanggal" class="form-control input-tanggal" style='width:300px;' />
            <br /><br />
        </div>

        <div id="form-bulan">
            <label>Month</label><br>
            <select name="bulan" class="form-control" style='width:300px;'>
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun">
            <label>Year</label><br>
            <select name="tahun" class="form-control" style='width:300px;'>
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

				<div class="col-md-2" style="padding: 0;">

        <button class="form-control btn btn-github" type="submit">Tampilkan</button>
		
		</div>
		
		
		<div class="col-md-2" style="padding: 0;">
	<a href="<?php echo base_url('ReportDelivery2'); ?>">
        <button class="form-control btn btn-default"> Reset Filter</button></a>


   </div> 
        <br><br>

 
    <b> <h1 align="center"><?php echo $ket; ?></h1></b><br /><br />

    <table class="table table-striped" cellpadding="8" align="center" style="margin-right: 50px">
        <tr>
            
          <!-- <th>No</th> -->
          <!-- <th>Kode Barang</th> -->
          <th>Id Delivery</th>
          <th>Type Of Delivery</th>
          <th>Sub Type Of Delivery</th>
          <th>No Resi</th>
          <th>NIK Karyawan</th>
          <!-- <th>Nama Pegawai</th> -->
          <th>Jumlah Paket yang diterima</th>
          <th>Jenis Paket</th>
          <th>Nama Pegawai Front Desk</th>
          <th>Delivery Status</th>
         <!--  <th>Id Barang</th> -->
          <th>Date Time</th>
    </tr>
    <?php


    if( ! empty($reportdelivery2)){
    	$no = 1;
    	foreach($reportdelivery2 as $data){
//            $tgl = date('d-m-Y', strtotime($data->tgl));
            
    		echo "<tr>";
//    		echo "<td>".$tgl."</td>";
        // echo"<td>".$data->$no." </td>";
        echo "<td>".$data->id_delivery."</td>";
    		echo "<td>".$data->type_deliv."</td>";
    		echo "<td>".$data->sub_type."</td>";
    		echo "<td>".$data->no_resi."</td>";
                echo "<td>".$data->nik_pegawai."</td>";
    		// echo "<td>".$data->name."</td>";
    		echo "<td>".$data->jmlh_barang."</td>";
                echo "<td>".$data->jenis_barang."</td>";
                echo "<td>".$data->front_desk."</td>";
                echo "<td>".$data->deliv_status."</td>";
                // echo "<td>".$data->id_barang."</td>";
                echo "<td>".$data->date_time."</td>"; 
    		echo "</tr>";
        
    	}
        $no++;
    }
    ?>
  </div>  
    <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>


    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    
    </script>
</table>
</body>

  
</div>

