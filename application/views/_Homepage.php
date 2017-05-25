<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<!-- Page Content -->
<br><br><br>
<div class="container">
  <!-- Page Heading -->

<!-- Here will be load -->
<div id="homepage">
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
           echo $url.$lol_post['file'] ?>"  data-toggle="tooltip" title="<?php echo $lol_post['mark'] ?>">
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

<!-- Pagination -->
<div class="row text-center">
  <div class="col-lg-12">
    <button type="button" class="btn btn-info" name="button" onclick="loadMore()">
      <i class="fa fa-refresh"></i> Lod Mor
    </button>
  </div>
</div>

<br>

<!-- /.row -->

</div>
<!-- /.container -->


<?php $this->load->view('footer'); ?>

<script type="text/javascript">

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
var loadCount = 0;
$(document).ready(function() {
  loadMore();
  $('[data-toggle="tooltip"]').tooltip();
});

function loadMore() {
  $.ajax({
    url: "<?php echo site_url('home/get_content_load_more') ?>",
    type: 'GET',
    data: {
      'offset' : loadCount,
      'limit'  : 3
    }
  },
  success :function(data){
    $("#homepage").append(data);
  })
  .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  loadCount += 3;
}

</script>
</body>
</html>
