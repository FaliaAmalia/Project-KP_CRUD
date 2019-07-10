<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <?php if($this->session->userdata('akses')=='1')?>
      <div class="col-md-3">
        <a href="<?php echo base_url('SummaryEcommerce/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
      </div>
  </div>
  
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">     
      <thead>
        <tr>
<!--            <th>Image</th>-->
          <th style="text-align: center;">No</th>
          <!-- <th style="text-align: center;">Id Delivery</th>
          <th style="text-align: center;">NIK</th> -->
          <!-- <th style="text-align: center;">Type Of Delivery </th> -->
          <th style="text-align: center;">Nama E-Commerce </th>
          <th style="text-align: center;">Total Sub Type Of Delivery </th>
          <!-- <th style="text-align: center;">Jenis Paket</th>
          <th>Foto</th>
          <th style="text-align: center;">Jumlah Paket </th> -->
          <th style="text-align: center;">Datetime </th>
          <th style="text-align: center;">Detail</th>
        </tr>
      </thead>
      <tbody id="data-summaryeco">
          <?php
              $no = 1;
              foreach ($dataSummaryEco as $summaryeco) {
          ?>
              <tr>

          <!--        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $summary->image) ?>" width="50" /></a></ts>-->
              <td><?php echo $no++; ?></td>
              <!-- <td><?php echo $summaryeco->id_delivery; ?></td>
              <td><?php echo $summaryeco->nik; ?></td> -->
              <!-- <td><?php echo $summaryeco->type_deliv; ?></td> -->
              <td><?php echo $summaryeco->sub_type; ?></td>
              <td><?php echo $summaryeco->totalsub; ?></td>
              <!-- <td><?php echo $summaryeco->jenis_barang; ?></td>

              <td><?php echo $summaryeco->jmlh_barang; ?></td> -->
              <td><?php echo $summaryeco->date_time; ?></td>


              <td>
                  <a href="<?php echo base_url('summarydetaileco?sub_type=' . $summaryeco->sub_type); ?>">
                      <button class="btn btn-danger detail-dataSummaryEco"><i class="glyphicon glyphicon-info-sign"></i> View</button></a></td>

              </tr> 

              <?php
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
