<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Home_model","home_m");
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['menu'] = 'my_profile';
    $this->load->view('my_profile', $data);
  }

}
