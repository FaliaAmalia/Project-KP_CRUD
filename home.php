<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
               <?php if($this->session->userdata('akses')=='1'){?> 

    <!-- <div class="col-md-2" style="padding: 0;">
        <a href="<?php echo base_url('ReportDelivery2'); ?>">
          <button class=" form-control btn btn-danger"><i class="glyphicon glyphicon-circle-arrow-down"></i><span>Report</span></button><br>
        </a>    
    </div>
          
    <div class="col-md-3">
        <a href="<?php echo base_url('DeliveryMenu/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
        <?php }?> -->

    <div class="col-md-2" style="padding: 0;">
        <button class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-pengiriman"><i class="glyphicon glyphicon-plus-sign"></i> Add Data</button>
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
          <th>Id Delivery</th>
          <th>Type Of Delivery</th>
          <th>Sub Type Of Delivery</th>
          <th>Receipt Number</th>
          <th>NIK</th>
          <!-- <th>Nama Pegawai</th> -->
          <th>Amount of Packages</th>
          <th>Packages Type</th>
          <th>Name of Front Desk Employee</th>
          <th>Delivery Status</th>
          <th>Datetime</th>
          <th>Item ID</th>

          <th style="text-align: center;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $no = 1;
            foreach ($dataDeliveri as $delivery) {
              if ($delivery->type_deliv == 'Online Shop') {
                $delivery->type_deliv;
              }
       ?>
                <tr>
                    <td><?php echo $no++; ?></td>

                    <td><?php echo $delivery->id_delivery; ?></td>
                    <td><?php echo $delivery->type_deliv; ?></td>
                    <td><?php echo $delivery->sub_type; ?></td>
                    <td><?php echo $delivery->no_resi; ?></td>
                    <td><?php echo $delivery->nik; ?></td>
                    <!-- <td><?php echo $delivery->name; ?></td> -->
                    <td><?php echo $delivery->jmlh_barang; ?></td>
                    <td><?php echo $delivery->jenis_barang; ?></td>
                    <td><?php echo $delivery->front_desk; ?></td>
                    <td><?php echo $delivery->deliv_status; ?></td>
                   
                    <!-- <td> <a href=""><img src="<?php echo base_url('../uploads/' . $appointment->image) ?>" width="64" /></a></td> -->

                    <td><?php echo $delivery->date_time; ?></td>
                    <td><?php echo $delivery->id_barang; ?></td>
                    <td class="text-center" style="min-width:230px;">
                    <button class="btn btn-github update-dataDeliveri" data-id="<?php echo $delivery->id_delivery; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                    <button class="btn btn-danger konfirmasiHapusd-delivery" data-id="<?php echo $delivery->id_delivery; ?>" data-toggle="modal" data-target="#konfirmasiHapusd"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
                </td>
                </tr> 
              
               <?php
                // $no++;
              }
               ?>
      </tbody>
    </table>
              </div>

  </div>
</div>

<?php echo $modal_tambah_pengiriman; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapusd', 'hapus-dataDeliveri', 'Delete This Data?', 'Yes, Delete This Data'); ?>
<?php
  $data['judul'] = 'name';
  $data['url'] = 'DeliveryMenu/import';
  echo show_my_modal('modals/modal_importD', 'import-delivery', $data);
?>