<?php $this->load->view('header_source'); ?>
<?php $this->load->view('menu'); ?>

<br><br><br><br><br>
<div class="container">
  <div class="row">

    <div class="pull-left col-md-12">
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

      <div class="pull-right">
        <div class="col-md-10">
          <div class="form-group">
            <label for="" class="col-sm-3">Username</label>
            <div class="col-sm-8">
              <input type="text" style="width: 100%;" class="form-control">
            </div>
          </div>
        </div>
        <br><br>
          <div class="col-md-10">
            <div class="form-group">
              <label for="" class="col-sm-3">Bio</label>
              <div class="col-sm-8">
                <textarea style="width: 100%;" class="form-control" name="bio" placeholder=""></textarea>
              </div>
            </div>
          </div>
        <br><br><br>
        <div class="col-md-10">
          <div class="form-group">
            <label for="" class="col-sm-3">First & Last Name</label>
            <div class="col-sm-4">
              <input type="text" style="width: 100%;" class="form-control" name="firstname" value="">
            </div>
            <div class="col-sm-4">
              <input type="text" style="width: 100%;" class="form-control" name="lastname" value="">
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="form-group">
            <label for="" class="col-sm-3">Gender</label>
            <div class="col-sm-8">
              <input type="radio"  class="" name="Gender">Laki
            </div>
            <div class="col-sm-8">
              <input type="radio"  class="" name="Gender">Cewe
            </div>
          </div>
          <br><br>
          <button type="button" class="btn btn-danger">
            Update
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
