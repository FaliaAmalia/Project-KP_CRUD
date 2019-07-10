<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url(); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><small><img src="<?php echo base_url(); ?>../uploads/<?php echo $userdata->image; ?>"></small></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-md"><img src="<?php echo base_url('../uploads/logoinf.jpg') ?>" height="55px" width="200px"></span>
  </a>

  <!-- nav -->
  <?php echo @$_nav; ?>
</header>