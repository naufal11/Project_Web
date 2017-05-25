<?php $this->load->view('header_source'); ?>
<body>

  <div class="container">
    <div class="col-md-12">
      <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4" style="margin-top:50px">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
              <div class="col-sm-12">
              <form class="form-horizontal" action="<?php echo site_url('users/do_register') ?>" method="post" id="form_valid"  role="form" data-toggle="validator">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" placeholder="Username ..." name="username" required>
                </div>
                <div class="form-group">
                  <div class="row">

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="firstname" placeholder="First name ..." name="firstname" required>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="lastname" placeholder="Last name ..." name="lastname">
                  </div>
                </div>
                </div>
                <label for="gender">Gender</label>
                <div class="form-group">
                  <div class="col-sm-6">
                    <label>
                      <input type="radio" name="gender" value="0">
                      Perempuan</label>
                  </div>
                  <div class="col-sm-6">
                    <label>
                      <input type="radio" name="gender" value="1">
                      Laki-Laki
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Your Email ..." name="email" data-error="Bruh, that email address is invalid" required>
                </div>
                <div class="form-group">
                  <label for="bio">Bio</label>
                  <textarea name="bio" style="width:100%" class="form-control" placeholder="Bio"></textarea>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="inputPassword" data-minlength="6"  placeholder="Your Password ..." name="password" required>
                  <input type="password" class="form-control" id="password2" placeholder="Confirm Password ..." name="password2" data-match="#inputPassword" data-match-error="Whoops, these don't match" required>
                </div>
                <div class="btn-group btn-group-sm pull-right">
                  <a href="<?php echo site_url('users/page_login') ?>" class="btn btn-danger">
                    Cancel
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
  <script type="text/javascript">
  $(document).ready(function() {
    $("#form_valid").submit(function() {
      /* Act on the event */
      if ($("#inputPassword").val() != $("#password2").val()) {
        alert('msg');
        return;
      }
    });
  });
  </script>
</body>
</html>
