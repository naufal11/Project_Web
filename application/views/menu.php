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

    <div class="row">

      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">

          <?php echo form_open_multipart('post/post_do');?>

          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Pos Mai Lol</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="title" class="control-label">Titel:</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Titel gaol ...">
              </div>
              <div class="form-group">
                <label for="heading" class="control-label">Hiding:</label>
                <input type="text" class="form-control" id="heading" name="heading" placeholder="pake hiding kudu ..." required="">
              </div>
              <div class="form-group">
                <label for="mark" class="control-label">Mark:</label>
                <input type="text" class="form-control" id="mark" name="mark" placeholder="Mark aja kalo mao ...">
              </div>
              <div class="form-group">
                <label for="caption" class="control-label">Kepsion:</label>
                <textarea class="form-control" id="caption" name="caption" style="width:100%" placeholder="harusnya pake penjelasan ..."></textarea>
              </div>
              <div class="form-group">
                <label for="File">Potos:</label>
                <input type="file" id="File" name="userfile">
                <input type="text" class="form-control" name="name_url" placeholder="pake url kalo ga punya imeg ye ...">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Klos</button>
              <button type="Submit" class="btn btn-primary">Lol</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
