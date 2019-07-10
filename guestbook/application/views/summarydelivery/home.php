<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <?php if($this->session->userdata('akses')=='1')?>
      <div class="col-md-3">
        <a href="<?php echo base_url('SummaryD/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
      </div>
  </div>
  
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">     
      <thead>
        <tr>
<!--            <th>Image</th>-->
          <th style="text-align: center;">No</th>
          <!-- <th style="text-align: center;">Id Delivery</th> -->
          <th style="text-align: center;">NIK</th>
          <!-- <th style="text-align: center;">Jenis Barang</th> -->
<!--          <th>Foto</th>-->
          <th style="text-align: center;">Jumlah Paket </th>
          <th style="text-align: center;">Detail</th>
        </tr>
      </thead>
      <tbody id="data-summarydelivery" align="center">
          <?php
              $no = 1;
              foreach ($dataSummaryDeliveri as $summarydelivery) {
          ?>
              <tr>

          <!--        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $summary->image) ?>" width="50" /></a></ts>-->
              <td><?php echo $no++; ?></td>
              <!-- <td><?php echo $summarydelivery->id_delivery; ?></td> -->
              <td><?php echo $summarydelivery->nik_pegawai; ?></td>
              <!-- <td><?php echo $summarydelivery->jenis_barang; ?></td> -->
              <td><?php echo $summarydelivery->totalkirim; ?></td>


              <td>
                  <a href="<?php echo base_url('summarydetaildelivery?nik_pegawai=' . $summarydelivery->nik_pegawai); ?>">
                      <button class="btn btn-danger detail-dataSummaryDeliveri"><i class="glyphicon glyphicon-info-sign"></i> View</button></a></td>

              </tr> 

              <?php
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
