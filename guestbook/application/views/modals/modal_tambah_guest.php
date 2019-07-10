<head>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/jquery-ui.css' ?>">
    <style>
        .ui-autocomplete-input {
            border: none; 
            font-size: 14px;
            width: 110px;
            height: 25px;
            margin-bottom: 5px;
            padding-top: 2px;
            border: 1px solid #DDD !important;
            padding-top: 0px !important;
            z-index: 1511;
            position: relative;
        }
        .ui-menu .ui-menu-item a {
            font-size: 12px;
        }
        .ui-autocomplete {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1510 !important;
            float: left;
            display: none;
            min-width: 160px;
            width: 160px;
            padding: 4px 0;
            margin: 2px 0 0 0;
            list-style: none;
            background-color: #ffffff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        }
        .ui-menu-item > a.ui-corner-all {
            display: block;
            padding: 3px 15px;
            clear: both;
            font-weight: normal;
            line-height: 18px;
            color: #555555;
            white-space: nowrap;
            text-decoration: none;
        }
        .ui-state-hover, .ui-state-active {
            color: #ffffff;
            text-decoration: none;
            background-color: #0088cc;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            background-image: none;
        }
        #modalIns{
            width: 500px;
        }
    </style>

</head>    
<body>

    <!-- Kita buat textbox untuk menampung jumlah data form -->
    <input type="hidden" id="jumlah-form" value="1">



    <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <div class="form-msg"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 style="display:block; text-align:center;">Add Guest Data</h3>

        <form id="form-tambah-guest" method="POST">
            <button class="btn btn-github" type="button" id="btn-tambah-form">Tambah Data Form</button>
            <button class="btn btn-danger" type="button" id="btn-reset-form">Reset Form</button><br><br>
            <b>Data ke 1 :</b>

            <table border="0">
                <tr>
                    <td>Phone</td>
                    <td>Nama</td>
                    <td>Event</td>
                    <td>Company</td>

                    <td>Email</td>
                </tr>
                <tr>
                    <td><input type="text" placeholder="Phone" name="phone[]" id="phone" required></td>

                    <td><input type="text" placeholder="Fullname" name="fullname[]" required></td>

                    <td>
                        <select name="event[]" class="form-control select2" id="eventlist" >
                            <?php
                            foreach ($dataEvent as $event) {
                                ?>
                                <option value="<?php echo $event->id; ?>" data-title="<?php echo $event->title; ?>" data-date="<?php echo $event->date; ?>" data-address="<?php echo $event->address; ?>" data-firsttime="<?php echo $event->firsttime; ?>" data-endtime="<?php echo $event->endtime; ?>" data-name="<?php echo $event->name; ?>">
                                    <?php echo $event->title; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select></td>
                    <td><input type="text"  placeholder="Company" name="company[]" required></td>
                    <td><input type="text"  placeholder="Email" name="email[]" required></td>

                </tr>

            </table>

            <div id="insert-form"></div>

            <hr>

            <!--hidden form -->
            <div class="input-group form-group">          
                <input  class="form-control" name="title[]" id="title" aria-describedby="sizing-addon2" style="display: none;">
            </div>
            <div class="input-group form-group">
                <input  class="form-control" name="date[]" id="date" aria-describedby="sizing-addon2" style="display: none;">
            </div>
            <div class="input-group form-group">
                <input type="hidden" class="form-control" name="address[]" id="address" aria-describedby="sizing-addon2" style="display: none;">
            </div>
            <div class="input-group form-group">
                <input type="hidden" class="form-control" name="firsttime[]" id="firsttime" aria-describedby="sizing-addon2" >
            </div>
            <div class="input-group form-group">
                <input type="hidden" class="form-control" name="endtime[]" id="endtime" aria-describedby="sizing-addon2">
            </div>
            <div class="input-group form-group">            
                <input  class="form-control" name="name[]" id="name" aria-describedby="sizing-addon2" style="display: none;">
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
                </div>
            </div>
        </form>
    </div>

    <script src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery-ui.js' ?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(function () {
            $(".select2").select2();
        });


        $(document).ready(function () {

            $('#phone').autocomplete({
                source: "<?php echo base_url('Guest/get_autocomplete'); ?>",

                select: function (event, ui) {
                    $('[name="phone[]"]').val(ui.item.label);
                    $('[name="fullname[]"]').val(ui.item.fullname);
                    $('[name="company[]"]').val(ui.item.company);
                    $('[name="email[]"]').val(ui.item.email);
                }
            });

        });



        $(document).ready(function () { // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function () { // Ketika tombol Tambah Data Form di klik
        var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

                // Kita akan menambahkan form dengan menggunakan append
                // pada sebuah tag div yg kita beri id insert-form
                $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
                "<table border=0 >" +
                "<tr>" +
                "<td><input type='text' placeholder='Phone' name='phone[]' id='phone' required></td>" +
                "<td><input type='text' placeholder='Fullname' name='fullname[]' required></td>" +
                "<td><select name='event[]' class='form-control select2' id='eventlist' > <?php foreach ($dataEvent as $event) { ?> <option value='<?php echo $event->id; ?>' data-title='<?php echo $event->title; ?>' data-date='<?php echo $event->date; ?>' data-address='<?php echo $event->address; ?>' data-firsttime='<?php echo $event->firsttime; ?>' data-endtime='<?php echo $event->endtime; ?>' data-name='<?php echo $event->name; ?>'> <?php echo $event->title; ?> </option> <?php } ?> </select></td>" +
                "<td><input type='text' placeholder='Company' name='company[]' required> </td>" +
                "<td><input type='text' placeholder='Email' name='email[]' required></td>" +

                /*"<td><input type='text' placeholder='Title' name='title[]' id='title' required></td>" +
                "<td><input type='text' placeholder='Date' name='date[]' id='date' required></td>" +
                "<td><input type='text' placeholder='Address' name='address[]' id='address' required></td>" +
                "<td><input type='text' placeholder='firsttime' name='firsttime[]' id='firsttime' required></td>" +
                "<td><input type='text' placeholder='endtime' name='endtime[]' id='endtime' required></td>" +
                "<td><input type='text' placeholder='name' name='name[]' id='name' required></td>" + */

                "</tr>" +
 
    
    "</table>" +
        "");
        
        $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });
        
        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function () {
                                $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                                $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
            });
            });
</script>

        </body>