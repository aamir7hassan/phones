<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> <?php echo $this->session->userdata('fname'); ?><span class="dashboard_text">Admin dashboard</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <!-- <li class="header">MAIN NAVIGATION</li> -->
              <li class="treeview">
                <a href="<?php echo base_url('admin');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
              </li>
			  <li class="treeview">
                <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Categories</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('admin/categories'); ?>"><i class="fa fa-angle-right"></i> Categories</a></li>
                  <li><a href="<?php echo base_url('admin/sub-categories'); ?>"><i class="fa fa-angle-right"></i> Sub categories</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="<?php echo base_url('admin/settings'); ?>">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <!--<span class="label label-primary pull-right">new</span>-->
                </a>
              </li>
			  <li>
                <a href="<?php echo base_url('admin/services') ?>" title="Services">
                <i class="fa fa-th"></i> <span>Services</span>
                <small class="label pull-right label-info"><?php echo get_all('ads',[]); ?></small>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                <i class="fa fa-edit"></i> <span>Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="forms.html"><i class="fa fa-angle-right"></i> General Forms</a></li>
                  <li><a href="validation.html"><i class="fa fa-angle-right"></i> Form Validations</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>