
<?php
foreach ($dataSummaryDeliveri as $summarydelivery) {
    ?>
    <tr>

<!--        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $summary->image) ?>" width="50" /></a></ts>-->
    <td><?php echo $summarydelivery->nik; ?></td>

    <td><?php echo $summarydelivery->jenis_barang; ?></td>
    <td><?php echo $summarydelivery->jmlh_barang; ?></td>


    <td>
        <a href="<?php echo base_url('SummaryD?id_delivery=' . $summarydeliv->id_delivery); ?>">
            <button class="btn btn-danger detail-dataSummarydeliveri"><i class="glyphicon glyphicon-info-sign"></i> View</button></a></td>

    </tr> 

    <?php
}
?>
