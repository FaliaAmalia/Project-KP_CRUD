
<?php
$nomor = 1;


foreach ($dataAppointment as $appointment) {
    ?>
    <tr>
        <td><?php echo $nomor; ?></td>

        <td><?php echo $appointment->fullname; ?></td>
        <td><?php echo $appointment->company; ?></td>
        <td><?php echo $appointment->id_type; ?></td>
        <td><?php echo $appointment->id; ?></td>
        <td><?php echo $appointment->host; ?></td>
        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $appointment->image) ?>" width="64" /></a></td>

        <td><?php echo $appointment->interest; ?></td>
        <td><?php echo $appointment->datetime; ?></td>
   
    </tr> 
  
   <?php
    $nomor++;
  }
?>
