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
            <li class="<?php if($menu == 'my_profile'){ echo 'active'; } ?>"><a href="<?php echo site_url('home/my_profile') ?>">MAI PROPIL</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">BLOG</a></li>
                <li><a href="<?php echo site_url('users/logout') ?>">LOGOD</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
