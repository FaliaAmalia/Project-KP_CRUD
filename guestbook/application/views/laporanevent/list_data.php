
<?php
 $no = 1;
  foreach ($dataLaporanevent as $laporanevent) {
    ?>

    <tr>
        
      <td style="min-width:230px;"><?php echo $laporanevent->title; ?></td>
      <td><?php echo $laporanevent->date; ?></td>
      <td><?php echo $laporanevent->employee; ?></td>
<!--      <td><button class="btn btn-info detail-dataLaporan" data-id="<?php echo $laporanevent->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button></td>-->
          <td>
              <a href="<?php echo base_url('ReportEvent?id='. $laporanevent->id); ?>">
              <button class="btn btn-danger detail-dataLaporanevent"><i class="glyphicon glyphicon-info-sign"></i> Detail</button></a></td>

    </tr>
    <?php
     $no++;
  }

?>
