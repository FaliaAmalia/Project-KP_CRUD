<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Delivery Data</h3>

  <form id="form-tambah-pengiriman" method="POST" enctype="multipart/form-data" action="<?php base_url('modals/modal_tambah_pengiriman') ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Id_Delivery" name="id_delivery" id="id_delivery" aria-describedby="sizing-addon2" readonly> 
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <select id="type_deliv" class="form-control select2" placeholder="type_deliv" name="type_deliv" aria-describedby="sizing-addon2">
        <option value="">Type Of Delivery</option>
        <option value="e-commerce">E-Commerce</option>
        <option value="olshop">Online Shop</option>
      </select>
      <!-- <input type="dropdown-toggle" class="dropdown-toggle" placeholder="type_delivery" name="type_delivery" aria-describedby="sizing-addon2"> -->
      <div class="invalid-feedback">
         
      </div>
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-shopping-cart"></i>
      </span>
      <!-- <input type="text" class="form-control" placeholder="sub_type" name="sub_type" aria-describedby="sizing-addon2"> -->
      <select id="sub_type" class="form-control select2" placeholder="sub_type" name="sub_type" aria-describedby="sizing-addon2">
        <!-- <? php 
          if (value='e-commerce') {
           <option value="">Shopee</option>
           <option value="">Shopee</option>
          }
        ?> -->
        <option value="">Sub Type Of Delivery</option>
        <option value="e-commerce">E-Commerce</option>
        <option value="olshop">Online Shop</option>
      </select>
      <div class="invalid-feedback">
         
      </div>
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Resi" name="no_resi" id="no_resi" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
         
      </div>
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="NIK" name="nik" id="nik" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
      </div>
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jumlah Barang" name="jmlh_barang" id="jmlh_barang" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-gift"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Barang" name="jenis_barang" id="jenis_barang" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select id="front_desk" class="form-control select2" placeholder="Front Desk" name="front_desk" aria-describedby="sizing-addon2">
        <option value="">Nama Front Desk</option>
        <option value=" Mega Ayuningtyas ">Mega Ayuningtyas</option>
        <option value=" Nindya Dwi Rahayu">Nindy Dwi Rahayu</option>
      </select>
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <input type="text" class="form-control" placeholder="Status Delivery" name="deliv_status" id="deliv_status" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control" placeholder="Datetime (dd-mm-yyy- 00:00:00)" name="date_time" id="date_time" aria-describedby="sizing-addon2">
      <div class="invalid-feedback">
         
      </div>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-info-sign"></i>
      </span>
      <input type="text" class="form-control" placeholder="Id_Barang" name="id_barang" id="id_barang" aria-describedby="sizing-addon2" readonly>
      <div class="invalid-feedback">
         
      </div>
    </div>
      
      
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Add Data</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
    $(function () {
        $(".select2").select2({
          width: 420,
          placeholder: "Choose the Option",
        });
    });

    $('#form-tambah-pengiriman').on('submit', function(e){
        e.preventDefault();
        // var id_deliv = $('#id_deliv').uniqid();
        var type_deliv = $("#type_deliv").val();
        var sub_type = $("#sub_type").val();
        var no_resi = $("#no_resi").val();
        var nik_pegawai = $("#nik_pegawai").val();
        var jmlh_barang = $("#jmlh_barang").val();
        var jenis_barang = $("#jenis_barang").val();
        var front_desk = $("#front_desk").val();
        var deliv_status = $("#deliv_status").val();
        // var emailhost = $('#emailhost').val();
        // var name = $('#name').val();
        // var qr_code = '';
        // var id = $('#id').val();
        // Webcam.snap( function(data_uri){
        //     image = data_uri; 
        // });

        $.ajax({
            url: "<?php echo base_url('DeliveryMenu/prosesTambah'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {type_deliv: type_deliv, sub_type: sub_type, no_resi: no_resi, nik_pegawai: nik_pegawai, jmlh_barang: jmlh_barang, jenis_barang:jenis_barang, front_desk: front_desk, deliv_status: deliv_status},
            beforeSend: function() {
              Swal.fire({
                title: "Please Wait",
                text: "Submit to run ajax request",
                html: "<img src='assets/images/progress.gif' width='70px' height='70px'/></br>It will take a several times",
                allowOutsideClick: false,
                showConfirmButton: false
                }, function () {
                setTimeout(function () {
                  swal("Ajax request finished!");
                  }, 2000);
                });
            }
        })
        .done(function(data_deliv) {
          if(data_deliv>0){
            Swal.fire({
              title: 'Delivery', 
              text:'Thank You For Your Service', 
              type: 'success',
              showConfirmButton: false,
              timer: 1300
            });
            //$('#form-make-appointment')[0].reset();
            $('#tambah-pengiriman').modal('hide');
            timeRefresh(2000);
          }
        })
        .fail(function(){
          console.log("error");
        })
        .always(function(){
          console.log("complete");
        });

    });
    
</script>



<!-- <script type="text/javascript">
  $('#tambah-pengiriman').on('submit', function(e){
        e.preventDefault();
        // var id_deliv = $('#id_deliv').uniqid();
        var type_deliv = $("#type_deliv").val();
        var sub_type = $("#sub_type").val();
        var no_resi = $("#no_resi").val();
        var nik_pegawai = $("#nik").val();
        var jmlh_barang = $("#jmlh_barang").val();
        var jenis_barang = $("#jenis_barang").val();
        var front_desk = $("#front_desk").val();
        var deliv_status = $("#deliv_status").val();
        var date_time = $("#date_time").val();
        // var id_barang = $("id_barang").val();
      // });
        $.ajax({
            url: "<?php echo base_url('DeliveryMenu/prosesTambah'); ?>",
            type: 'POST',
            dataType: 'json',
            data: {type_deliv: type_deliv, sub_type: sub_type, no_resi: no_resi, nik: nik, jmlh_barang: jmlh_barang, jenis_barang:jenis_barang, front_desk: front_desk, deliv_status: deliv_status, date_time: date_time},
            beforeSend: function() {
              Swal.fire({
                title: "Please Wait",
                text: "Submit to run ajax request",
                html: "<img src='assets/images/progress.gif' width='70px' height='70px'/></br>It will take a several times",
                allowOutsideClick: false,
                showConfirmButton: false
                }, function () {
                setTimeout(function () {
                  swal("Ajax request finished!");
                  }, 2000);
                });
            }
        })
        .done(function(data) {
          if(data>0){
            Swal.fire({
              title: 'Delivery', 
              text:'Thank You For Your Service', 
              type: 'success',
              showConfirmButton: false,
              timer: 1300
            });
            //$('#form-make-appointment')[0].reset();
            $('#tambah-pengiriman').modal('hide');
            timeRefresh(2000);
          }
        })
        .fail(function(){
          console.log("error");
        })
        .always(function(){
          console.log("complete");
        });

    });

</script> -->

