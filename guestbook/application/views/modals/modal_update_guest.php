<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Guest Data</h3>
      <form method="POST" id="form-update-guest">
        <input type="hidden" name="id" value="<?php echo $dataGuest->id_guest; ?>">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Full Name" name="fullname" aria-describedby="sizing-addon2" value="<?php echo $dataGuest->fullname_guest; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <select name="event" class="form-control select2"  aria-describedby="sizing-addon2">
            <?php
            foreach ($dataEvent as $event) {
              ?>
              <option value="<?php echo $event->id; ?>" <?php if($event->id == $dataGuest->id_event){echo "selected='selected'";} ?>><?php echo $event->title; ?></option>
              <?php
            }
            ?>
          </select>
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Company" name="company" aria-describedby="sizing-addon2" value="<?php echo $dataGuest->company; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataGuest->email; ?>">
        </div>
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-phone-alt"></i>
          </span>
          <input type="text" class="form-control" placeholder="Phone" name="phone" aria-describedby="sizing-addon2" value="<?php echo $dataGuest->phone; ?>">
        </div>
       
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i>Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>