<?php  if ($this->session->userdata('akses') == '1') { 
$no = 1;


foreach ($dataEmployee as $employee) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>

        <td><?php echo $employee->department_id; ?></td>
        <td><?php echo $employee->nik; ?></td>
        <td><?php echo $employee->name; ?></td>
        <td><?php echo $employee->phone; ?></td>
        <td><?php echo $employee->email; ?></td>
        <td><?php echo $employee->posisition; ?></td>
        <td><?php echo $employee->status; ?></td>
        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $employee->image) ?>" width="64" /></a></td>

    <td><?php echo $employee->created; ?></td>
    <td><?php echo $employee->updated; ?></td>
    <td><?php echo $employee->created_at; ?></td>
    <td><?php echo $employee->updated_at; ?></td>

    <td class="text-center" style="min-width:230px;">
        <button class="btn btn-github update-dataEmployee" data-id="<?php echo $employee->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-employee" data-id="<?php echo $employee->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
    </tr>
    <?php
    $no++;
}
}
?>

<?php  if ($this->session->userdata('akses') == '2') { 


$no = 1;


foreach ($dataEmployee as $employee) {
    ?>
    <tr>
        <td><?php echo $no; ?></td>

        <td><?php echo $employee->department_id; ?></td>
        <td><?php echo $employee->nik; ?></td>
        <td><?php echo $employee->name; ?></td>
        <td><?php echo $employee->phone; ?></td>
        <td><?php echo $employee->email; ?></td>
        <td><?php echo $employee->posisition; ?></td>
        <td><?php $employee->status; ?> Active
        </td>
        <td> <a href=""><img src="<?php echo base_url('../uploads/' . $employee->image) ?>" width="64" /></a></td>
<!--                      <img src="<?=base_url()?>assets/picture/<?=$data->foto?>" alt="foto">-->

    <td><?php echo $employee->created; ?></td>
    <td><?php echo $employee->updated; ?></td>
    <td><?php echo $employee->created_at; ?></td>
    <td><?php echo $employee->updated_at; ?></td>

    <td class="text-center" style="min-width:230px;">
        <button class="btn btn-github update-dataEmployee" data-id="<?php echo $employee->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-employee" data-id="<?php echo $employee->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
    </td>
    </tr>
    <?php
    $no++;
}
}
?>



