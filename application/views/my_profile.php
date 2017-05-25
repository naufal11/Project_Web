<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<br><br><br><br><br>
<div class="container">
  <div class="row">

    <br>
        <div class="col-lg-4 hidden-sm hidden-xs">
            <div class="panel panel-default"  style="box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                <div class="panel-body">
                    <div class="media">
                      <h2>My Profile</h2>
                      <div class="hline"></div>
                      <br>
                        <div align="center">
                            <img class="thumbnail img-responsive" src="<?php echo base_url('/assets/user.png') ?>" width="300px" height="300px">
                        </div>
                        <div class="media-body">
                            <h2><?php echo $this->session->userdata['user']['firstname']." ".$this->session->userdata['user']['lastname']; ?></h2>
                            <h3><?php echo $this->session->userdata['user']['username']; ?></h3>
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p>
                              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.
                              <a href="#" class="fa fa-pencil-square-o"></a>
                            </p>
                            <hr>
                            <h3><strong>Gender</strong></h3>
                            <p>
                              <?php
                              if ($this->session->userdata['user']['gender'] == 1) {
                                echo "<i class='fa fa-male'></i> Laki-laki";
                              } else {
                                echo "<i class='fa fa-female'></i> Perempuan";
                              }
                              ?>
                            </p>
                            <hr>
                            <h3><strong>E-mail</strong></h3>
                            <p><?php echo $this->session->userdata['user']['email']; ?></p>
                            <hr>
                            <div class="text-center">
                              <h5><a href="#"><strong><u>Change Profile</u></strong></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- <div class="group">
            <div class="col-md-3">
              <div class="list-group">
                <a href="#" class="btn list-group-item"><h4>Profile settings</h4></a>
                <a href="#" class="btn list-group-item"><h4>My post</h4></a>
                <a href="#" class="btn list-group-item"><h4>Morbi leo risus</h4></a>
              </div>
            </div> -->
            <div class="col-lg-8">
              <h2>My Post</h2>
              <div class="hline"></div>
              <div id="my_post">
                <?php foreach ($my_post as $lol_post): ?>
                  <div class="row">
                    <div class="col-lg-12">
                      <h2 class="page-header"><?php echo $lol_post['heading'] ?>
                        <small><?php echo date_format(date_create($lol_post['dtmDate']),"Y-m-d") ?></small>
                      </h2>
                    </div>
                  </div>
                  <!-- /.row -->

                  <!-- Project One -->
                  <div class="row">
                    <div class="col-md-7">
                      <a href="#">
                        <img class="img-responsive" src="<?php echo base_url('assets/upload/').$lol_post['file'] ?>" alt="<?php echo $lol_post['mark'] ?>">
                      </a>
                    </div>
                    <div class="col-md-5">
                      <h3><?php echo $lol_post['title'] ?></h3>
                      <h4><?php echo $lol_post['username'] ?></h4>
                      <p><?php echo $lol_post['caption'] ?></p>
                      <div class="btn btn-primary" onclick="response(<?php echo $lol_post['intIdPost'] ?>,1)">
                        <span class="fa fa-thumbs-o-up" id="post_<?php echo $lol_post['intIdPost'] ?>_like"> <?php
                        $like = ($lol_post['likes']  != NULL) ? $lol_post['likes'] : 0;
                        echo $like ?></span>
                      </div>
                      <div class="btn btn-info"><span class="fa fa-comment"></span> Komen</div>
                      <div class="btn btn-danger" onclick="response(<?php echo $lol_post['intIdPost'] ?>,0)">
                        <span class="fa fa-thumbs-o-down" id="post_<?php echo $lol_post['intIdPost'] ?>_dislike"> <?php
                        $dislike = ($lol_post['dislike'] != NULL) ? $lol_post['dislike'] : 0;
                        echo $dislike ?></span>
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                  <hr>
                <?php endforeach; ?>
              <!-- End of load more -->
              </div>
            </div>
          </div>
  </div>

</div>

<?php $this->load->view('footer'); ?>
