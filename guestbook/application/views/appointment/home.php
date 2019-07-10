<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
               <?php if($this->session->userdata('akses')=='1'){?> 

    <div class="col-md-2" style="padding: 0;">
<a href="<?php echo base_url('Reportappointment2'); ?>">
             <button class=" form-control btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-down"></i> <span>Report</span></button><br>
        </a>    </div>
      
             
      <div class="col-md-3">
        <a href="<?php echo base_url('ReportAppointment/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
        <?php }?>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
       <style>
          #t{
overflow-x:scroll;
overflow-y:auto;
   
          }
      </style>
              <div id="t">

    <table id="list-data" class="table table-bordered table-striped">
        
        
      <thead>
        <tr>
          <th>No</th>
<!--          <th>Foto</th>-->
          <th>fullname</th>
          <th>company</th>
          <th>id_type</th>
          <th>id</th>
          <th>host</th>
          <th>image</th>
          <th>interest</th>
          <th>datetime</th>

        </tr>
      </thead>
      <tbody id="data-appointment">
      
      </tbody>
    </table>
              </div>

  </div>
</div>

