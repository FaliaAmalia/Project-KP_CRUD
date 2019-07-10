<html>
    <head>
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
                            <img  src="../uploads/logo.png" width="250px" height="100px"/><br/>
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
                        
                        <h1 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i>Summary Event dan Guest</h1>

                        <table border='0'>
                            <tbody>
                                <tr>
                                    <td><?php foreach ($dataSummaryeventid as $summary1) { ?>
                                        <p> <a href=""><img src="<?php echo base_url('../uploads/' . $summary1->image) ?>" width="140" /></a></p>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php foreach ($dataSummaryeventid as $summary1) { ?>

                                            <p style='margin-left:50px; margin-bottom:10px;'>Host&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary1->host; ?></p>
                                            <p style='margin-left:50px; margin-bottom:10px;'>Jumlah Event&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary1->jumlahevent; ?></p>

                                        <?php } ?>
                                        <?php foreach ($dataSummaryemployee as $summary) { ?>
                                            <p style='margin-left:50px; margin-bottom:10px;'>Total Guest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $summary->totalguest; ?></p>
                                        <?php } ?>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <br/>
                        <table id="tabel-detail" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name Event</th>
                                    <th>Total guest</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($dataSummaryevent as $guest2) {
                                    ?>
                                    <tr>
                                        <td><?php echo $guest2->date; ?></td>

                                        <td><?php echo $guest2->title; ?></td>
                                        <td><?php echo $guest2->jumlahguest; ?></td>
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
