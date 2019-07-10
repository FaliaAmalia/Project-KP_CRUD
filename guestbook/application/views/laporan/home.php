<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>
<div class="noprint">

<div class="box">
   
<!--  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-guest"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
  </div>-->
  <!-- /.box-header -->
  <div class="box-body" >
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Nik</th>
          <th>Posisition</th>
        <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-laporan">
        
      </tbody>
    </table>
  </div>
</div>
</div>
<div id="tempat-modal"></div>



