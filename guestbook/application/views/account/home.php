<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div id="img">
  <div class="box-header" > 
      </br></br></br></br></br></br>
    <div align="center">
        <button style="width: 150px; heigth: 25px;" class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-admin"><i class="glyphicon glyphicon-plus-sign"></i> Add Admin</button>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     
   &nbsp; <button style="width: 150px; heigth: 25px;" class="form-control btn btn-danger" data-toggle="modal" data-target="#tambah-staff"><i class="glyphicon glyphicon-plus-sign"></i> Add Staff</button>
  &nbsp;&nbsp;
        <br/> <td> <img src="<?php echo base_url('../uploads/baru5.png') ?>" width="150" />&nbsp;&nbsp;&nbsp; </td>

   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td><img src="<?php echo base_url('../uploads/staff.png') ?>" width="150" /></td>

    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <style>
          #t{

          }
          #img {

/*opacity: 0.2;
  filter: alpha(opacity=20);
*/
   background-image:url(../uploads/a.jpg);
     background-size: 100%;
     background-attachment: fixed;
     background-repeat: no-repeat;
     background-position:center center;
}
          
      </style>
            <div id="t">

    
            </div>

  </div>
  </br></br></br></br></br></br>
</div>

<?php echo $modal_tambah_admin; ?>
<?php echo $modal_tambah_staff; ?>

<div id="tempat-modal"></div>
