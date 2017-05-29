
  <?php foreach ($lol_posts as $lol_post): ?>
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
          <img class="img-responsive" src="<?php
          $url = (strstr($lol_post['file'],'https://') || strstr($lol_post['file'],'http://') ) ? '' : base_url('assets/upload/') ;
           echo $url.$lol_post['file'] ?>" data-toggle="tooltip" title="<?php echo $lol_post['mark'] ?>">
        </a>
      </div>
      <div class="col-md-5">
        <h3><?php echo $lol_post['title'] ?></h3>
        <h4>
          <div class="pull-left">

            <img id="my_foto" class="thumbnail img-responsive" src="<?php

            $img = $lol_post['image_profile'];

            $fm = ($this->session->userdata['user']['gender'] == 1) ? "male" : "female" ;

            $imgSource= ($img == NULL) ? $fm.".png" : $img ;
            $imgLower = strtolower($imgSource);


            $imageUrl = (strstr($imgLower,"http://") || strstr($imgLower,"https://")) ? '' : base_url('/assets/img/profile/');

            echo $imageUrl.$imgSource;

            ?>" width="50px" height="50px">
          </div>
          <?php echo $lol_post['username'] ?></h4>
        <p><?php echo $lol_post['caption'] ?></p>
        <div class="btn btn-primary" onclick="response(<?php echo $lol_post['intIdPost'] ?>,1)">
          <span class="fa fa-thumbs-o-up" id="post_<?php echo $lol_post['intIdPost'] ?>_like"> <?php
          $like = ($lol_post['likes']  != NULL) ? $lol_post['likes'] : 0;
          echo $like ?></span>
        </div>
        <div data-toggle="collapse" data-target="#comment_<?php echo $lol_post['intIdPost'] ?>" class="btn btn-info" onclick="load_comments(<?php echo $lol_post['intIdPost'] ?>)">
          <span class="fa fa-comments"></span>
          <?php
          $com = ($lol_post['total_comment'] != NULL) ? $lol_post['total_comment'] : 0;
          echo $com;
          ?>
          Komen
        </div>

        <div class="btn btn-danger" onclick="response(<?php echo $lol_post['intIdPost'] ?>,0)">
          <span class="fa fa-thumbs-o-down" id="post_<?php echo $lol_post['intIdPost'] ?>_dislike"> <?php
          $dislike = ($lol_post['dislike'] != NULL) ? $lol_post['dislike'] : 0;
          echo $dislike ?></span>
        </div>
        <div class="row collapse" id="comment_<?php echo $lol_post['intIdPost'] ?>">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4><i class="fa fa-comments"></i>
                  <?php echo $com ?>
                   Comments</h4>
              </div>
              <div class="panel-body" id="comments_load_<?php echo $lol_post['intIdPost'] ?>">

              </div>
                <div class="panel-footer">
                  <div class="form-horizontal" action="index.html" method="post">
                    <div class="form-group">
                      <div class="col-sm-10">
                      <input type="text" class="form-control" id="forward_comm_<?php echo $lol_post['intIdPost'] ?>" placeholder="">
                    </div>
                      <div class="col-sm-offset-2">
                        <button class="btn btn-default" onclick="load_comments(<?php echo $lol_post['intIdPost'] ?>, 'forward_comm_<?php echo $lol_post['intIdPost'] ?>')">
                          <i class="fa fa-mail-forward"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <hr>
  <?php endforeach; ?>
