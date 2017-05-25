<body>
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LOLS.</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li>
              <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                LOL
              </a>
            </li>
            <li class="<?php if($menu == 'timeline'){ echo 'active'; } ?>"><a href="<?php echo site_url('home/') ?>">TAIMLEN</a></li>
            <li class="<?php if($menu == 'my_post'){ echo 'active'; } ?>"><a href="<?php echo site_url('home/my_post') ?>">MAI POS</a></li>

            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('/assets/user.png') ?>" class="user-image img-circle" style="width: 40px; height: 40px;" alt="User Image">
              <span class="hidden-xs"> <?php echo $this->session->userdata['user']['username']; ?></span>
            </a>
            <ul class="dropdown-menu" style="margin-right: 15px;">
              <!-- User image -->
              <!-- <li class="user-header">
                <img src="<?php //echo base_url('/assets/user.png') ?>" class="img-circle" alt="User Image">
                <p>
                  <?php //echo $this->session->userdata['user']['username']; ?>
                </p>
                <p><small><?php //echo $this->session->userdata['user']['username']; ?></small></p>
              </li> -->
              <!-- Menu Body -->
              <li class="user-footer">
                  <a href="<?php echo site_url('profile/')?>" class="btn btn-info btn-flat">MAI PROPIL</a>
                  <a href="<?php echo site_url('users/logout') ?>" class="btn btn-danger btn-flat">LOGOD</a>
              </li>
            </ul>
          </li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
