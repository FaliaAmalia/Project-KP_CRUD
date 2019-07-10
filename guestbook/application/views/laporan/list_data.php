
<?php
 $no = 1;
  foreach ($dataLaporan as $laporan) {
    ?>

    <tr>
        
      <td style="min-width:230px;"><?php echo $laporan->name; ?></td>
      <td><?php echo $laporan->nik; ?></td>
      <td><?php echo $laporan->posisition; ?></td>
<!--      <td><button class="btn btn-info detail-dataLaporan" data-id="<?php echo $laporan->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button></td>-->
          <td>
              <a href="<?php echo base_url('Report?id='. $laporan->id); ?>">
              <button class="btn btn-danger detail-dataLaporan"><i class="glyphicon glyphicon-info-sign"></i> Detail</button></a></td>

    </tr>
    <?php
     $no++;
  }

?>
