<?php
  foreach ($dataStaff as $staff) {
    ?>
    <tr>

      <td style="min-width:230px;"><?php echo $staff->nama; ?></td>
   
        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $staff->foto) ?>" width="64" /></a></td>
      <td class="text-center" style="min-width:230px;">
<!--        <button class="btn btn-danger konfirmasiHapus-guest" data-id="<?php echo $staff->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus" ><i class="glyphicon glyphicon-remove-sign"></i>Delete</button>

             -->
        </td>
    </tr>
    <?php
        

  }



?>
