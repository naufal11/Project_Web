<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Home_model","home_m");
    // cek apakah telah login
  }

  public function index()
  {
    $isLogon = $this->session->logon;
    if (!$isLogon) {
      redirect("users/page_login/");
    }
    $this->homepage();
  }

  function Homepage()
  {
    $data['menu']     = "timeline";
    $get_post_lols = $this->home_m->get_query_post();
    $data['lol_posts'] = $this->db->query($get_post_lols)->result_array();
    $this->load->view('homepage',$data);
  }

  public function my_post()
  {

  }

}
