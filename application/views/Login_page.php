<?php $this->load->view('header_source'); ?>
<body>

  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4" style="margin-top:150px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
              <div class="col-sm-12">
              <form class="form-horizontal" action="<?php echo site_url('users/do_login') ?>" method="post">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Your Email ..." name="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Your Password ..." name="password">
                </div>
                <div class="btn-group btn-group-sm pull-right">
                  <a href="<?php echo site_url('users/page_register') ?>" class="btn btn-warning btn-sm">
                    Register
                  </a>
                  <button type="submit" class="btn btn-primary btn-sm">
                    Submit
                  </button>
                </div>
              </form>
            </div>
            </div>
            <div class="panel-footer">
              <div class="col-xs-1-12">
                <label >Copyright &copy; 2017.</label>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">

        </div>
      </div>
    </div>
  </div>

      <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>
</body>
</html>
