<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="">User: <?php echo $name; ?></a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-right navbar-top-links">
        <li>
            <a href="<?php echo base_url('logout'); ?>">
                <i class="fa fa-sign-out fa-fw"></i> Logout
            </a>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?php echo base_url('admin/start'); ?>" ><!-- class="active"--><i class="fa fa-home fa-fw"></i> Start</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/users'); ?>"><i class="fa fa-user fa-fw"></i> Users</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/mechanics'); ?>"><i class="fa fa-user-md fa-fw"></i> Mechanics</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/items'); ?>"><i class="fa fa-wrench fa-fw"></i> Items / Parts</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/services'); ?>"><i class="fa fa-cog fa-fw"></i> Services</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/booking'); ?>"><i class="fa fa-calendar fa-fw"></i> Booking</a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/vehicles'); ?>"><i class="fa fa-car fa-fw"></i> Vehicles</a>
                </li>
            </ul>
        </div>
    </div>
</nav>