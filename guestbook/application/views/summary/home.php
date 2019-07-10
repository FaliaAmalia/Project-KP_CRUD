<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
      <?php if($this->session->userdata('akses')=='1'){?>
    <div class="col-md-2" style="padding: 1;">
<a href="<?php echo base_url('ReportSummary'); ?>">
             <button class=" form-control btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-down"></i> <span>Report</span></button><br>
        </a>    </div>
      
      
      <div class="col-md-3">
        <a href="<?php echo base_url('Summary/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
      
<!--      <div class="text-left noprint" >
                <button class="btn btn-danger" OnClick="javascript:window.print()" > Download PDF</button>

            </div>-->
      <?php } ?>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
        
        
        
      <thead>
        <tr>
          <th>No</th>
<!--          <th>Foto</th>-->
             <th>Date</th>
          <th>Title</th>
          <th>Host</th>
          <th>Jumlah Guest</th>

        </tr>
      </thead>
      <tbody id="data-summary">
      
      </tbody>
    </table>
  </div>
</div>

