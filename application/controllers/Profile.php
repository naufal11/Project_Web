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
    $queryMyPost = $this->home_m->get_my_post_query();
    $data['my_post'] = $this->db->query($queryMyPost)->result_array();
    $this->load->view('my_profile', $data);
  }

  function edit_profile()
  {
    $data['menu'] = 'edit_profile';
    $this->load->view('change_profile', $data);
  }

}
