<?php $this->load->view('navbar'); ?>
<br><br>
<div class="container">
  <h2>Upload For laugh ?</h2>
<form action="" enctype="multipart/form-data">
    <div class="form-group">
      <label>title</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Title for Harder" >
    </div>
    <div class="form-group">
      <label>Picture</label>
      <input type="file" name="berkas" placeholder="Masukan Gambar">
    </div>
    <div class="checkbox">
      <label><input type="checkbox"> Remember me</label>
    </div>
    <button type="submit"  value="upload"class="btn btn-default">Submit</button>
  </form>
</div>
