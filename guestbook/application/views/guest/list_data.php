<?php
  foreach ($dataGuest as $guest) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php echo $guest->guest; ?></td>
      <td><?php echo $guest->event; ?></td>
      <td><?php echo $guest->company; ?></td>
      <td><?php echo $guest->email; ?></td>
      <td><?php echo $guest->phone; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-github update-dataGuest" data-id="<?php echo $guest->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-guest" data-id="<?php echo $guest->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i>Delete</button>
      </td>
    </tr>
    <?php
  }
?>