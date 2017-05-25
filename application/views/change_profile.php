<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<br><br><br><br><br>
<div class="container">
  <div class="row">
    <div class="col-lg-12">

      <h2>Change Profile</h2>
      <div class="hline"></div>
      <br>

      <div class="col-md-3">
        <div class="list-group">
          <a href="#" class="list-group-item">
            <i class="#"></i> General
          </a>
          <a href="#" class="list-group-item">
            <i class="fa fa-key"></i> Change Password
          </a>
        </div>
      </div>

      <div class="col-md-9">
        <div class="form-group">
          <label for="" class="col-sm-2">Bio</label>
          <div class="col-sm-6">
            <textarea style="width: 100%;" name="bio" placeholder=""></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2">Username</label>
          <div class="col-sm-6">
            <input type="text" name="username" value="">
          </div>
        </div>
        <div class="form-group">
          <label for="" class="col-sm-2">First & Last</label>
          <div class="col-sm-3">
            <input type="text" name="firstname" value="">
          </div>
          <div class="col-sm-3">
            <input type="text" name="lastname" value="">
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<?php $this->load->view('footer'); ?>
