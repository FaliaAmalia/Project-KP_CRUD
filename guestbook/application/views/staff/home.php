<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
 
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
          <th>Nama</th>

          <th>Foto</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="data-staff">
      
      </tbody>
    </table>
            </div>

  </div>
</div>


<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataStaff', 'Delete This Data?', 'Yes, Delete This Data'); ?>
<?php
  $data['judul'] = 'name';
?>