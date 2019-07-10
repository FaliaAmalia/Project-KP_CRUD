<div id="autorefresh">
<?php
$nomor = 1;


foreach ($dataTodolist as $todolist) {
    ?>
    <tr>
        <td><?php echo $nomor; ?></td>

        <td><?php echo $todolist->fullname; ?></td>
        <td><?php echo $todolist->company; ?></td>
        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $todolist->image) ?>" width="100" /></a></td>
        <td><?php echo $todolist->interest; ?></td>
        <td><?php echo $todolist->datetime; ?></td>
        <td class="text-center" style="min-width:277px;">
            <button class="btn btn-danger update-dataTodolist" data-id="<?php echo $todolist->id; ?>"><i class="glyphicon glyphicon-ok"></i> Accept</button>
            <button class="btn btn-dark reschedule-dataTodolist" data-id="<?php echo $todolist->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Reschedule</button>
            <button class="btn btn-github reject-dataTodolist" data-id="<?php echo $todolist->id; ?>"><i class="glyphicon glyphicon-remove"></i> Reject</button>
        </td>
   
    </tr> 
  
   <?php
    $nomor++;
  }
?>
</div>

