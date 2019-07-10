<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-event"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>  

  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
            <th>No</th>
          <th>Title</th>
          <th>Date</th>
          <th>Address</th>
          <th>Description</th>
          <th>First Time</th>
          <th>End Time</th>
          <th>Name</th>
         
          <th style="text-align: center;"                 
>              Action
        </tr>
      </thead>
      <tbody id="data-event">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_event; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataEvent', 'Delete This Data?', 'Yes, Delete This Data'); ?>
<?php
  $data['judul'] = 'Event';
?>