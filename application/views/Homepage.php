<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<!-- Page Content -->
<br><br><br>
<div class="container">
  <!-- Page Heading -->
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
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="heading" class="control-label">Hiding:</label>
              <input type="text" class="form-control" id="heading" name="heading">
            </div>
            <div class="form-group">
              <label for="mark" class="control-label">Mark:</label>
              <input type="text" class="form-control" id="mark" name="mark">
            </div>
            <div class="form-group">
              <label for="caption" class="control-label">Kepsion:</label>
              <textarea class="form-control" id="caption" name="caption" style="width:100%"></textarea>
            </div>
            <div class="form-group">
              <label for="File">Potos:</label>
              <input type="file" id="File" name="userfile">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

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

<!-- Pagination -->
<div class="row text-center">
  <div class="col-lg-12">
    <button type="button" class="btn btn-info" name="button">
      <i class=""></i> More
    </button>
  </div>
</div>

<br>

<!-- /.row -->

<!-- <hr> -->

<!-- </footer> -->

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

</script>
</body>
</html>
