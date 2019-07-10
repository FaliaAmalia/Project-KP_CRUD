
<?php
foreach ($dataSummaryevent as $summary) {
    ?>
    <tr>

<!--        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $summary->image) ?>" width="50" /></a></ts>-->
    <td><?php echo $summary->host; ?></td>

    <td><?php echo $summary->posisition; ?></td>
    <td><?php echo $summary->jumlahevent; ?></td>


    <td>
        <a href="<?php echo base_url('Summaryeventemployee?id=' . $summary->id); ?>">
            <button class="btn btn-danger detail-dataSummaryemployee"><i class="glyphicon glyphicon-info-sign"></i> View</button></a></td>

    </tr> 

    <?php
}
?>
