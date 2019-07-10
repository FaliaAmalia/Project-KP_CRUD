
<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Add Event Data</h3>

  <form id="form-tambah-event" method="POST">
      
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-tags"></i>
      </span>
      <input type="text" class="form-control" placeholder="Title" name="title" aria-describedby="sizing-addon2">
    </div>
      
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="text" class="form-control datetime" placeholder="Date.." name="date" aria-describedby="sizing-addon2">
    </div>
      
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <input type="text" class="form-control" placeholder="Address.." name="address" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-edit"></i>
      </span>
      <input type="text" class="form-control" placeholder="Description.." name="description" aria-describedby="sizing-addon2">
    </div>
     <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control datetimepicker" placeholder="Firsttime.." name="firsttime" aria-describedby="sizing-addon2">
    </div>
      <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-time"></i>
      </span>
      <input type="text" class="form-control datetimepicker" placeholder="Endtime.." name="endtime" aria-describedby="sizing-addon2">
    </div>

<!-- <div class="row">
  <div class="col-sm-4 col-sm-offset-4">
   <div class="bootstrap-timepicker">
                <div class="form-group">
                 <label>Time picker:</label>

                   <div class="input-group input-group-lg">
                     <input type="text" class="form-control timepicker">

                     <div class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                     </div>
                   </div>
                </div>
            </div>
  </div>
 </div>-->

    <?php if($this->session->userdata('akses')=='1'){?>  
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select type="text" name="name" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($dataEmployee as $employee) {
          ?>
          <option value="<?php echo $employee->id; ?>">
            <?php echo $employee->name; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <?php } else { ?>
        <div class="input-group form-group">
      <input type="hidden" class="form-control" name="name" aria-describedby="sizing-addon2" value="<?php echo $userdata->id; ?>">
    </div>
    <?php } ?>
   
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-danger"> <i class="glyphicon glyphicon-ok"></i>Add Data</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2({
      width: 671,
    });

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

        $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'HH:mm',
            daysOfWeekDisabled: [0, 6],
            // minDate : new Date()
        });

        $('.datetime').datetimepicker({
            format: 'YYYY/MM/DD',
            daysOfWeekDisabled: [0, 6],
            minDate : new Date()
        });

    }); 
});


</script>
<script src="<?php echo base_url('assets/timerpicker/assets/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/timerpicker/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/timerpicker/assets/timepicker.js'); ?>"></script>


</body>
