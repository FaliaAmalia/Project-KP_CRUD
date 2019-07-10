<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/morris.css' ?>">
                    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>

    <style type="text/css">
        .preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background-color: #fff;
    }
    .preloader .loading {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      font: 14px arial;
    }
    </style>
    <script>
    $(document).ready(function(){
      $(".preloader").delay(400).fadeOut();
    })
    </script>
  </head>
  <body>
      <div class="preloader">
      <div class="loading">
       <img src="../uploads/baru.gif" width="88">
<!--       <div>
       <p>Harap Tunggu...</p>
       </div>-->
      </div>
    </div>
  </body>  
  
    <div id="img">
    <div align="center" class="row" >
        
        <div class="col-lg-4 col-xs-7">
            <div class="small-box bg-blue-active">
                <div class="inner">
                    <h3><?php echo $jml_appointment; ?></h3>

                    <p>Total Appointment</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-people"></i>
                </div>
                <a href="<?php echo base_url('Appointment') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
        <!-- belum bener -->
        <div class="col-lg-4 col-xs-7" >
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo $jml_pengiriman; ?></h3>

                    <p>Total Delivery</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-hand"></i>
                </div>
                <a href="<?php echo base_url('DeliveryMenu') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-7" >
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $jml_employee; ?></h3>

                    <p>Total Employees</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-briefcase"></i>
                </div>
                <a href="<?php echo base_url('Employee') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div align="center" class="row" style="padding-left: 150px;">
        <div class="col-lg-5 col-md-6" align="center">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $jml_event; ?></h3>

                    <p>Total Events</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-time-outline"></i>
                </div>
                <a href="<?php echo base_url('Event') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-5 col-md-6">
            <div class="small-box bg-gray-active">
                <div class="inner">
                    <h3><?php echo $jml_guest; ?></h3>

                    <p>Total Guest</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-contact"></i>
                </div>
                <a href="<?php echo base_url('Guest') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
         
        

    <div align="center" class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-briefcase"></i>
                    <h3 class="box-title">Jumlah Delivery Per E-Commerce</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="data-delivery" style="height:250px"></canvas>
                </div>

            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <i class="fa fa-briefcase"></i>
                    <h3 class="box-title">Jumlah Event Per Employee</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="data-guest" style="height:250px"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div align="center" class="row" style="padding-left: 250px;">
        <div class="col-lg-8 col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-briefcase"></i>
                    <h3 class="box-title">Jumlah Guest Per Event</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <canvas id="data-event" style="height:250px"></canvas>
<!--                    <table border="1" id="list-data">
                        <head >
                        <th>Tanggal</th>
                        <th>Nama Event</th>
                        <th>Jumlah Guest</th>
                        </head>
                        <body id="data-app">
 
                          <?php foreach ($data as $data2): {?>

                        <tr>
                            <th> <?php echo $data2->date; ?></th>

                            <th> <?php echo $data2->title; ?></th>
                            <th><?php echo $data2->jumlahguest; ?></th>
                        </tr>
                          <?php } endforeach; ?>
                        </body>

                    </table>-->
                </div>

                <div >


<!--                <table border="">
    <thead>
         <th>Host</th>
<th>Event</th>
<th>Jumlah Guest</th>
<th>Date</th>
    </thead>
    <tbody>
                    <?php
                    if (!empty($guest_by_employee)) {
                        $no = 1;
                        foreach ($guest_by_employee as $data) {
//            $tgl = date('d-m-Y', strtotime($data->tgl));

                            echo "<tr>";
                            echo "<td>" . $data->id_employee . "</td>";
                            echo "<td>" . $data->title . "</td>";
                            echo "<td>" . $data->jumlahguest . "</td>";
                            echo "<td>" . $data->date . "</td>";

                            echo "</tr>";
                            $no++;
                        }
                    }
                    ?>
    </tbody>
</table>
                    -->
                </div>
            </div>
        </div>


    </div>

    <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>
    <script>
        //data delivery
        var pieChartCanvas = $("#data-delivery").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = <?php echo $data_pengiriman; ?>;

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        pieChart.Doughnut(PieData, pieOptions);

        //data guest
        var pieChartCanvas = $("#data-guest").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = <?php echo $data_employee; ?>;

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        pieChart.Doughnut(PieData, pieOptions);

        //data event
        var pieChartCanvas = $("#data-event").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = <?php echo $data_event; ?>;

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        pieChart.Doughnut(PieData, pieOptions);
        var pieChartCanvas = $("#data-appointment").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = <?php echo $data_appointment; ?>;

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50,
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };

        pieChart.Doughnut(PieData, pieOptions);
    </script>
    
   

        <h1 align="center">Jumlah Guest Perhari dalam satu Bulan</h1>

        <div id="graph"></div>

        <script src="<?php echo base_url() . 'assets/js/jquery.min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/raphael-min.js' ?>"></script>
        <script src="<?php echo base_url() . 'assets/js/morris.min.js' ?>"></script>
        <script>

        Morris.Bar({
            element: 'graph',
            data: <?php echo $data; ?>,

            xkey: 'date',
            ykeys: ['jumlahguest'],
            labels: ['JumlahGuest']
        });


        </script>
 
    <div class="box-body">
      <style>
          #t{

          }
/*          #img {

opacity: 0.2;
  filter: alpha(opacity=20);

   background-image:url(../uploads/a.jpg);
     background-size: 100%;
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
}
          */
      </style>
            <div id="t">

    
            </div>

  </div>
    </div>
    
</html>