<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Delivery</h3>

  <form id="form-update-pengiriman" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $dataDelivery->id_delivery; ?>">
    
        <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tag"></i>
      </span>
      <input value="<?php echo $dataDeliveri->id_delivery; ?>" type="text" class="form-control" placeholder="id_delivery" name="id_delivery" id="id_delivery" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <input value="<?php echo $dataDeliveri->type_deliv; ?>" type="text" class="form-control" placeholder="type_delivery" name="type_deliv" id="type_deliv" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" value="<?php echo $dataDeliveri->sub_type; ?>" placeholder="sub_type" name="sub_type" id="sub_type" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-phone"></i>
      </span>
      <input value="<?php echo $dataDeliveri->no_resi; ?>" type="text" class="form-control" placeholder="no_resi" name="no_resi" id="no_resi" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-envelope"></i>
      </span>
      <input value="<?php echo $dataDeliveri->nik; ?>" type="text" class="form-control" placeholder="nik" name="nik" id="nik" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->jmlh_barang; ?>" type="text" class="form-control" placeholder="jmlh_barang" name="jmlh_barang" id="jmlh_barang" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->jenis_barang; ?>" type="text" class="form-control" placeholder="jenis_barang" name="jenis_barang" id="jenis_barang" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->front_desk; ?>" type="text" class="form-control" placeholder="front_desk" name="front_desk" id="front_desk" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->deliv_status; ?>" type="text" class="form-control" placeholder="deliv_status" name="deliv_status" id="deliv_status" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->date_time; ?>" type="text" class="form-control" placeholder="date_time" name="date_time" id="date_time" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input value="<?php echo $dataDeliveri->id_barang; ?>" type="text" class="form-control" placeholder="id_barang" name="id_barang" id="id_barang" aria-describedby="sizing-addon2">
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>