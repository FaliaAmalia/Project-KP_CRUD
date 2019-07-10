<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Reschedule Appointment</h3>
      <form method="POST" id="form-reschedule-todolist">
        <input type="hidden" name="id" value="<?php echo $dataTodolist->id; ?>" id="id">
        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-calendar"></i>
          </span>
          <input type="text" class="form-control" id="datetimepicker1" placeholder="Date" name="datetime" aria-describedby="sizing-addon2" value="<?php echo $dataTodolist->datetime; ?>">
        </div>
        
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-danger" id="update-Reschedule"> <i class="glyphicon glyphicon-ok"></i>Reschedule</button>
          </div>
        </div>
      </form>
</div>
        
<script type="text/javascript">
           $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY/MM/DD HH:mm',
            daysOfWeekDisabled: [0, 6],
            minDate : new Date()
        });
    }); 
</script>

