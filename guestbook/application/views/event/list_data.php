
    <?php
  $no = 1;
  foreach ($dataEvent as $event) {
      
    ?>
    <tr>
      <td><?php echo $no; ?></td>
          <td><?php echo $event->title; ?></td>
      <td><?php echo $event->date; ?></td>
      <td><?php echo $event->address; ?></td>
      <td><?php echo $event->description; ?></td>
      <td><?php echo $event->firsttime; ?></td>
      <td><?php echo $event->endtime; ?></td>
      <td><?php echo $event->name; ?></td>

      <td class="text-center" style="min-width:230px;">

          <button class="btn btn-github update-dataEvent" data-id="<?php echo $event->id; ?>"><i class="glyphicon glyphicon-repeat"></i>Update</button>
          <button class="btn btn-danger konfirmasiHapus-event" data-id="<?php echo $event->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>

    </tr>
    <?php
    $no++;
  }
?>

    
    