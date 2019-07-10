<?php if ($this->session->userdata('akses') == '1') {
$no = 1;


foreach ($dataDeliveri as $delivery) {
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
        <!-- <td><?php echo $delivery->date_time; ?></td>
        <td><?php echo $delivery->id_barang; ?></td> -->
       
        <!-- <td> <a href=""><img src="<?php echo base_url('../uploads/' . $appointment->image) ?>" width="64" /></a></td> -->

        <td><?php echo $delivery->date_time; ?></td>
        <td><?php echo $delivery->id_barang; ?></td>
        <td class="text-center" style="min-width:230px;">
        <button class="btn btn-github update-dataDeliveri" data-id="<?php echo $delivery->id_delivery; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-deliveri" data-id="<?php echo $delivery->id_delivery; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
    </tr> 
  
   <?php
    $no++;
  }
?>

<?php if ($this->session->userdata('akses') == '2') {
$no = 1;


foreach ($dataDeliveri as $delivery) {
    ?>
    <tr>
        <!-- <td><?php echo $nomor++; ?></td> -->

        <td><?php echo $delivery->id_delivery; ?></td>
        <td><?php echo $delivery->type_deliv; ?></td>
        <td><?php echo $delivery->sub_type; ?></td>
        <td><?php echo $delivery->no_resi; ?></td>
        <td><?php echo $delivery->nik; ?></td>
        <td><?php echo $delivery->name; ?></td>
        <td><?php echo $delivery->jmlh_barang; ?></td>
        <td><?php echo $delivery->jenis_barang; ?></td>
        <td><?php echo $delivery->front_desk; ?></td>
        <td><?php echo $delivery->deliv_status; ?></td>
        <!-- <td><?php echo $delivery->date_time; ?></td>
        <td><?php echo $delivery->id_barang; ?></td> -->
       
        <!-- <td> <a href=""><img src="<?php echo base_url('../uploads/' . $appointment->image) ?>" width="64" /></a></td> -->

        <td><?php echo $delivery->date_time; ?></td>
        <td><?php echo $delivery->id_barang; ?></td>
        <td class="text-center" style="min-width:230px;">
        <button class="btn btn-github update-dataDelivery" data-id="<?php echo $delivery->id_delivery; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-delivery" data-id="<?php echo $delivery->id_delivery; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
    </tr> 
  
   <?php
    $no++;
  }
?>

<!-- <?php 
        $no = 1;
        foreach($user as $u){ 
        ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $u->nama ?></td>
            <td><?php echo $u->alamat ?></td>
            <td><?php echo $u->pekerjaan ?></td>
            <td>
                  <?php echo anchor('crud/edit/'.$u->id,'Edit'); ?>
                              <?php echo anchor('crud/hapus/'.$u->id,'Hapus'); ?>
            </td>
        </tr>
        <?php } ?>
 -->