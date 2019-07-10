<!DOCTYPE html>

<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Chart </title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
    
  </head>
  <body>
     <h1 align="center">Jumlah Guest Perevent</h1>

    <div id="graph"></div>
 
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>

 Morris.Bar({
          element: 'graph',
                    data: <?php echo $data;?>,

                    xkey: 'title',
          ykeys: ['jumlahguest'],
          labels: ['Guest','JumlahGuest']
        });


    </script>
  </body>
</html>
</div>