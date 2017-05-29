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
                            <img id="my_foto" class="thumbnail img-responsive" src="<?php

                            $img = $this->session->userdata['user']['image_profile'];

                            $fm = ($this->session->userdata['user']['gender'] == 1) ? "male" : "female" ;

                            $imgSource= ($img == NULL) ? $fm . ".png" : $img ;

                            echo base_url('/assets/img/profile/').$imgSource;

                            ?>" width="300px" height="300px">
                        </div>
                        <div class="pull-right">
                          <a class="btn btn-danger btn-sm"  href="<?php echo site_url('users/edit_photo_profile/TRUE') ?>">Reset</a>
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#My_photo">
                            Change
                          </button>

                          <!-- modal here -->
                          <div class="modal fade" id="My_photo" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id=""></h4>
                                </div>
                                <form action="http://localhost/project_web/users/edit_photo_profile" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <div class="modal-body">
                                  <div class="col-sm-12">

                                    <div class="form-group">
                                      <label for="Potos">Mai Potos</label>
                                      <input type="file" placeholder="" name="file_name" id="photo_file">
                                      <p class="help-block">Pake file aje.</p>
                                    </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control" placeholder="" name="file_url" id="url_file" multiple>
                                      <p class="help-block">Gapunya imeg pake url aje.</p>
                                    </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Kensel</button>
                                  <button type="button" class="btn btn-primary" onclick="changeImage()" id="buttonSubmit">Sep</button>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="media-body">
                            <h2><?php echo $this->session->userdata['user']['firstname']." ".$this->session->userdata['user']['lastname']; ?></h2>
                            <h3><?php echo $this->session->userdata['user']['username']; ?></h3>
                            <hr>
                            <h3><strong>Bio</strong></h3>
                            <p>
                              <?php echo $this->session->userdata['user']['bio'] ?>
                              <a href="#" class="fa fa-pencil-square-o"></a>
                            </p>
                            <hr>
                            <h3><strong>E-mail</strong></h3>
                            <p><?php echo $this->session->userdata['user']['email']; ?></p>
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
                            <h3><strong>Last Logout</strong></h3>
                            <p><?php echo date_format(date_create($this->session->userdata['user']['last_log']),"D,d m Y") ?></p>
                            <p><?php echo date_format(date_create($this->session->userdata['user']['last_log']),"H:i A") ?></p>
                            <hr>
                            <div class="text-center">
                              <h5><a href="#"><strong><u>Setting Profile</u></strong></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-8">
              <h2>My Post</h2>
              <div class="hline"></div>
              <div id="my_post">
                <?php if ($my_post == NULL): ?>
                  <div class="text-center">
                    <h1><i class="fa fa-question"></i></h1>
                    <label>No Abel Eni Pos.</label>
                  </div>
                <?php else: ?>
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
              <?php endif; ?>
              <!-- End of load more -->
              </div>
            </div>
          </div>
  </div>

</div>

<?php $this->load->view('footer'); ?>
<script type="text/javascript">
$(document).ready(function() {
  $("#photo_file").change(function() {
    /* Act on the event */
    if ($("#photo_file").val() != null || $("#photo_file").val() != "") {
      $("#buttonSubmit").attr('type', 'submit');
    }
  });
});
function changeImage() {
  var url = $("#url_file").val();

  if (url != null) {
    $("#my_foto").attr('src', url);
    $.post("<?php echo site_url('users/edit_photo_profile') ?>",
    {
      "file_url" : url
    }
  );
  }
}

function response(id, value) {
  $.post("<?php echo site_url('post/response') ?>", {
    "intIdPost" : id,
    "response"  : value
  },
  function(data) {
    /*optional stuff to do after success */
    data = JSON.parse(data);
    dislike = (data.dislike == null) ? 0 : data.dislike;
    like = (data.likes == null) ? 0 : data.likes;
    $("#post_" + id + "_like").html(" " + like);
    $("#post_" + id + "_dislike").html(" " + dislike);
  });
}
</script>
