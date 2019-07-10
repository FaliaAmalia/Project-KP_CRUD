<html>
    <head>
        <title>Report <?php echo $laporan->name; ?></title>
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
        </style>
    </head>

        <div class="col-md-12 well">
            <div class="text-left noprint" >
                <button class="btn btn-danger" OnClick="javascript:window.print()" > Download PDF</button>
                 

            </div>
            <img src="<?= base_url('assets/img/infomedia.jpg') ?>"/>
            <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i>Guest List Report By 
                <b> <?php echo $laporan->name; ?></b><br>
            </h3>

            <div class="box box-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table border='0'>
                            <tbody>
                                <tr>
                                    <td><?php
                                        foreach ($dataLaporan as $laporan) {
                                            ?>
                                            <img src="<?= base_url('uploads/' . $laporan->image); ?>"width="150" height='200' class="rounded" >
                                            <?php
                                        }
                                        ?></td>
                                    <td><?php foreach($dataLaporan as $laporan) { ?>
                                        <p style='margin-left:50px; margin-bottom:20px; padding-top: 15px;'>Fullname&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $laporan->name; ?></p>
                                        <p style='margin-left:50px; margin-bottom:20px;'>NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $laporan->nik; ?></p>
                                        <p style='margin-left:50px; margin-bottom:20px;'>Position&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $laporan->posisition; ?></p>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>			
                </div>
                <table id="tabel-detail" class="table table-bordered table-striped">
                    <thead>
                        <tr>                           
                            <th>Full Name</th>
                            <th>Event</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </thead>
                    <tbody id="data-guest">
                        <?php
                        foreach ($dataLaporanGuest as $guest) {
                            ?>
                            <tr>
                                <td><?php echo $guest->fullname; ?></td>
                                <td><?php echo $guest->event; ?></td>
                                <td><?php echo $guest->company; ?></td>
                                <td><?php echo $guest->email; ?></td>
                                <td><?php echo $guest->phone; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>





        </div>
    </div>
    <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js" ></script>

</html>
