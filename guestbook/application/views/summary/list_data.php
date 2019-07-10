
<?php
$nomor = 1;


foreach ($dataSummary as $summary) {
    ?>
    <tr>
        <td><?php echo $nomor; ?></td>

        <td style="min-width:230px;"><?php echo $summary->date; ?></td>
      <td><?php echo $summary->title; ?></td>
      <td><?php echo $summary->host; ?></td>
      <td><?php echo $summary->jumlahguest; ?></td>
      <td class="text-center" style="min-width:230px;">

      <!-- <button class="btn btn-info detail-dataSummary" data-id="<?php echo $summary->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button> -->
</div>

              
    </tr> 
  
   <?php
    $nomor++;
  }
?>
