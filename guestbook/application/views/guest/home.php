<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-guest"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Title</th>
          <th>Company</th>
          <th>Email</th>
          <th>Phone</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody id="data-guest">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_guest; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataGuest', 'Delete This Data?', 'Yes, Delete This Data'); ?>
<?php
  $data['judul'] = 'Guest';
?>