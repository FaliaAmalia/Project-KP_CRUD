<html>
    <head>
        <title>Report E-Commerce <?php echo $summaryeco->sub_type; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/print-bootstrap.css') ?>">
        <style>
            .panel-body p{
                font-size: 20px;
            }
            .rounded{
                border-radius: 8px;
            }
            #t{
                overflow-x: scroll;
                overflow-y: scroll;
            }

        </style>
    </head>
    <div id="t">

        <div class="col-md-12 well">


<!--<h1 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i>Summary Event dan Guest</h1>-->
            <div class="box box-body">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div align="right">  
                            <img  src="../uploads/logo1.png" width="150px" height="150px"/><br/>
<!--                            <div class="col-md-2" style="padding: 1;">
                                <a href="<?php echo base_url('Reportsummaryemployee'); ?>">
                                    <button class=" form-control btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-down"></i> <span>Download</span></button><br>
                                </a>    </div>-->
<div class="noprint">                           
<div class="text-left noprint" >
                <button class="btn btn-danger" OnClick="javascript:window.print()" > Download PDF</button>

            </div>
    </div>
                        </div><br/>
                        <h1 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> E-Commerce List Report By
                            <!-- <b> <?php echo $summaryeco->sub_type; ?></b> -->
                            <?php foreach ($dataSummaryDeliveri as $summary1) { ?>

                                <p style='margin-left:150px; margin-bottom:10px;'><?php echo $summary1->sub_type; ?></p>

                            <br>
                        </h1>

                        <!-- <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i>Guest List Report By 
                            <b> <?php echo $laporanevent->title; ?></b><br>
                        </h3> -->
                        <!-- <table border='0'>
                            <tbody>
                                <tr> -->
                                    <!-- <td><?php foreach ($dataSummaryDeliveri as $summary1) { ?>
                                        <p> <a href=""><img src="<?php echo base_url('../uploads/' . $summary1->image) ?>" width="140" /></a></p>
                                        <?php } ?>
                                    </td> -->
                                    <!-- <td> -->
                                        <!-- <?php foreach ($dataSummaryDeliveri as $summary1) { ?> -->

                                            <!-- <p style='margin-left:150px; margin-bottom:10px;'>Id Delivery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary1->id_delivery; ?></p> -->
                                            
                                            <!-- <p style='margin-left:150px; margin-bottom:10px;'>Jumlah Paket &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary1->jmlh_barang; ?></p> -->

                                       <!--  <?php } ?> -->
                                        <!-- <?php foreach ($dataSummaryemployee as $summary) { ?>
                                            <p style='margin-left:50px; margin-bottom:10px;'>Total Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary->totalguest; ?></p>
                                        <?php } ?> -->
                                   <!--  </td>

                                </tr>
                            </tbody>
                        </table>
                        <br/> -->
                        
                        <!-- <br/> -->
                        <table id="tabel-detail" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Id Delivery</th>
                                    <th>Type Of Delivery</th>
                                    <th>Sub Type of Delivery</th>
                                    <th>No Resi</th>
                                    <th>NIK</th>
                                    <th>Jumlah Paket</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Pegawai Front Desk</th>
                                    <th>Deliv Status</th>
                                    <!-- <th>Id Barang</th> -->
                                    <!-- <th></th>

                                    <th>Total Kirim</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataSummaryEco as $summaryeco2) {
                                    ?>
                                    <tr>
                                        <td><?php echo $summaryeco2->date_time; ?></td>

                                        <td><?php echo $summaryeco2->id_delivery; ?></td>
                                        <td><?php echo $summaryeco2->type_deliv; ?></td>
                                        <td><?php echo $summaryeco2->sub_type; ?></td>
                                        <td><?php echo $summaryeco2->no_resi; ?></td>
                                        <td><?php echo $summaryeco2->nik_pegawai; ?></td>
                                        <td><?php echo $summaryeco2->jmlh_barang; ?></td>
                                        <td><?php echo $summaryeco2->jenis_barang; ?></td>
                                        <td><?php echo $summaryeco2->front_desk; ?></td>
                                        <td><?php echo $summaryeco2->deliv_status; ?></td>
                                        <!-- <td><?php echo $summarydelivery2->id_barang; ?></td> -->
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>			
                </div>
    <!--            <table id="tabel-detail" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total guest</th>
    
                        </tr>
                    </thead>
                    <tbody id="data-summaryemployee">
                <?php
                foreach ($dataSummaryemployee as $guest) {
                    ?>
                                        <tr>
            
                                            <td><?php echo $guest->title; ?></td>
                                            <td><?php echo $guest->totalguest; ?></td>
                                        </tr>
                    <?php
                }
                ?>
    
                    </tbody>
    
                </table>-->

            </div>





        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-2.1.4.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js" ></script>

</html>
