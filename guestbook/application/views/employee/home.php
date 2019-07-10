<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-2">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-employee"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <style>
          #t{
overflow-x:scroll;
/*overflow-y:scroll;*/

          }
      </style>
            <div id="t">

    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
<!--          <th>Foto</th>-->
           <th>Department_id</th>
          <th>Nik</th>
          <th>Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Posisition</th>
          <th>Status</th>
          <th>Image</th>
          <th>Created</th>
          <th>Updated</th>
          <th>Created At</th>
          <th>Updated At</th>
<!--          <th>Hadir</th>-->
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-employee">
      
      </tbody>
    </table>
            </div>

  </div>
</div>

<?php echo $modal_tambah_employee; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataEmployee', 'Delete This Data?', 'Yes, Delete This Data'); ?>
<?php
  $data['judul'] = 'name';
  $data['url'] = 'Employee/import';
  echo show_my_modal('modals/modal_import', 'import-employee', $data);
?>