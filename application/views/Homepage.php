<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<!-- Page Content -->
<br><br><br>
<div class="container">
  <!-- Page Heading -->

  <!-- Here will be load -->
  <div id="homepage">
    <!-- End of load more -->
  </div>
  <div id="loading">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="<?php echo base_url('assets/img/loading2.gif') ?>" width="100px" height="50">
        </div>
      </div>
    </div>
  </div>
  <div id="noable">
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <label>
            Not ebel eni pos egen !
          </label>
        </div>
      </div>
    </div>
  </div>

  <!-- Pagination -->
  <div class="row text-center">
    <div class="col-lg-12">
      <div class="text-center">
        <label>
          <i class="fa fa-refresh"></i> Lod Mor
        </label>
      </div>
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
    data    = JSON.parse(data);
    dislike = (data.dislike == null) ? 0 : data.dislike;
    like    = (data.likes   == null) ? 0 : data.likes;
    $("#post_" + id + "_like").html(" " + like);
    $("#post_" + id + "_dislike").html(" " + dislike);
  });
}
var loadCount = 0;
$(document).ready(function() {
  loadMore();
  $('[data-toggle="tooltip"]').tooltip();
  $(window).scroll(function() {
    /* Act on the event */
    if ( $(window).scrollTop() >= $(document).height() - $(window).height() ) {

      loadMore();
    }
  });
});

var noable = "ada";
function loadMore() {
  $("#loading").show('fast');
  if (noable != "") {
    $.ajax({
      url: "<?php echo site_url('home/get_content_load_more').'/'.$menu ?>",
      type: 'GET',
      data: {
        'offset' : loadCount,
        'limit'  : 3
      },
      success :function(data){
        $("#loading").hide('fast');
        $("#homepage").append(data);
        noable = (data == null) ? "" : "able";
        $("#noable").hide('fast');
        if (loadCount != 3) {
          $(window).scrollTop($(document).height() - 1000);
        }
      }}
    )
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
  }else {
    $("#noable").show('fast');
  }
}

function load_comments(ID, id_ = "") {
  id_ = document.getElementById(id_);
  var commentText = "";
  if (id_ != null) {
    commentText = id_.value;
  }
  $("#comments_load_" + ID).load("<?php echo site_url("post/load_comments") ?>",{
    "intIdPost" : ID,
    "comment"   : commentText
  });
  id_.value = "";
}

</script>
</body>
</html>
