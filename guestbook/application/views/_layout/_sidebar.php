<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>../uploads/<?php echo $userdata->image; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $userdata->name; ?></p>
                <!-- Status -->
                <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU LIST</li>
            <!-- Optionally, you can add icons to the links -->

            <li <?php
            if ($page == 'home') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('Home'); ?>">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

             <li <?php
            if ($page == 'todolist') {
                echo 'class="active"';
            }if ($this->session->userdata('akses') != '1') {
            ?>>
                <a href="<?php echo base_url('Todolist'); ?>">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>To Do List</span>
                </a>
            <?php }?>
             </li>
            
            
            
            <li <?php
            if ($page == 'guest') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('Guest'); ?>">
                    <i class="fa fa-user"></i>
                    <span>Guest Data</span>
                </a>
            </li>
            <li <?php
            if ($page == 'appointment') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('Appointment'); ?>">
                    <i class="fa fa-calendar"></i>
                    <span>Appointment Data</span>
                </a>
            </li>

             <li <?php
            if ($page == 'delivery') {
                echo 'class="active"';
            } if ($this->session->userdata('akses') == '1') {
            ?>>
                    <a href="<?php echo base_url('DeliveryMenu'); ?>">
                        <i class="fa fa-cube"></i>
                        <span>Delivery Data</span>
                    </a>
                </li>
            <?php } ?>
            
            <li <?php
            if ($page == 'event') {
                echo 'class="active"';
            }
            ?>>
                <a href="<?php echo base_url('Event'); ?>">
                    <i class="fa fa-location-arrow"></i>
                    <span>Event Data</span>
                </a>
            </li>

   
            <li <?php
            if ($page == 'employee') {
                echo 'class="active"';
            } if ($this->session->userdata('akses') == '1') {
                ?>>
                    <a href="<?php echo base_url('Employee'); ?>">
                        <i class="fa fa-users"></i>
                        <span>Employee Data</span>
                    </a>
                </li>
            <?php } ?>

            <li <?php
            if ($page == 'register') {
                echo 'class="active"';
            } if ($this->session->userdata('akses') == '1') {
                ?>>
                    <a href="<?php echo base_url('Register'); ?>">
                        <i class="fa fa-lock"></i>
                        <span>Register</span>
                    </a>

                <?php } ?>
            </li>
          <!--   <li <?php
            if ($page == 'staff') {
                echo 'class="active"';
            } if ($this->session->userdata('akses') == '1') {
                ?>>
                    <a href="<?php echo base_url('Staff'); ?>">
                        <i class="fa fa-briefcase"></i>
                        <span>Staff</span>
                    </a>

                <?php } ?>
            </li> -->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i>
                    <span>Report</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>

                    </span>
                </a>
                <ul class="treeview-menu">
				<li <?php
                    if ($page == 'reportappointment2') {
                        echo 'class="active"';
                    } if ($this->session->userdata('akses') == '1') {
                        ?>>
                            <a href="<?php echo base_url('Reportappointment2'); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span>Report Appointment</span>
                            </a>

                    <?php } ?>
                </li>
                <li <?php
                    if ($page == 'reportdelivery2') {
                        echo 'class="active"';
                    } if ($this->session->userdata('akses') == '1') {
                        ?>>
                            <a href="<?php echo base_url('ReportDelivery2'); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span>Report Delivery</span>
                            </a>
                    <?php } ?>
                </li>
                    <li class="treeview">
                    <a href="#"><i class="fa fa-copy"></i> Summary
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>                      
                    </a>
                    <ul class="treeview-menu">
                        <li <?php if ($page == 'summary') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('Summary'); ?>"><i class="fa fa-circle-o"></i>Summary</a></li>
                        <li <?php if ($page == 'summarydelivery') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('SummaryD'); ?>"><i class="fa fa-circle-o"></i>Summary Delivery</a></li>
                        <li <?php if ($page == 'summaryeco') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('SummaryEcommerce'); ?>"><i class="fa fa-circle-o"></i>Summary E-Commerce</a></li>
                        <li <?php if ($page == 'summaryemployee') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('Summaryemployee'); ?>"><i class="fa fa-circle-o"></i>Summary Employee</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-copy"></i> Detail Report
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>                      
                    </a>
                    <ul class="treeview-menu">
                        <li <?php if ($page == 'summaryeco') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('SummaryEcommerce'); ?>"><i class="fa fa-circle-o"></i>Delivery</a></li>
                        <li <?php if ($page == 'laporanevent') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('LaporanEvent'); ?>"><i class="fa fa-circle-o"></i>Event</a></li>
                        <li <?php if ($page == 'laporan') {echo 'class="active treeview menu-open"';} ?>><a href="<?php echo base_url('Laporan'); ?>"><i class="fa fa-circle-o"></i>Employee</a></li>
                    </ul>
                </li>
<!--                <li><a href="<?php echo base_url('Summary'); ?>"><i class="fa fa-copy"></i> Summary Report</a></li>-->
            </ul>
            </li>      

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>